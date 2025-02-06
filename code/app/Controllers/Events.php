<?php namespace App\Controllers;

use App\Models\MechanicsModel;
use App\Models\ClientsModel;
use App\Models\EventsModel;
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
    protected $seeder;
    protected $email;
    protected $db;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mechanicsModel = new MechanicsModel;
        $this->clientsModel = new ClientsModel;
        $this->eventsModel = new EventsModel;

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
        // $this->data['mechanics'] = $this->mechanicsModel->getAllMechanics();
        // $this->data['types'] = $this->eventsModel->getAllTypes();

        return view('html/events/create', $this->data);
    }

    public function createEvent()
    {
        $validationRules = array(
            'type'              => ['rules' => 'required'],
            'event_description' => ['rules' => 'required'],
            'event_date'        => ['rules' => 'required'],
            'event_start'       => ['rules' => 'required'],
            'event_end'         => ['rules' => 'required']
        );

        if(!$this->validate($validationRules))
        {
            
        }

        $eventData = [
            'type' => $this->request->getPost('type'),
            'event_description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('date'),
            'event_start' => $this->request->getPost('start'),
            'event_end' => $this->request->getPost('finish'),
            'mechanic_id' => $this->request->getPost('mechanicId'),
            'completed' => 0
        ];

        $result = $this->eventsModel->createEvent($eventData);

        if(!$result)
        {
            array_push($this->res['popUpMessages'], ["Sucesso!"]);
        }
        else
        {
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

                // // Get the list of technicians associated to the intervention
                // $technicians = array();
                // $techniciansData = $this->eventsModel->getTechniciansByInterventionID($interventions['id']);
                // foreach ($techniciansData->getResultArray() as $techs) {
                //     array_push($technicians, array(
                //         "id"    => $techs['userID'],
                //         "name"  => $techs['userName'],
                //         "color" => $techs['userColor']
                //     ));
                // }

                // // Assign the intervention color
                // $color = isset($technicians[0]['color']) ? $technicians[0]['color'] : "#FFFFF"; // Assign the first technician color
                // $techniciansNamesList = implode(", ", array_column($technicians, 'name'));
                // foreach ($technicians as $techs) {
                //     if ($techs['id'] == session()->get('id')) { // Assign the current user color if is associated to the intervention
                //         $color = $techs['color'];
                //         break;
                //     }
                // }

                // Add data to the events array
                array_push($events, array(
                    'id'    => $interventions['event_id'],
                    'title' => $interventions['event_description'],
                    'description' => "
                        <b>" . $interventions['event_description'] . "</b>
                        <br><br>
                        <b><u>Descrição:</u></b><br>
                        " . $interventions['event_description'],
                    'start' => $interventions['event_date'] . "T" . $interventions['event_start'],
                    'end'   => $interventions['event_date'] . "T" . $interventions['event_end'],
                    'color' => $interventions['event_color'] . (Time() > $interventions['event_date'] ? '80' : ''),
                    'url'   => base_url("events/{$interventions['event_id']}/update")
                ));
            }

            // // ADD APPOINTMENTS
            // $allAppointments = $this->appointmentsModel->getAllAppointmentsByDateRange(date("Y-m-d", strtotime($formData['start'])), date("Y-m-d", strtotime($formData['end'])));
            // foreach ($allAppointments->getResultArray() as $appointments) {

            //     // Get the list of technicians associated to the appointment
            //     $technicians = array();
            //     $techniciansData = $this->appointmentsModel->getTechniciansByAppointmentID($appointments['id']);
            //     foreach ($techniciansData->getResultArray() as $techs) {
            //         array_push($technicians, array(
            //             "id"    => $techs['userID'],
            //             "name"  => $techs['userName'],
            //             "color" => $techs['userColor']
            //         ));
            //     }

            //     // Assign the appointment color
            //     $color = $technicians[0]['color']; // Assign the first technician color
            //     $techniciansNamesList = implode(", ", array_column($technicians, 'name'));
            //     foreach ($technicians as $techs) {
            //         if ($techs['id'] == session()->get('id')) { // Assign the current user color if is associated to the appointment
            //             $color = $techs['color'];
            //             break;;
            //         }
            //     }

            //     // Add data to the events array
            //     array_push($events, array(
            //         'id'    => $appointments['id'],
            //         'title' => "{$appointments['customerName']} (Marcação {$this->appointments->dataConst['type'][$appointments['type']]})",
            //         'description' => "
            //             <b>{$appointments['customerName']} (Marcação {$this->appointments->dataConst['type'][$appointments['type']]})</b>
            //             <br><br>
            //             <b><u>Técnicos:</u></b><br>
            //             {$techniciansNamesList}
            //             <br><br>
            //             <b><u>Descrição:</u></b><br>
            //             {$appointments['description']}
            //         ",
            //         'start' => "{$appointments['date']}T{$appointments['start']}",
            //         'end'   => "{$appointments['date']}T{$appointments['end']}",
            //         'color' => $color . ($appointments['status'] != 1 ? '80' : ''),
            //         'url'   => base_url("appointments/{$appointments['id']}/update")
            //     ));
            // }

            // // ADD VACATIONS
            // $allVacations = $this->vacationsModel->getAllVacationsByDateRange(date("Y-m-d", strtotime($formData['start'])), date("Y-m-d", strtotime($formData['end'])));
            // foreach ($allVacations->getResultArray() as $vacations) {

            //     // Add data to the events array
            //     array_push($events, array(
            //         'id'    => $vacations['id'],
            //         'title' => "Férias {$vacations['userName']}",
            //         'description' => "<b>Férias</b> {$vacations['userName']}",
            //         'start' => $vacations['date'],
            //         'color' => "#cfb734"
            //     ));
            // }

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
}