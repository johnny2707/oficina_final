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
}
