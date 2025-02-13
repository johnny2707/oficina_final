<?php namespace App\Models;

use CodeIgniter\Model;

class LogsModel extends Model
{
    protected $db;

    protected $table = 'tb_logs';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function index($log)
    {
        $this->db->table($this->table)->insert($log);
    }
}