<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ClientsModel;
use App\Models\ServicesModel;
use CodeIgniter\I18n\Time;
use Complex\Functions;

class Services extends BaseController 
{
    protected $session;
    protected $res;
    protected $data;
    protected $servicesModel;

    public function __construct() 
    {
        $this->session = \Config\Services::session();

        $this->servicesModel = new ServicesModel;

        helper('uuid');
        
        $this->res = array(
            'error' => FALSE,
            'popUpMessages' => array(),
            'staticMessages' => array()
        );

        $this->data = [
            'customCSS'     => '',
            'customJS'      => '<script src="'. base_url('assets/js/custom/services.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index() 
    {
        $this->data['title'] = 'Ficha de Reparação';
        $this->data['menu'] = 'SERVICES';

        return view('html/services/index', $this->data);
    }

    public Function getAllServices()
    {
        $services = $this->servicesModel->GetAllServices();

        return $this->response->setJSON($services);
    }

    public function createServicePage() 
    {
        $this->data['title'] = 'Criar Serviço';
        $this->data['menu'] = 'SERVICES';

        return view('html/services/create', $this->data);
    }

    public function createService() 
    {
        $service = $this->request->getPost();

        if (empty($service['service_name']) || empty($service['service_price'])) {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = 'Por favor, preencha todos os campos obrigatórios.';
            return $this->response->setJSON($this->res);
        }

        $code = $this->servicesModel->getLastServiceCode();
        $code = $code ? $code + 1 : 1;
        $service['service_code'] = str_pad($code, 5, '0', STR_PAD_LEFT);

        $service['created_at'] = Time::now('Europe/Lisbon')->toDateTimeString();

        $products = $service['products'] ?? [];
        unset($service['products']);

        $serviceID = $this->servicesModel->createService($service);

        $this->servicesModel->insertProducts($products, $serviceID);
               

        return $this->response->setJSON($this->res);
    }

    public function startWork() 
    {
        $serviceID = $this->request->getPost('serviceID');

        if (empty($serviceID)) {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = 'Serviço inválido.';
            return $this->response->setJSON($this->res);
        }

        $service = $this->servicesModel->getServiceById($serviceID);

        if (!$service) {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = 'Serviço não encontrado.';
            return $this->response->setJSON($this->res);
        }

        // Update service status to "In Progress"
        $this->servicesModel->updateServiceStatus($serviceID, 'In Progress');

        // Add logic to start the work here...

        return $this->response->setJSON($this->res);
    }

    public function populateServicesTable()
    {
        $serviceList = $this->servicesModel->getAllActiveServices();
        $dataTableData = [];

        foreach($serviceList as $service)
        {
            $dataTableData[] = [
                'service_code' => 'S' . $service['service_code'],
                'service_name' => $service['service_name'],
                'service_duration' => $service['service_duration'],
                'service_price' => $service['service_price'],
                'actions' => "<button class='btn btn-primary consultarButton' name='consultarButton' data-code='".$service['service_code']."' data-bs-toggle='modal'data-bs-target='#consultaModal'><i class='bi bi-eye'></i></button><button class='btn btn-success ms-3 editarButton' name='editarButton' data-code='".$service['service_code']."' data-bs-toggle='modal'data-bs-target='#editarModal'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger ms-3 deleteClientButton' name='deleteButton' data-id='".$service['service_code']."'><i class='bi bi-trash'></i></button>",
            ];
        }

        return $this->response->setJSON($dataTableData);
    }
}
