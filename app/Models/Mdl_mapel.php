<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_mapel extends Model
{
    public function allData()
    {
        return $this->db->table('tb_mapel')
            ->orderBy('id_mapel', 'ASC')
            ->get()->getResultArray();
    }

    public function allDataMapel($id_jurusan)
    {
        return $this->db->table('tb_mapel')
        ->where('id_mapel',$id_jurusan)
        ->orderBy('semester', 'ASC')
        ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tb_mapel')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tb_mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tb_mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->delete($data);
    }
}
