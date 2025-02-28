<?php namespace App\Controllers;

use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;
    
    protected $data;
    protected $res;

    public function __construct()
    {
        $this->productsModel = new ProductsModel;

        $this->data = [
            'menu' => 'PRODUTOS',
            'submenu' => '',
            'customCSS' => '',
            'customJS' => '<script src="'. base_url('assets/js/custom/products.js?' . $_ENV['VERSION'] ).'"></script>'
        ];

        $this->res = [
            'error' => FALSE,
            'popUpMessages' => [],
            'staticMessages' => []
        ];
    }

    public function index()
    {
        $this->data['title'] = 'PRODUTOS';
        $this->data['submenu'] = 'INDEX';
        $this->data['products'] = $this->productsModel->getAllProducts();

        return view('html/products/index', $this->data);
    }

    public function getProductByCode()
    {
        $productCode = $this->request->getPost('codigo');
        
        return $this->response->setJSON($this->productsModel->getProductByCode($productCode));
    }

    public function getAllProducts()
    {
        return $this->response->setJSON($this->productsModel->getAllProducts());
    }
}