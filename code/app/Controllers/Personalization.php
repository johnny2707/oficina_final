<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\LogsModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use PhpOffice\PhpSpreadsheet\Calculation\Engineering\BitWise;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;
use PhpParser\Node\Expr\Empty_;

class Personalization extends BaseController 
{   
    protected $session;
    protected $usersModel;
    protected $logsModel;
    protected $res;
    protected $data;
    protected $email;
    protected $validation;

    public function __construct() 
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel;
        $this->logsModel = new LogsModel;
        $this->email = \Config\Services::email();
        $this->validation = \Config\Services::validation();
        
        helper('codeGenerator');

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => array(),
            'staticMessages' => array()
        ];

        $this->data = [
            'customCSS'  => '',
            'customJS'   => '<script src="'.base_url('assets/js/custom/personalization.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index() 
    {
        $this->data['title'] = 'Personalização';
        $this->data['menu'] = 'PERSONALIZATION';

        return view('html/personalization/index', $this->data);
    }
}
