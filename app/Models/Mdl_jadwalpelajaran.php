<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_jadwalpelajaran extends Model
{
    public function all_Data($id_jurusan)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tb_mapel', 'tb_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
            ->where('tbl_jadwal.id_jurusan', $id_jurusan)
            ->orderBy('tb_mapel.semester', 'ASC')
            ->get()->getResultArray();
    }
}