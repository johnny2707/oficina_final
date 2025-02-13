<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ClientsModel;
use CodeIgniter\I18n\Time;

class Services extends BaseController 
{
    protected $session;
    protected $res;
    protected $data;

    public function __construct() 
    {
        $this->session = \Config\Services::session();

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
}
