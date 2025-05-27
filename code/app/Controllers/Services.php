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

        if (empty($service['name']) || empty($service['price'])) {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = 'Por favor, preencha todos os campos obrigatórios.';
            return $this->response->setJSON($this->res);
        }

        $code = $this->servicesModel->getLastServiceNumber();
        $code = $code ? $code['code'] + 1 : 1;
        $service['service_code'] = str_pad($code, 5, '0', STR_PAD_LEFT);

        $service['created_at'] = Time::now('Europe/Lisbon')->toDateTimeString();

        $products = $service['products'] ?? [];
        unset($service['products']);

        $serviceID = $this->servicesModel->insert($service);

        $this->servicesModel->insertProducts($products, $serviceID);
               

        return $this->response->setJSON($this->res);
    }
}
