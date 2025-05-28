<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $session;
    protected $data;
    protected $eventsModel;
    protected $productsModel;
    protected $usersModel;
    protected $vehiclesModel;
    protected $lowStockThreshold = 5; // Define the threshold for low stock

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->productsModel = new \App\Models\ProductsModel();
        $this->eventsModel = new \App\Models\EventsModel();
        $this->usersModel = new \App\Models\UsersModel();
        $this->vehiclesModel = new \App\Models\VehiclesModel();
        
        $this->data = [
            'menu'          => 'HOME',
            'subMenu'       => '',
            'customCSS'     => '',
            'customJS'      => '<script src="'.base_url('assets/js/custom/dashboard.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index() {
        $this->data['title'] = "DASHBOARD";

        $this->data['lowStockProducts'] = $this->productsModel->getLowStockProducts($this->lowStockThreshold);
        $this->data['vehicles'] = $this->eventsModel->getOnProgressEvents();

        $userId = $this->session->get('id');
        $userThirdPartyCode = $this->usersModel->getUserThirdPartyId($userId);

        $code = $userThirdPartyCode[0]['user_third_party_code'];

        $vehicleData = $this->vehiclesModel->getVehiclesByThirdPartyCode($code);

        $licensePlates = [];

        foreach($vehicleData as $vehicle)
        {
            array_push($licensePlates, $vehicle['vehicle_license_plate']);
        }

        $this->data['userVehicles'] = $this->eventsModel->getOnProgressUserEvents($licensePlates);

        return view('html/dashboard/index', $this->data);
    }
}
