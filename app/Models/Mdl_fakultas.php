<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_fakultas extends Model
{
    public function allData()
    {
        return $this->db->table('tb_fakultas')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_fakultas.id_jurusan', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tb_fakultas.id_guru', 'left')
            ->orderBy('tb_fakultas.id_fakultas', 'ASC')
            ->get()->getResultArray();
    }

    public function detail($id_fakultas)
    {
        return $this->db->table('tb_fakultas')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_fakultas.id_jurusan', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tb_fakultas.id_guru', 'left')
            ->orderBy('tb_fakultas.id_fakultas', 'ASC')
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_fakultas')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tb_fakultas')
        ->where('id_fakultas', $data['id_fakultas'])
        ->delete($data);
    }

    public function siswa($id_fakultas)
    {
        return $this->db->table('tbl_siswa')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
        ->where('id_fakultas', $id_fakultas)
        ->orderBy('id_siswa', 'ASC')
        ->get()->getResultArray();
    }

    public function jmlsiswa($id_fakultas)
    {
        return $this->db->table('tbl_siswa')
        ->where('id_fakultas', $id_fakultas)
        ->countAllResults();
    }
}