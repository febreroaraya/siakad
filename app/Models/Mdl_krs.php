<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_krs extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl_siswa')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jurusan.id_kelas', 'left')
        ->join('tb_fakultas', 'tb_fakultas.id_fakultas = tbl_siswa.id_fakultas', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tb_fakultas.id_guru', 'left')
        ->where('nis', session()->get('username'))
        ->get()->getRowArray();
    }

    public function MataPelajaran($id_ta, $id_jurusan)
    {
        return $this->db->table('tbl_jadwal')
        ->join('tb_mapel', 'tb_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
        ->join('tb_fakultas', 'tb_fakultas.id_fakultas = tbl_jadwal.id_fakultas', 'left')
        ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
        ->where('tbl_jadwal.id_ta', $id_ta)
        ->where('tbl_jadwal.id_jurusan', $id_jurusan)
        ->get()->getResultArray();
    }

    public function tambah_mapel($data)
    {
        $this->db->table('tbl_krs')->insert($data);
    }

    public function data_krs($id_siswa, $id_ta)
    {
        return $this->db->table('tbl_krs')
        ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_krs.id_jadwal', 'left')
        ->join('tb_mapel', 'tb_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
        ->join('tb_fakultas', 'tb_fakultas.id_fakultas = tbl_jadwal.id_fakultas', 'left')
        ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
        ->where('id_siswa', $id_siswa)
		->where('tbl_krs.id_ta', $id_ta)
        ->get()->getResultArray();
    }

    public function delete_data($data)
	{
		$this->db->table('tbl_krs')
			->where('id_krs', $data['id_krs'])
			->delete($data);
	}
}