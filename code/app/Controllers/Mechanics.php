<?php namespace App\Controllers;

use App\Models\MechanicsModel;
use App\Models\UsersModel;
use App\Models\LogsModel;
use DateTime;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Console\Descriptor\Descriptor;
use CodeIgniter\I18n\Time;

class Mechanics extends BaseController
{
    protected $session;
    protected $mechanicsModel;
    protected $logsModel;
    protected $res;
    protected $data;
    protected $usersModel;
    protected $seeder;
    protected $email;
    protected $db;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mechanicsModel = new MechanicsModel;
        $this->usersModel = new UsersModel;
        $this->logsModel = new LogsModel;

        $this->db = \Config\Database::connect();

        $this->seeder = \Config\Database::seeder();

        $this->email = \Config\Services::email();

        helper('uuid');

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'MECHANICS',
            'submenu' => 'INDEX',
            'mechanicData' => array(),
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/mechanics.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function getAllMechanics()
    {
        $mechanics = $this->mechanicsModel->getAllMechanics();

        return $this->response->setJSON($mechanics);
    }

    //CREATE MECHANIC
    public function createMechanicLoadPage()
    {
        $this->data['title'] = 'mechanic creation';
        // $this->data['allRoles'] = $this->usersModel->getRoles();

        return view('html/mechanics/mechanicCreation', $this->data);
    }

    public function createNewMechanic()
    {
        $formData = [
            'name' => $this->request->getPost('name'),
            'phoneNumber' => $this->request->getPost('phoneNumber'),
            'emailAddress' => $this->request->getPost('emailAddress')
        ];

        $validationRules = [
            'name' => [
                'label' => 'name',
                'rules' => 'required|max_length[255]'
            ],
            'phoneNumber' => [
                'label' => 'phone number',
                'rules' => 'required|max_length[9]'
            ],
            'emailAddress' => [
                'label' => 'email address',
                'rules' => 'required|max_length[255]|valid_email'
            ]
        ];

        if(! $this->validate($validationRules))
        {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = $this->validator->getErrors();
        }
        else
        {
            $mechanic_id = generateUUID();
            $creation_date = new Time('now');

            $mechanicInfo = [
                'id' => $mechanic_id,
                'name' => $formData['name'],
                'phone_number' => $formData['phoneNumber'],
                'email_address' => $formData['emailAddress'],
                'creation_date' => $creation_date,
            ];

            $this->mechanicsModel->createMechanic($mechanicInfo);
            
            $this->logsModel->log([
                'log_third_party_id' => $this->session->get('id'),
                'log_type' => 'mechanic creation',
                'log_description' => 'User created a new mechanic with id: ' . $mechanic_id,
                'log_date' => date('Y-m-d H:i:s')
            ]);

            $this->accountCreation($formData['emailAddress']);

            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    //ATUALIZAR CLIENTE
    public function updateMechanicLoadPage($mechanic_id)
    {
        $this->data['title'] = 'mechanic update';
        $this->data['mechanicData'] = $this->mechanicsModel->getMechanicData($mechanic_id);

        $this->session->set(['mechanic_id' => $mechanic_id]);

        return view('html/mechanics/mechanicUpdate', $this->data);
    }

    public function updateMechanicInfo()
    {
        $name = $this->request->getPost('name');
        $phoneNumber = $this->request->getPost('phone_number');
        $emailAddress = $this->request->getPost('email_address');
        $role = $this->request->getPost('role');

        $mechanicData = [
            'id' => $this->session->get('mechanic_id'),
            'name' => $name,
            'phone_number' => $phoneNumber,
            'email_address' => $emailAddress,
            'role' => $role
        ];

        $result = $this->mechanicsModel->updateMechanicInfo($mechanicData);

        if($result)
        {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = 'error!';
        }
        else
        {
            $this->logsModel->log([
                'log_third_party_id' => $this->session->get('id'),
                'log_type' => 'update_mechanic',
                'log_description' => 'User updated mechanic with id: ' . $mechanicData['id'],
                'log_date' => date('Y-m-d H:i:s')
            ]);

            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    //ADICIONAR CONTACTOS OU CARROS
    public function addClientInfoPage($mechanic_id)
    {
        $this->data['title'] = 'add info';
        $this->data['mechanicData'] = $this->mechanicsModel->getClientData($mechanic_id);
        $this->session->set(['mechanic_id' => $mechanic_id]);

        return view('html/clients/clientAddInfo', $this->data);
    }

    public function addContact()
    {
        $description = $this->request->getPost('description');
        $phoneNumber = $this->request->getPost('phone_number');
        $emailAddress = $this->request->getPost('email_address');

        $clientData = [
            'client_id' => $this->session->get('client_id'),
            'description' => $description,
            'phone_number' => $phoneNumber,
            'email_address' => $emailAddress
        ];

        $result = $this->mechanicsModel->insertContact($clientData);

        if($result)
        {
            $this->res['popUpMessages'][] = 'error!';
            $this->res['error'] = TRUE;
        }
        else
        {
            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    public function addCar()
    {
        $description = $this->request->getPost('description');
        $vin = $this->request->getPost('vin');
        $licensePlate = $this->request->getPost('license_plate');
        $model = $this->request->getPost('model');
        $year = $this->request->getPost('year');

        $clientData = [
            'client_id' => $this->session->get('client_id'),
            'description' => $description,
            'vin' => $vin,
            'license_plate' => $licensePlate,
            'model' => $model,
            'year' => $year
        ];

        $result = $this->mechanicsModel->insertCar($clientData);

        if($result)
        {
            $this->res['popUpMessages'][] = 'error!';
            $this->res['error'] = TRUE;
        }
        else
        {
            $this->res['popUpMessages'][] = 'sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    //LISTA DE CLIENTES
    public function listAllMechanicsLoadPage()
    {
        $this->data['title'] = 'mechanic list';

        $this->data['mechanicData'] = $this->mechanicsModel->getAllMechanics();

        return view('html/mechanics/mechanicList', $this->data);
    }

    //ENVIAR EMAIL CRIAÇÃO DE CONTA
    private function accountCreation($emailAddress)
    {
        $emailBody = view('html/users/emailTemplate', ['email' => $emailAddress]);

        $this->email->setMailType('html');

        $this->email->setFrom('joao.coutinho.soares.07@gmail.com', 'johnny');
        $this->email->setTo($emailAddress);

        $this->email->setSubject('account creation');
        
        $this->email->setMessage($emailBody);

        $this->email->send();
        
        return;
    }

    //MOSTRAR CLIENTE
    public function showMechanicLoadPage($mechanic_id)
    {
        $mechanicData = $this->mechanicsModel->getMechanicData($mechanic_id);

        $this->data['title'] = $mechanicData[0]['name'];
        $this->data['mechanicData'] = $mechanicData;

        return view('html/mechanics/mechanicInformation', $this->data);
    }

    //ELIMINAR CLIENTE
    public function deleteMechanic()
    {
        $mechanic_id = $this->request->getPost('mechanicId');

        $this->mechanicsModel->deleteMechanic($mechanic_id);

        $this->logsModel->log([
            'log_third_party_id' => $this->session->get('id'),
            'log_type' => 'delete_mechanic',
            'log_description' => 'User deleted mechanic with id: ' . $mechanic_id,
            'log_date' => date('Y-m-d H:i:s')
        ]);

        $this->res['popUpMessages'][] = 'eliminado com sucesso!';
        return $this->response->setJSON($this->res);
    }
}