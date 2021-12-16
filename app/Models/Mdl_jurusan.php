<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_jurusan extends Model
{
    public function allData()
    {
        return $this->db->table('tb_jurusan')
            ->join('tb_kelas', 'tb_kelas. id_kelas = tb_jurusan.id_kelas', 'left')
            ->orderBy('id_kelas', 'DESC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_jurusan)
    {
        return $this->db->table('tb_jurusan')
            ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jurusan.id_kelas', 'left')
            ->where('id_kelas', $id_jurusan)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_jurusan')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tb_jurusan')
            ->where('id_jurusan', $data['id_jurusan'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tb_jurusan')
            ->where('id_jurusan', $data['id_jurusan'])
            ->delete($data);
    }
}
