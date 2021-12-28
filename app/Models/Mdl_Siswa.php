<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_Siswa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_siswa')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
        ->orderBy('id_siswa', 'ASC')
        ->get()->getResultArray();
    }

    public function detailData($id_siswa)
    {
        return $this->db->table('tbl_siswa')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
        ->where('id_siswa', $id_siswa)
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_siswa')
        ->where('id_siswa', $data['id_siswa'])
        ->update($data);
    }
     
    public function delete_data($data)
    {
        $this->db->table('tbl_siswa')
        ->where('id_siswa', $data['id_siswa'])
        ->delete($data);
    }
}