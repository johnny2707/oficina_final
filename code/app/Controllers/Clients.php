<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;
use App\Models\VehiclesModel;
use App\Models\TokensModel;
use CodeIgniter\I18n\Time;

class Clients extends BaseController
{
    protected $session;

    protected $clientsModel;
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
        $this->data['title'] = 'registar cliente';
        $this->data['submenu'] = 'CREATION';

        return view('html/clientes/criar', $this->data);
    }

    public function createClient()
    {
        $clientData = $this->request->getPost("client");
        $vehicleData = $this->request->getPost("vehicle");

        $formData = [
            'client_code' => $clientData['clientCode'],
            'client_name' => $clientData['clientName'],
            'client_nif' => $clientData['clientNif'],
            'client_address' => $clientData['clientAddress'],
            'client_city' => $clientData['clientCity'],
            'client_post_code' => $clientData['clientPostCode'], 
            'client_country' => $clientData['clientCountry'],
            'client_county' => $clientData['clientCounty'],
            'client_language' => $clientData['clientLanguage'],
            'client_email' => $clientData['clientEmail'],
            'client_phone_number' => $clientData['clientPhoneNumber'],
            'client_observations' => $clientData['clientObservations'],
            'user_group_id' => $clientData['clientGroup'],
            'vehicle_license_plate' => $vehicleData['vehicleLicensePlate'],
            'vehicle_brand' => $vehicleData['vehicleBrand'],
            'vehicle_model' => $vehicleData['vehicleModel'],
            'vehicle_year' => $vehicleData['vehicleYear'],
            'vehicle_chassi' => $vehicleData['vehicleChassi'],
            'vehicle_observations' => $vehicleData['vehicleObservations']
        ];

        $validationRules = [
            'client.clientCode' => [
                'label'  => 'Código Cliente', 
                'rules'  => 'required|numeric'
            ],
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
            'client.clientEmail' => [
                'label'   => 'Email', 
                'rules'   => 'required|valid_email'
            ],
            'client.clientPhoneNumber' => [
                'label'         => 'Telemóvel', 
                'rules'         => 'required'
            ],
            'client.clientGroup' => [
                'label'   => 'Grupo',
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

            $client = [
                'client_code'              => $formData['client_code'],
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
                'contact_third_party_code'  => $formData['client_code'],
                'contact_description'       => 'DEFAULT',
                'contact_email'             => $formData['client_email'],
                'contact_phone_number'      => $formData['client_phone_number'],
                'contact_default'           => 'true'
            ];

            $vehicle = [
                'vehicle_third_party_code'   => $formData['client_code'],
                'vehicle_license_plate'      => $formData['vehicle_license_plate'],
                'vehicle_brand'              => $formData['vehicle_brand'],
                'vehicle_model'              => $formData['vehicle_model'],
                'vehicle_year'               => $formData['vehicle_year'],
                'vehicle_chassi'             => $formData['vehicle_chassi'],
                'vehicle_observations'       => $formData['vehicle_observations'],
            ];

            $tokenData = [
                'token'                 => $USER_TOKEN,
                'token_third_party_id'  => $formData['client_code'],
                'token_expire_date'     => $tokenExpireDate
            ];

            if($this->clientsModel->insertClient($client) && $this->clientsModel->insertContact($contact) && $this->vehiclesModel->insertVehicle($vehicle) && $this->tokensModel->insertToken($tokenData))
            {
                $this->accountCreationEmail($formData['client_email'], $USER_TOKEN);
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

    //         $clientInfo = [
    //             'id' => $client_id,
    //             'nif' => $formData['nif'],
    //             'name' => $formData['name'],
    //             'creation_date' => $creation_date
    //         ];

    //         $contactInfo = [
    //             'client_id' => $client_id,
    //             'description' => $formData['description'],
    //             'phone_number' => $formData['phoneNumber'],
    //             'email_address' => $formData['emailAddress'],
    //             'default' => 1
    //         ];

    //         $this->clientsModel->createClient($clientInfo, $contactInfo);

    //         $this->accountCreation($formData['emailAddress']);

    //         $this->res['popUpMessages'][] = 'sucesso!';
    //     }

    //     return $this->response->setJSON($this->res);
    // }
}