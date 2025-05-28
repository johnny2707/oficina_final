<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $session;
    protected $data;
    protected $eventsModel;
    protected $productsModel;
    protected $lowStockThreshold = 5; // Define the threshold for low stock

    public function __construct() {
        $this->session = \Config\Services::session();

        $this->productsModel = new \App\Models\ProductsModel();
        $this->eventsModel = new \App\Models\EventsModel();
        
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
        $this->data['vehicles'] = $this->eventsModel->getDailyEventInfo();

        return view('html/dashboard/index', $this->data);
    }
}
