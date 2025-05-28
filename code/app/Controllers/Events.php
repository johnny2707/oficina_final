<?php namespace App\Controllers;

use App\Models\MechanicsModel;
use App\Models\ClientsModel;
use App\Models\EventsModel;
use App\Models\LogsModel;
use DateTime;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Console\Descriptor\Descriptor;
use CodeIgniter\I18n\Time;

class Events extends BaseController
{
    protected $session;
    protected $mechanicsModel;
    protected $res;
    protected $data;
    protected $clientsModel;
    protected $eventsModel;
    protected $logsModel;
    protected $seeder;
    protected $email;
    protected $db;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mechanicsModel = new MechanicsModel;
        $this->clientsModel = new ClientsModel;
        $this->eventsModel = new EventsModel;
        $this->logsModel = new LogsModel;

        $this->db = \Config\Database::connect();

        $this->seeder = \Config\Database::seeder();

        $this->email = \Config\Services::email();

        helper('holidays');

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'SCHEDULE',
            'submenu' => '',
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/events.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    //CREATE EVENT
    public function createEventLoadPage()
    {
        $this->data['title'] = 'EVENT CREATION';

        return view('html/events/create', $this->data);
    }

    public function createEvent()
    {
        $validationRules = array(
            'event_type'                      => ['rules' => 'required'],
            'event_vehicle_license_plate'     => ['rules' => 'required'],
            'event_date'                      => ['rules' => 'required'],
            'event_start'                     => ['rules' => 'required'],
            'event_end'                       => ['rules' => 'required']
        );

        if(!$this->validate($validationRules))
        {
            
        }

        $eventData = [
            'event_service_id'            => $this->request->getPost('event_type'),
            'event_vehicle_license_plate' => $this->request->getPost('event_vehicle_license_plate'),
            'event_date'                  => $this->request->getPost('event_date'),
            'event_start'                 => $this->request->getPost('event_start'),
            'event_end'                   => $this->request->getPost('event_end'),
            'event_observations'          => $this->request->getPost('event_observations'), 
        ];

        $result = $this->eventsModel->createEvent($eventData);

        if(!$result)
        {
            $this->logsModel->log([
                'log_third_party_id' => $this->session->get('id'),
                'log_type' => 'event creation',
                'log_description' => 'User created a new event',
                'log_date' => date('Y-m-d H:i:s')
            ]);

            array_push($this->res['popUpMessages'], ["Sucesso!"]);
        }
        else
        {
            $this->res['error'] = TRUE;
            array_push($this->res['popUpMessages'], ["Error!"]);
        }

        return $this->response->setJSON($this->res);
    }

    public function index()
    {
        $this->data['title'] = 'CALENDAR';
        $this->data['submenu'] = 'CALENDAR';

        return  view('html/events/index', $this->data);
    }

    public function listOfEvents() 
    {        
        $validationRules = array(
            'currentYear'   => ['label' => 'Ano corrente',  'rules' => 'required'],
            'start'         => ['label' => 'Início',        'rules' => 'required'],
            'end'           => ['label' => 'Fim',           'rules' => 'required']
        );

        if (!$this->validate($validationRules)) 
        {

            $this->res['error'] = TRUE;
            $validation = \Config\Services::validation();

            foreach ($validationRules as $field => $rules) 
            {
                if ($validation->getError($field)) 
                {
                    array_push($this->res['popUpMessages'], "O campo <b>{$rules['label']}</b> tem de ser preenchido!");
                }
            }

        } 
        else 
        {

            $formData = $this->request->getPost();
            $events = array();

            // ADD INTERVENTIONS
            $allInterventions = $this->eventsModel->getAllEventsByDateRange(date("Y-m-d", strtotime($formData['start'])), date("Y-m-d", strtotime($formData['end'])));
            
            foreach ($allInterventions->getResultArray() as $interventions) 
            {
                if($interventions['event_status'] == 0)
                {
                    $color = "#00FF00";
                }
                elseif($interventions['event_status'] == 1)
                {
                    $color = "#0000FF";
                }
                elseif($interventions['event_status'] == 2)
                {
                    $color = "#FF0000";
                }
                else
                {
                    $color = "#808080";
                }

                // Add data to the events array
                array_push($events, array(
                    'id'    => $interventions['event_id'],
                    'title' => $interventions['service_name'],
                    'description' => "
                        <b>" . $interventions['service_name'] . "</b>
                        <br><br>
                        <b><u>Descrição:</u></b><br>
                        " . $interventions['service_description'] ,
                    'start' => $interventions['event_date'] . "T" . $interventions['event_start'],
                    'end'   => $interventions['event_date'] . "T" . $interventions['event_end'],
                    'color' => ($color),
                    'url'   => base_url("calendar/{$interventions['event_id']}")
                ));
            }

            // ADD PUBLIC HOLIDAYS
            $publicHolidays = publicHolidaysByYear($formData['currentYear']);
            foreach ($publicHolidays as $date => $name) {
                array_push($events, array(
                    'id'    => "",
                    'title' => $name,
                    'description' => "<b>Feriado nacional:</b> {$name}",
                    'start' => "{$date}T00:00:00",
                    'end'   => "{$date}T23:59:00",
                    'color' => "#808080"
                ));
            }
            
            $this->response->setHeader('Content-type', 'application/json');
            return $this->response->setJSON($events);

        }

    }

    public function updateEventLoadPage($eventId)
    {
        $this->data['title'] = "update event";
        
        $this->data['eventInfo'] = $this->eventsModel->getEventDataById($eventId);

        return view('html/events/eventUpdation', $this->data);
    }

    public function intervention($event_id) 
    {
        $this->data['title'] = "INTERVENTION";
        $this->data['data'] = $this->eventsModel->getEventData($event_id);

        return view('html/events/intervention', $this->data);
    }

    public function changeProgress()
    {
        $input = $this->request->getJSON(true); // true converts to array
        $eventId = $input['event_id'] ?? null;
        $progress = $input['progress'] ?? null;

        $data = [
            'event_id' => $eventId,
            'event_status' => $progress
        ];

        $result = $this->eventsModel->changeProgress($data);
        
        if($result)
        {
            $this->logsModel->log([
                'log_third_party_id' => $this->session->get('id'),
                'log_type' => 'event progress change',
                'log_description' => "User changed the progress of event {$eventId} to {$progress}",
                'log_date' => date('Y-m-d H:i:s')
            ]);
            
            array_push($this->res['popUpMessages'], ["Progress updated successfully!"]);
        }
        else
        {
            $this->res['error'] = TRUE;
            array_push($this->res['popUpMessages'], ["Failed to update progress!"]);
        }

        $this->res['data-received'] = $data;

        return $this->response->setJSON($this->res);
    }
}