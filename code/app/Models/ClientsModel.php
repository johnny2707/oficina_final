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

    public function getAllClients()
    {
        return $this->db->table('tb_clients')->select('client_code')->get()->getResultArray();
    }

    public function getClientInfoByCode($clientCode)
    {
        $query = $this->db->table($this->table)
                          ->select($this->table . '.*, tb_contacts.*')
                          ->join('tb_contacts', $this->table . '.client_code = tb_contacts.contact_third_party_code', 'left')
                          ->where($this->table . '.client_code', $clientCode)
                          ->where('tb_contacts.contact_default', "true");
        
        return $query->get()->getResultArray();
    }

    public function getClientVehicles($clientCode) 
    {
        return $this->db->table('tb_clients_vehicles')->select('vehicle_license_plate')->where('vehicle_third_party_code', $clientCode)->get()->getResultArray();
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