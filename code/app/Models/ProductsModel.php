<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $db;

    protected $table = 'tb_products';
    protected $useSoftDeletes = true;

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getProduct($productID)
    {
        $query = $this->db->table('tb_products')->select('product_code, product_description, unit_description AS product_unit, product_price')->join('tb_products', 'product_unit_id = unit_id')->where('product_id', $productID);
    
        return $query->get()->getResultArray();
    }

    public function getProductByCode($productCode)
    {
        $query = $this->db->table('tb_services')->select('service_code, service_description, unit_code, service_price_without_iva')->join('tb_units', 'service_unit_id = unit_id')->where('service_code', $productCode);
    
        return $query->get()->getResultArray();
    }

    public function getAllProducts()
    {
        $query = $this->db->table('tb_products')->select('tb_products.*, unit_description AS product_unit')
                                                ->join('tb_units', 'product_unit_id = unit_id');

        return $query->get()->getResultArray();
    }

    public function createProduct($data)
    {
        $this->db->table('tb_products')->insert($data);
    }

    public function getAllUnits()
    {
        $query = $this->db->table('tb_units')->select('unit_id, unit_code')->get();
        
        return $query->getResultArray();
    }


    public function getLowStockProducts($threshold = 5)
    {
        $query = $this->db->table('tb_products')
                          ->select('product_id, product_code, product_description, product_stock, unit_description AS product_unit')
                          ->join('tb_units', 'product_unit_id = unit_id')
                          ->where('product_stock <=', $threshold)
                          ->get();

        return $query->getResultArray();
    }
}
