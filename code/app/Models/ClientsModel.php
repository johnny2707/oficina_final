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

    public function updateClient($clientCode, $clientData, $contactData, $vehicleData)
    {
        // Update the main client information
        $this->db->table($this->table)
                 ->where('client_code', $clientCode)
                 ->update($clientData);

        // Update contacts
        if (!empty($contactData)) {
            foreach ($contactData as $contact) {
                $this->db->table('tb_contacts')
                         ->where('contact_third_party_code', $clientCode)
                         ->where('contact_id', $contact['contact_id'])
                         ->update($contact);
            }
        }

        // Update vehicles
        if (!empty($vehicleData)) {
            foreach ($vehicleData as $vehicle) {
                $this->db->table('tb_clients_vehicles')
                         ->where('vehicle_third_party_code', $clientCode)
                         ->where('vehicle_id', $vehicle['vehicle_id'])
                         ->update($vehicle);
            }
        }

        return true;
    }

    public function deleteClient($clientCode)
    {
        // Soft delete the client by updating the deleted_at field
        $this->db->table($this->table)
                ->where('client_code', $clientCode)
                ->update(['deleted_at' => (new DateTime())->format('Y-m-d H:i:s')]);
        
        return true;
    }

    public function getAllClients()
    {
        return $this->db->table('tb_clients')->select('*')->get()->getResultArray();
    }

    public function getAllActiveClients()
    {
        return $this->db->table('tb_clients')->select('*')->where('deleted_at', null)->get()->getResultArray();
    }

    public function getClientInfoByCode($clientCode)
    {
        // Fetch the main client information
        $clientQuery = $this->db->table($this->table)
                                ->where("client_code", $clientCode)
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

    public function getLastClientCode()
    {
        $query = $this->db->table($this->table)
                          ->select('client_code')
                          ->orderBy('client_code', 'DESC')
                          ->limit(1)
                          ->get();

        $result = $query->getRowArray();
        
        return $result ? $result['client_code'] : null; // Return the last client code or null if not found
    }
}