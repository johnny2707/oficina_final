<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $session;
    protected $data;

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->data = [
            'menu'          => 'HOME',
            'subMenu'       => '',
            'customCSS'     => '',
            'customJS'      => '<script src="'.base_url('assets/js/custom/dashboard.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index() {
        $this->data['title'] = "DASHBOARD";

        return view('html/dashboard/index', $this->data);
    }
}
