<?php namespace App\Controllers;

use App\Models\VehiclesModel;
use App\Models\UsersModel;

class Vehicles extends BaseController
{
    protected $session;

    protected $res;
    protected $data;
    
    protected $vehiclesModel;
    protected $usersModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->vehiclesModel = new VehiclesModel;
        $this->usersModel = new UsersModel;

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

    public function getAllVehicles()
    {
        $vehicles = $this->vehiclesModel->getAllVehicles();

        return $this->response->setJSON($vehicles);
    }

    public function index()
    {
        $this->data['title'] = 'MY VEHICLE';
        $this->data['submenu'] = 'MY VEHICLE';

        return view('html/vehicles/index', $this->data);        
    }

    public function getUserVehicles()
    {
        $userId = $this->session->get('id');
        $userThirdPartyCode = $this->usersModel->getUserThirdPartyId($userId);

        return $this->response->setJSON($this->vehiclesModel->getVehiclesByThirdPartyCode($userThirdPartyCode[0]['user_third_party_code']));
    }

    public function getVehicleByLicensePlate()
    {
        $licensePlate = $this->request->getPost("license_plate");

        return $this->response->setJSON($this->vehiclesModel->getVehicleByLicensePlate($licensePlate));
    }

    public function getVehicleById()
    {
        $vehicleId = $this->request->getPost("vehicle_id");

        return $this->response->setJSON($this->vehiclesModel->getVehicleById($vehicleId));
    }
}