<?php
namespace App\Models;

use CodeIgniter\Model;

class Mdl_admin extends Model
{
    public function jml_gedung()
    {
        return $this->db->table('tb_gedung')
        ->countAll();
    }

    public function jml_ruangan()
    {
        return $this->db->table('tbl_ruangan')
        ->countAll();
    }

    public function jml_kelas()
    {
        return $this->db->table('tb_kelas')
        ->countAll();
    }

    public function jml_jurusan()
    {
        return $this->db->table('tb_jurusan')
        ->countAll();
    }

    public function jml_guru()
    {
        return $this->db->table('tbl_guru')
        ->countAll();
    }

    public function jml_siswa()
    {
        return $this->db->table('tbl_siswa')
        ->countAll();
    }

    public function jml_mapel()
    {
        return $this->db->table('tb_mapel')
        ->countAll();
    }

    public function jml_user()
    {
        return $this->db->table('tb_user')
        ->countAll();
    }
}