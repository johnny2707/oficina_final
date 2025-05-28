<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Config\Services;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Framework\Error\Warning;

class EventsModel extends Model
{
    protected $db;

    protected $table = 'tb_events';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function createEvent($eventData)
    {
        if(!$this->db->table('tb_events')->set($eventData)->insert())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getAllEvents($start, $end)
    {
        $query = $this->db->table('tb_events')->select('*');

        return $query->get();
    }

    public function getAllEventsByDateRange($start, $end)
    {
        $query = $this->db->table('tb_events')->select('*')
                                              ->join('tb_clients_vehicles', 'tb_events.event_vehicle_license_plate = tb_clients_vehicles.vehicle_license_plate')
                                              ->join('tb_services', 'tb_events.event_service_id = tb_services.service_id')
                                              ->where("tb_events.event_date >= ", $start)
                                              ->where("tb_events.event_date <=", $end);            
        
        return $query->get();
    }

    public function getEventDataById($eventId)
    {
        $query = $this->db->table($this->table)->select('*')
                                               ->join('tb_clients_vehicles', 'tb_events.event_vehicle_license_plate = tb_clients_vehicles.vehicle_license_plate')
                                               ->where("tb_events.event_id >= ", $eventId);
                                               
        return $query->get()->getResultArray();
    }


    public function getOnProgressEvents()
    {
        $query = $this->db->table('tb_events')->select('*')
                                              ->join('tb_clients_vehicles', 'tb_events.event_vehicle_license_plate = tb_clients_vehicles.vehicle_license_plate')
                                              ->where("event_status", 1)
                                              ->get()->getResultArray();
        
        return $query;
    }

    public function getEventData($event_id)
    {
        $query = $this->db->table('tb_events')->select('*')
                                               ->join('tb_clients_vehicles', 'tb_events.event_vehicle_license_plate = tb_clients_vehicles.vehicle_license_plate')
                                               ->join('tb_services', 'tb_events.event_service_id = tb_services.service_id')
                                               ->join('tb_clients', 'tb_clients_vehicles.vehicle_third_party_code = tb_clients.client_code')
                                               ->where("tb_events.event_id", $event_id)
                                               ->get()
                                               ->getResultArray();
        
        $service_id = $query[0]['service_id'];
        
        $query2 = $this->db->table('tb_products')->select('*')
                                               ->join('tb_services_products', 'tb_products.product_id = tb_services_products.product_id')
                                               ->where("tb_services_products.service_id", $service_id)
                                               ->get()
                                               ->getResultArray();

        $data = [
            'event' => $query,
            'products' => $query2
        ];                                       

        return $data;
    }

    public function changeProgress($data)
    {
        $eventId = $data['event_id'];
        $progress = $data['event_status'];

        $this->db->table('tb_events')->set('event_status', $progress)
                                     ->where('event_id', $eventId)
                                     ->update();
    }


    public function getInterventionHistory($licensePlates)
    {
        $data = [];

        foreach($licensePlates as $license_plate)
        {
            $query = $this->db->table('tb_events')->select('*')
                                                ->join('tb_clients_vehicles', 'tb_events.event_vehicle_license_plate = tb_clients_vehicles.vehicle_license_plate')
                                                ->join('tb_services', 'tb_events.event_service_id = tb_services.service_id')
                                                ->join('tb_clients', 'tb_clients_vehicles.vehicle_third_party_code = tb_clients.client_code')
                                                ->where("event_vehicle_license_plate", $license_plate)
                                                ->get()
                                                ->getResultArray();

            if (empty($query)) {
                $interventionData = [
                    'license_plate' => $license_plate,
                    'event' => [],
                    'products' => []
                ];
                array_push($data, $interventionData);
                continue;
            }
            
            $service_id = $query[0]['service_id'];
            
            $query2 = $this->db->table('tb_products')->select('*')
                                                ->join('tb_services_products', 'tb_products.product_id = tb_services_products.product_id')
                                                ->where("tb_services_products.service_id", $service_id)
                                                ->get()
                                                ->getResultArray();

            $interventionData = [
                'license_plate' => $license_plate,
                'event' => $query,
                'products' => $query2
            ];

            array_push($data, $interventionData);
        }

        return $data;
    }

    public function getOnProgressUserEvents($licensePlates)
    {
        $data = [];

        foreach($licensePlates as $license_plate)
        {
            $query = $this->db->table('tb_events')->select('*')
                                                ->join('tb_clients_vehicles', 'tb_events.event_vehicle_license_plate = tb_clients_vehicles.vehicle_license_plate')
                                                ->join('tb_services', 'tb_events.event_service_id = tb_services.service_id')
                                                ->join('tb_clients', 'tb_clients_vehicles.vehicle_third_party_code = tb_clients.client_code')
                                                ->where("event_vehicle_license_plate", $license_plate)
                                                ->get()
                                                ->getResultArray();

            if (empty($query)) {
                $interventionData = [
                    'license_plate' => $license_plate,
                    'event' => [],
                    'products' => []
                ];
                array_push($data, $interventionData);
                continue;
            }
            
            $service_id = $query[0]['service_id'];
            
            $query2 = $this->db->table('tb_products')->select('*')
                                                ->join('tb_services_products', 'tb_products.product_id = tb_services_products.product_id')
                                                ->where("tb_services_products.service_id", $service_id)
                                                ->get()
                                                ->getResultArray();

            $interventionData = [
                'license_plate' => $license_plate,
                'event' => $query,
                'products' => $query2
            ];

            array_push($data, $interventionData);
        }

        return $data;
    }
}