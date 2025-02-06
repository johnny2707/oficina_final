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

    public function getAllTypes()
    {
        $query = $this->db->table('tb_events_types')->select('*');

        return $query->get()->getResultArray();
    }

    public function getAllEventsByDateRange($start, $end)
    {
        $query = $this->db->table('tb_events')->select('*')
                                              ->join('tb_events_types', 'tb_events.event_type = tb_events_types.type_id')
                                              ->join('tb_clients_vehicles', 'tb_events.event_vehicle_id = tb_clients_vehicles.vehicle_id')
                                              ->where("tb_events.event_date >= ", $start)
                                              ->where("tb_events.event_date <=", $end);            
        
        return $query->get();
    }

    public function getEventDataById($eventId)
    {
        $query = $this->db->table($this->table)->select('*')
                                               ->join('tb_events_types', 'tb_events.type = tb_events_types.id')
                                               ->join('tb_clients_vehicles', 'tb_events.car_id = tb_clients_vehicles.id')
                                               ->where("tb_events.id >= ", $eventId);
                                               
        return $query->get()->getResultArray();
    }
}