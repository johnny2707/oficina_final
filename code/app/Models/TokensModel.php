<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use DateTime;

class TokensModel extends Model
{
    protected $db;

    protected $table = 'tb_tokens';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function insertToken($data)
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
}