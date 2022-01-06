<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdl_ggr extends Model
{
	public function DataGuru()
	{
		return $this->db->table('tbl_guru')
			->where('nip', session()->get('username'))
			->get()->getRowArray();
	}

	public function JadwalGuru($id_guru,$id_ta)
	{
		return $this->db->table('tbl_jadwal')
			->join('tb_mapel', 'tb_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
			->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
			->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
			->join('tb_fakultas', 'tb_fakultas.id_fakultas = tbl_jadwal.id_fakultas', 'left')
			->where('tbl_jadwal.id_guru', $id_guru)
			->where('tbl_jadwal.id_ta', $id_ta)
			->get()->getResultArray();
	}

	public function DetailJadwal($id_jadwal)
	{
		return $this->db->table('tbl_jadwal')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tbl_jadwal.id_jurusan', 'left')
			->join('tb_kelas', 'tb_kelas.id_kelas = tb_jurusan.id_kelas', 'left')
			->join('tb_mapel', 'tb_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
			->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
			->join('tb_fakultas', 'tb_fakultas.id_fakultas = tbl_jadwal.id_fakultas', 'left')
			->where('tbl_jadwal.id_jadwal', $id_jadwal)
			->get()->getRowArray();
	}

	public function ssw($id_jadwal)
	{
		return $this->db->table('tbl_krs')
			->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_krs.id_siswa', 'left')
			->where('id_jadwal', $id_jadwal)
			->get()->getResultArray();
	}

	public function SimpanAbsen($data)
	{
		$this->db->table('tbl_krs')
			->where('id_krs', $data['id_krs'])
			->update($data);
	}

	public function SimpanNilai($data)
	{
		$this->db->table('tbl_krs')
			->where('id_krs', $data['id_krs'])
			->update($data);
	}
}