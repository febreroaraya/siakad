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
            ->where('id_fakultas', $id_fakultas)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->tabel('tb_fakultas')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tb_fakultas')
        ->where('id_fakultas', $data['id_fakultas'])
        ->delete($data);
    }
}