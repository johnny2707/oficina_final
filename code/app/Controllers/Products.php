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

        return view('html/products/index', $this->data);
    }

    public function createProductPage()
    {
        $this->data['title'] = 'CRIAR PRODUTO';
        $this->data['submenu'] = "CREATE";

        return view('html/products/create', $this->data);   
    }

    public function createProduct()
    {
        $productCode = $this->request->getPost('productCode');
        $productDescription = $this->request->getPost('productDescription');
        $productPrice = $this->request->getPost('productPrice');
        $productUnit = $this->request->getPost('productUnit');
        $productStock = $this->request->getPost('productStock');

        $productData = [
            'product_code' => $productCode,
            'product_description' => $productDescription,
            'product_price' => $productPrice,
            'product_unit_id' => $productUnit,
            'product_stock' => $productStock
        ];

        $this->res['popUpMessages'][] = $this->productsModel->createProduct($productData);

        return $this->response->setJSON($this->res);
    }

    public function getProduct() 
    {
        $productID = $this->request->getPost('product_id');
        
        return $this->response->setJSON($this->productsModel->getProduct($productID));
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

    public function populateProductsTable()
    {
        $productsList = $this->productsModel->getAllProducts();
        $dataTableData = [];

        foreach($productsList as $product)
        {
            $dataTableData[] = [
                'product_code' => "P" . $product['product_code'],
                'product_description' => $product['product_description'],
                'product_price' => $product['product_price'],
                'product_unit' => $product['product_unit'],
                'product_stock' => $product['product_stock'],
                'actions' => "<button class='btn btn-primary consultarButton' name='consultarButton' data-code='".$product['product_code']."' data-bs-toggle='modal'data-bs-target='#exampleModal'><i class='bi bi-eye'></i></button><button class='btn btn-success ms-3' name='editarButton' data-code='".$product['product_code']."'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger ms-3' name='deleteButton' data-id='".$product['product_code']."'><i class='bi bi-trash'></i></button>",
            ];
        }

        return $this->response->setJSON($dataTableData);
    }

    public function getAllUnits()
    {
        $units = $this->productsModel->getAllUnits();

        return $this->response->setJSON($units);
    }
}