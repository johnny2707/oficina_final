<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Config\Services;
use PhpParser\Node\Expr\FuncCall;

class MechanicsModel extends Model
{
    protected $db;

    protected $table = 'tb_mechanics';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function createMechanic($mechanicData)
    {
        $this->db->table('tb_mechanics')->insert($mechanicData);
    }

    public function getAllMechanics()
    {
        $query = $this->db->table('tb_mechanics')->select('*');

        return $query->get()->getResultArray();
    }

    public function getMechanicData($mechanic_id)
    {
        $query = $this->db->table('tb_mechanics')->select('*')->where('id', $mechanic_id);

        return $query->get()->getResultArray();
    }

    public function updateMechanicInfo($mechanicData)
    {
        $mechanic_id = $mechanicData['id'];
        unset($mechanicData['id']);

        $this->db->table('tb_mechanics')->set($mechanicData)->where('id', $mechanic_id)->update();

        if($this->db->affectedRows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function deleteMechanic($mechanic_id)
    {
        $delete_time = new Time('now');

        $this->db->table('tb_mechanics')->set('deleted_at', $delete_time)->where('id', $mechanic_id)->update();
    }
}