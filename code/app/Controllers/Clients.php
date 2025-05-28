<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;
use App\Models\VehiclesModel;
use App\Models\TokensModel;
use App\Models\LogsModel;
use App\Database\Seeds\ClientSeeder;
use CodeIgniter\I18n\Time;

class Clients extends BaseController
{
    protected $session;

    protected $clientsModel;
    protected $logsModel;
    protected $usersModel;
    protected $vehiclesModel;
    protected $tokensModel;

    protected $res;
    protected $data;

    protected $email;

    public function __construct()
    {
        $this->session = \Config\Services::session();

        $this->clientsModel = new ClientsModel;
        $this->usersModel = new UsersModel;
        $this->vehiclesModel = new VehiclesModel;
        $this->tokensModel = new TokensModel;
        $this->logsModel = new LogsModel;

        $this->email = \Config\Services::email();

        helper('uuid');
        helper('tokenGenerator');

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'CLIENTS',
            'submenu' => '',
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/clientes.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function createClientPage()
    {
        $this->data['title'] = 'REGISTAR CLIENTE';
        $this->data['submenu'] = 'CREATION';

        return view('html/clientes/criar', $this->data);
    }

    public function createClient()
    {
        $client = $this->request->getPost("client");
        $contact = $this->request->getPost("contact");
        $vehicle = $this->request->getPost("vehicle");

        $formData = [
            'client_name'               => $client['clientName'],
            'client_nif'                => $client['clientNif'],
            'client_address'            => $client['clientAddress'],
            'client_city'               => $client['clientCity'],
            'client_post_code'          => $client['clientPostCode'], 
            'client_country'            => $client['clientCountry'],
            'client_county'             => $client['clientCounty'],
            'client_language'           => $client['clientLanguage'],
            'contact_email'             => $contact['contactEmail'],
            'contact_phone_number'      => $contact['contactPhoneNumber'],
            'client_observations'       => $client['clientObservations'],
            'contact_mobile_number'     => $contact['contactMobileNumber'],
            'vehicle_license_plate'     => $vehicle['vehicleLicensePlate'],
            'vehicle_brand'             => $vehicle['vehicleBrand'],
            'vehicle_model'             => $vehicle['vehicleModel'],
            'vehicle_year'              => $vehicle['vehicleYear'],
            'vehicle_chassi'            => $vehicle['vehicleChassi'],
            'vehicle_observations'      => $vehicle['vehicleObservations']
        ];

        $validationRules = [
            'client.clientName' => [
                'label'  => 'Nome', 
                'rules'  => 'required|max_length[200]'
            ],
            'client.clientNif' => [
                'label' => 'Nif', 
                'rules' => 'required|numeric|max_length[9]'
            ],
            'client.clientAddress' => [
                'label'     => 'Morada', 
                'rules'     => 'required'
            ],
            'client.clientCity' => [
                'label'  => 'Cidade', 
                'rules'  => 'required'
            ], 
            'client.clientPostCode' => [
                'label'      => 'Código Postal', 
                'rules'      => 'required'
            ],
            'client.clientCountry' => [
                'label'     => 'País', 
                'rules'     => 'required'
            ],
            'client.clientCounty' => [
                'label'    => 'Distrito', 
                'rules'    => 'required'
            ],
            'client.clientLanguage' => [
                'label'      => 'Idioma', 
                'rules'      => 'required'
            ],
            'contact.contactEmail' => [
                'label'   => 'Email', 
                'rules'   => 'required|valid_email'
            ],
            'contact.contactMobileNumber' => [
                'label'   => 'Telemóvel',
                'rules'   => 'required'
            ],
            'vehicle.vehicleLicensePlate' => [
                'label'           => 'Matrícula',
                'rules'           => 'required|exact_length[8,13]'
            ],
            'vehicle.vehicleBrand' => [
                'label'    => 'Marca',
                'rules'    => 'required'
            ],
            'vehicle.vehicleModel' => [
                'label'    => 'Modelo',
                'rules'    => 'required'
            ],
            'vehicle.vehicleYear' => [
                'label'   => 'Ano',
                'rules'   => 'required|exact_length[4]|numeric'
            ],
            'vehicle.vehicleChassi' => [
                'label'     => 'Chassi',
                'rules'     => 'required'
            ],
        ];

        if(!$this->validate($validationRules))
        {
            $this->res['error'] = true;
            array_push($this->res['popUpMessages'], $this->validator->getErrors());
        }
        else
        {
            $creation_date = new Time('now');
            $tokenExpireDate = $creation_date->addDays(7);
            $USER_TOKEN = generateToken('u');

            $code = $this->clientsModel->getLastClientCode();
            $code = $code ? $code + 1 : 1;
            $code = str_pad($code, 5, '0', STR_PAD_LEFT);

            $client = [
                'client_code'              => $code,
                'client_name'              => $formData['client_name'],
                'client_nif'               => $formData['client_nif'],
                'client_address'           => $formData['client_address'],
                'client_city'              => $formData['client_city'],
                'client_post_code'         => $formData['client_post_code'],
                'client_country'           => $formData['client_country'],
                'client_county'            => $formData['client_county'],
                'client_language'          => $formData['client_language'],
                'client_observations'      => $formData['client_observations'],
                'client_creation_date'     => $creation_date
            ];

            $contact = [
                'contact_third_party_code'  => $code,
                'contact_description'       => 'DEFAULT',
                'contact_email'             => $formData['contact_email'],
                'contact_phone_number'      => $formData['contact_phone_number'],
                'contact_phone_number'      => $formData['contact_mobile_number'],
                'contact_default'           => 'true'
            ];

            $vehicle = [
                'vehicle_third_party_code'   => $code,
                'vehicle_license_plate'      => $formData['vehicle_license_plate'],
                'vehicle_brand'              => $formData['vehicle_brand'],
                'vehicle_model'              => $formData['vehicle_model'],
                'vehicle_year'               => $formData['vehicle_year'],
                'vehicle_chassi'             => $formData['vehicle_chassi'],
                'vehicle_observations'       => $formData['vehicle_observations'],
            ];

            $tokenData = [
                'token'                 => $USER_TOKEN,
                'token_third_party_id'  => $code,
                'token_expire_date'     => $tokenExpireDate
            ];

            if($this->clientsModel->insertClient($client) && $this->clientsModel->insertContact($contact) && $this->vehiclesModel->insertVehicle($vehicle) && $this->tokensModel->insertToken($tokenData))
            {
                $this->logsModel->log([
                    'log_third_party_id' => $this->session->get('id'),
                    'log_type' => 'client_creation',
                    'log_description' => 'User created new client with code ' . $code,
                    'log_date' => date('Y-m-d H:i:s')
                ]);

                $this->accountCreationEmail($formData['contact_email'], $USER_TOKEN);
            }
            else
            {
                $this->res['error'] = true;
                $this->res['popUpMessages'][] = 'An unexpected ERROR occurred.';
            }

        }

        return $this->response->setJSON($this->res);
    }

    private function accountCreationEmail($emailAddress, $USER_TOKEN) : void
    {
        $emailBody = view('html/users/emailTemplate', ['token' => $USER_TOKEN]);

        $this->email->setMailType('html');

        $this->email->setFrom('oficinadigital@gmail.com', 'joão soares');
        $this->email->setTo($emailAddress);

        $this->email->setSubject('account creation');
        
        $this->email->setMessage($emailBody);

        $this->email->send();

        return;
    }

    public function list()
    {
        $this->data['title'] = 'CLIENT LIST';
        $this->data['menu'] = 'CLIENTS';
        $this->data['submenu'] = 'LIST';

        return view('html/clientes/list', $this->data);
    }

    public function populateClientsTable()
    {
        $clientList = $this->clientsModel->getAllActiveClients();
        $dataTableData = [];

        foreach($clientList as $client)
        {
            $dataTableData[] = [
                'client_code' => $client['client_code'],
                'client_nif' => $client['client_nif'],
                'client_name' => $client['client_name'],
                'actions' => "<button class='btn btn-primary consultarButton' name='consultarButton' data-code='".$client['client_code']."' data-bs-toggle='modal'data-bs-target='#consultaModal'><i class='bi bi-eye'></i></button><button class='btn btn-success ms-3 editarButton' name='editarButton' data-code='".$client['client_code']."' data-bs-toggle='modal'data-bs-target='#editarModal'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger ms-3 deleteClientButton' name='deleteButton' data-id='".$client['client_code']."'><i class='bi bi-trash'></i></button>",
            ];
        }

        return $this->response->setJSON($dataTableData);
    }

    public function getAllClients() 
    {
        return $this->response->setJSON($this->clientsModel->getAllClients());
    }   

    public function getClientInfoByCode()
    {
        $client_code = $this->request->getPost('client_code');
        
        return $this->response->setJSON($this->clientsModel->getClientInfoByCode($client_code));
    }

    public function getClientVehicles()
    {
        $clientCode = $this->request->getPost('codigo');

        return $this->response->setJSON($this->clientsModel->getClientVehicles($clientCode));
    }

    public function deleteClient()
    {
        $clientCode = $this->request->getPost('client_code');

        if($this->clientsModel->deleteClient($clientCode))
        {
            $this->res['popUpMessages'][] = 'Client deleted successfully.';
        }
        else
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = 'An unexpected error occurred while deleting the client.';
        }

        return $this->response->setJSON($this->res);
    }

