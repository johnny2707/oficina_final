<?php namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\UsersModel;
use App\Models\VehiclesModel;
use App\Models\LogsModel;

class Fatura extends BaseController
{
    protected $session;
    protected $clientsModel;
    protected $res;
    protected $data;
    protected $usersModel;
    protected $seeder;
    protected $email;
    protected $db;
    protected $vehiclesModel;
    protected $logsModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->clientsModel = new ClientsModel;
        $this->usersModel = new UsersModel;
        $this->vehiclesModel = new VehiclesModel;
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
            'menu' => 'FATURA',
            'submenu' => 'INDEX',
            'clientData' => array(),
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/fatura.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function criar()
    {
        $this->data['title'] = 'ficha de reparação';

        return view('html/fatura/index', $this->data);
    }
}