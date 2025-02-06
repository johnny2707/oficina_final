<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use DateTime;
use FontLib\Table\Type\name;

class ClientSeeder extends Seeder
{
    public function run()
    {
        helper('uuid');

        $data = [];

        for($i = 0; $i < 100; $i++):
            $data[$i] = [
                'id' => generateUUID(),
                'nif' => rand(100000000, 999999999),
                'name' => 'josé',
                'creation_date' => date('mm-dd-YY hh:ii:ss', time())
            ];
        endfor;

        $this->db->table('tb_clients')->insertBatch($data);
    }
}