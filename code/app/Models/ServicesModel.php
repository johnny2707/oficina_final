<?php namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model 
{
    protected $db;

    protected $table = 'tb_services';
    protected $useSoftDeletes = true;

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getAllServices() 
    {
        $query = $this->db->table('tb_services')->select('*');

        return $query->get()->getResultArray();
    }

    public function getAllActiveServices() 
    {
        $query = $this->db->table('tb_services')->select('*')->where('service_status', 1);

        return $query->get()->getResultArray();
    }

    public function createService($data) 
    {
        $this->db->table($this->table)->insert($data);

        return $this->db->insertID();
    }

    public function getLastServiceCode() 
    {
        $query = $this->db->table($this->table)
                          ->select('service_code')
                          ->orderBy('service_id', 'DESC')
                          ->limit(1)
                          ->get();

        if ($query->getNumRows() > 0) {
            return $query->getRowArray()['service_code'];
        }

        return null;
    }

    public function insertProducts($products, $serviceId) 
    {
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'service_id'         => $serviceId,
                'product_id'         => $product['product_id'],
                'product_quantity'   => $product['product_quantity']
            ];
        }

        if (!empty($data)) {
            return $this->db->table('tb_services_products')->insertBatch($data);
        }

        return false;
    }
}