    public function updateClient()
    {
        $client = $this->request->getPost("client");
        $contact = $this->request->getPost("contact");
        $vehicle = $this->request->getPost("vehicle");

        $formData = [
            'client_code'              => $client['clientCode'],
            'client_name'              => $client['clientName'],
            'client_nif'               => $client['clientNif'],
            'client_address'           => $client['clientAddress'],
            'client_city'              => $client['clientCity'],
            'client_post_code'         => $client['clientPostCode'], 
            'client_country'           => $client['clientCountry'],
            'client_county'            => $client['clientCounty'],
            'contact_email'            => $contact['contactEmail'],
            'contact_phone_number'     => $contact['contactPhoneNumber'],
            'contact_mobile_number'    => $contact['contactMobileNumber'],
            'vehicle_license_plate'    => $vehicle['vehicleLicensePlate'],
            'vehicle_brand'            => $vehicle['vehicleBrand'],
            'vehicle_model'            => $vehicle['vehicleModel'],
            'vehicle_year'             => $vehicle['vehicleYear'],
            'vehicle_chassi'           => $vehicle['vehicleChassi']
        ];

        // Validation rules
        $validationRules = [
            'client.clientName' => [
            'label'  => 'Nome', 
            'rules'  => 'required|max_length[200]'
            ],
            'client.clientNif' => [
            'label' => 'Nif', 
            'rules' => 'required|numeric|max_length[9]'
            ],
            'client.clientAddress' => [
            'label'     => 'Morada', 
            'rules'     => 'required'
            ],
            'client.clientCity' => [
            'label'  => 'Cidade', 
            'rules'  => 'required'
            ], 
            'client.clientPostCode' => [
            'label'      => 'Código Postal', 
            'rules'      => 'required'
            ],
            'client.clientCountry' => [
            'label'     => 'País', 
            'rules'     => 'required'
            ],
            'client.clientCounty' => [
            'label'    => 'Distrito', 
            'rules'    => 'required'
            ],
            'contact.contactEmail' => [
            'label'   => 'Email', 
            'rules'   => 'required|valid_email'
            ],
            'contact.contactPhoneNumber' => [
            'label'         => 'Telefone', 
            'rules'         => 'required'
            ],
            'contact.contactMobileNumber' => [
            'label'   => 'Telemóvel',
            'rules'   => 'required'
            ],
            'vehicle.vehicleLicensePlate' => [
            'label'           => 'Matrícula',
            'rules'           => 'required|exact_length[8,13]'
            ],
            'vehicle.vehicleBrand' => [
            'label'    => 'Marca',
            'rules'    => 'required'
            ],
            'vehicle.vehicleModel' => [
            'label'    => 'Modelo',
            'rules'    => 'required'
            ],
            'vehicle.vehicleYear' => [
            'label'   => 'Ano',
            'rules'   => 'required|exact_length[4]|numeric'
            ],
            'vehicle.vehicleChassi' => [
            'label'     => 'Chassi',
            'rules'     => 'required'
            ],
        ];

        if(!$this->validate($validationRules))
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = $this->validator->getErrors();
        }
        else
        {
            // Update client, contact, and vehicle information
            $clientData = [
                'client_name'        => $formData['client_name'],
                'client_nif'         => $formData['client_nif'],
                'client_address'     => $formData['client_address'],
                'client_city'        => $formData['client_city'],
                'client_post_code'   => $formData['client_post_code'],
                'client_country'     => $formData['client_country'],
                'client_county'      => $formData['client_county'],
            ];

            $contactData = [
                'contact_email'         => $formData['contact_email'],
                'contact_phone_number'  => $formData['contact_phone_number'],
                'contact_mobile_number' => $formData['contact_mobile_number'],
            ];

            $vehicleData = [
                'vehicle_license_plate' => $formData['vehicle_license_plate'],
                'vehicle_brand'         => $formData['vehicle_brand'],
                'vehicle_model'         => $formData['vehicle_model'],
                'vehicle_year'          => $formData['vehicle_year'],
                'vehicle_chassi'        => $formData['vehicle_chassi'],
            ];

            $clientCode = $formData['client_code'];

            $clientUpdated = $this->clientsModel->updateClient($clientCode, $clientData, $contactData, $vehicleData);

            if ($clientUpdated) {
                $this->logsModel->log([
                    'log_third_party_id' => $this->session->get('id'),
                    'log_type' => 'client_update',
                    'log_description' => 'User updated client with code ' . $clientCode,
                    'log_date' => date('Y-m-d H:i:s')
                ]);
                $this->res['popUpMessages'][] = 'Client updated successfully.';
            } else {
                $this->res['error'] = true;
                $this->res['popUpMessages'][] = 'An unexpected error occurred while updating the client.';
            }
        }

        return $this->response->setJSON($this->res);
    }
}