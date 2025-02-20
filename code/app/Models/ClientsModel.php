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
        return $this->db->table('tb_clients')->select('*')->get()->getResultArray();
    }

    public function getClientInfoByCode($clientCode)
    {
        // Fetch the main client information
        $clientQuery = $this->db->table($this->table)
                                ->where("{$this->table}.client_code", $clientCode)
                                ->get();

        $clientData = $clientQuery->getRowArray(); // Get the main client as a single row

        if (!$clientData) {
            return []; // Return an empty array if no client is found
        }

        // Fetch related contacts
        $contactQuery = $this->db->table('tb_contacts')
                                ->where('contact_third_party_code', $clientCode)
                                ->get();
        $contacts = $contactQuery->getResultArray();

        // Fetch related vehicles
        $vehicleQuery = $this->db->table('tb_clients_vehicles')
                                ->where('vehicle_third_party_code', $clientCode)
                                ->get();
        $vehicles = $vehicleQuery->getResultArray();

        // Combine the results into a single structure
        return [
            'client' => $clientData,
            'contacts' => $contacts,
            'vehicles' => $vehicles
        ];
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