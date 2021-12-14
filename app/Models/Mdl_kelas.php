<?php

namespace App\Models;
use CodeIgniter\Model;

class Mdl_kelas extends Model
{
    public function allData()
    {
        return $this->db->table('tb_kelas')
        ->orderBy('id_kelas', 'DESC')
        ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tb_kelas')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tb_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tb_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->delete($data);
    }
}