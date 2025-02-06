<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use DateTime;

class ClientsModel extends Model
{
    protected $db;

    protected $table = 'tb_clients';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function insertClient($data)
    {
        if($this->db->table($this->table)->insert($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function updateClient()
    {

    }

    public function deleteClient()
    {
        
    }

    public function getClientInfo()
    {

    }

    public function insertContact($data)
    {
        if($this->db->table('tb_contacts')->insert($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}