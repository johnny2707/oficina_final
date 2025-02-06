<?php namespace App\Controllers;

use App\Models\VehiclesModel;

class Vehicles extends BaseController
{
    protected $session;

    protected $res;
    protected $data;
    
    protected $vehiclesModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->vehiclesModel = new VehiclesModel;

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];

        $this->data = [
            'menu' => 'VEHICLE',
            'submenu' => '',
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/vehicles.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index()
    {
        $this->data['title'] = 'MY VEHICLE';
        $this->data['submenu'] = 'MY VEHICLE';

        return view('html/vehicles/index', $this->data);        
    }

    public function getUserVehicles()
    {
        $userThirdPartyId = $this->session->get('id');

        return $this->response->setJSON($this->vehiclesModel->getVehiclesByThirdPartyCode($userThirdPartyId));
    }

    public function getVehicleData()
    {
        $vehicleId = $this->request->getPost("vehicleId");

        return $this->response->setJSON($this->vehiclesModel->getVehicleDataById($vehicleId));
    }

//     public function getVehicleByLicensePlate()
//     {
//         $licensePlate = $this->request->getPost("licensePlate");

//         return $this->response->setJSON($this->vehiclesModel->getVehicleByLicensePlate($licensePlate));
//     }

//     public function getAllVehicles()
//     {
//         return $this->response->setJSON($this->vehiclesModel->getAllVehicles());
//     }
}