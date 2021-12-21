<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_Ta extends Model
{
    public function allData()
    {
        return $this->db->table('tb_ta')
            ->orderBy('id_ta', 'ASC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tb_ta')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tb_ta')
            ->where('id_ta', $data['id_ta'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tb_ta')
            ->where('id_ta', $data['id_ta'])
            ->delete($data);
    }
}
