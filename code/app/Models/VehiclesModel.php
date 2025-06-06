<?php namespace App\Models;

use CodeIgniter\Model;

class VehiclesModel extends Model
{
    protected $db;

    protected $table = 'tb_clients_vehicles';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getVehiclesByThirdPartyCode($userId)
    {
        $query = $this->db->table($this->table)->select('*')->where('vehicle_third_party_code', $userId);

        return $query->get()->getResultArray();
    }

    public function insertVehicle($data)
    {
        if($this->db->table($this->table)->insert($data))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllVehicles()
    {
        $query = $this->db->table($this->table)->select('*');

        return $query->get()->getResultArray();
    }

    public function getVehicleByLicensePlate($license_plate)
    {
        $query = $this->db->table($this->table)->select("*")->where('vehicle_license_plate', $license_plate);

        return $query->get()->getResultArray();
    }

    public function getVehicleById($vehicle_id)
    {
        $query = $this->db->table($this->table)->select("*")->where('vehicle_id', $vehicle_id);

        return $query->get()->getResultArray();
    }
}