<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_ruangan extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_ruangan')
            ->join('tb_gedung', 'tb_gedung.id_gedung = tbl_ruangan.id_gedung', 'left')
            ->orderBy('id_ruangan', 'DESC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_ruangan)
    {
        return $this->db->table('tbl_ruangan')
            ->join('tb_gedung', 'tb_gedung.id_gedung = tbl_ruangan.id_gedung', 'left')
            ->where('id_ruangan', $id_ruangan)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_ruangan')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_ruangan')
            ->where('id_ruangan', $data['id_ruangan'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_ruangan')
            ->where('id_ruangan', $data['id_ruangan'])
            ->delete($data);
    }
    
}
