<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $db;

    protected $table = 'tb_services';
    protected $useSoftDeletes = true;

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getProductByCode($productCode)
    {
        $query = $this->db->table('tb_services')->select('service_code, service_description, unit_code, service_price_without_iva')->join('tb_units', 'service_unit_id = unit_id')->where('service_code', $productCode);
    
        return $query->get()->getResultArray();
    }

    public function getAllProducts()
    {
        $query = $this->db->table('tb_products')->select('*');

        return $query->get()->getResultArray();
    }
}