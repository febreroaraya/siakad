<?php

namespace App\Controllers;

use App\Models\Mdl_ggr;
use App\Models\Mdl_Ta;
class Ggr extends BaseController
{
    public function __construct()
    {
        $this->Mdl_ggr = new Mdl_ggr();
		$this->Mdl_Ta = new Mdl_Ta();
		helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Guru',
            'guru' => $this->Mdl_ggr->DataGuru(),
			'ta' => $this->Mdl_Ta->ta_aktif(),
            'isi'   => 'v_dashboardguru'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function jadwal()
	{
		$ta = $this->Mdl_Ta->ta_aktif();
		$guru = $this->Mdl_ggr->DataGuru();  
		$data = [
			'title' => 'Jadwal Mengajar',
			'ta' => $ta, 
			'jadwal' => $this->Mdl_ggr->JadwalGuru($guru['id_guru'], $ta['id_ta']),
			'isi' => 'ggr/v_jadwal'
		];
		return view('layout/v_wrapper', $data);
	}

    public function AbsenKelas()
	{
		$ta = $this->Mdl_Ta->ta_aktif();
		$guru = $this->Mdl_ggr->DataGuru();   
		$data = [
			'title' => 'Absen Kelas',
			'ta' => $ta, 
			'absen' => $this->Mdl_ggr->JadwalGuru($guru['id_guru'], $ta['id_ta']),
			'isi' => 'ggr/absenkelas/v_absenkelas'
		];
		return view('layout/v_wrapper', $data);
	}

    public function absensi($id_jadwal)
	{
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Absensi',
			'ta' => $ta, 
			'jadwal' => $this->Mdl_ggr->DetailJadwal($id_jadwal),
			'ssw' => $this->Mdl_ggr->ssw($id_jadwal),
			'isi' => 'ggr/absenkelas/v_absensi'
		];
		return view('layout/v_wrapper', $data);
	}

    public function SimpanAbsen($id_jadwal)
	{
		$ssw = $this->Mdl_ggr->ssw($id_jadwal);
		foreach ($ssw as $key => $value) {
			$data = [
				'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
				'p1' => $this->request->getPost($value['id_krs'] . 'p1'),
				'p2' => $this->request->getPost($value['id_krs'] . 'p2'),
				'p3' => $this->request->getPost($value['id_krs'] . 'p3'),
				'p4' => $this->request->getPost($value['id_krs'] . 'p4'),
				'p5' => $this->request->getPost($value['id_krs'] . 'p5'),
				'p6' => $this->request->getPost($value['id_krs'] . 'p6'),
				'p7' => $this->request->getPost($value['id_krs'] . 'p7'),
				'p8' => $this->request->getPost($value['id_krs'] . 'p8'),
				'p9' => $this->request->getPost($value['id_krs'] . 'p9'),
				'p10' => $this->request->getPost($value['id_krs'] . 'p10'),
				'p11' => $this->request->getPost($value['id_krs'] . 'p11'),
				'p12' => $this->request->getPost($value['id_krs'] . 'p12'),
				'p13' => $this->request->getPost($value['id_krs'] . 'p13'),
				'p14' => $this->request->getPost($value['id_krs'] . 'p14'),
				'p15' => $this->request->getPost($value['id_krs'] . 'p15'),
				'p16' => $this->request->getPost($value['id_krs'] . 'p16'),
				'p17' => $this->request->getPost($value['id_krs'] . 'p17'),
				'p18' => $this->request->getPost($value['id_krs'] . 'p18'),
			];
			$this->Mdl_ggr->SimpanAbsen($data);
		}
		session()->setFlashdata('pesan', 'Absensi Berhasil Di Update !!');
		return redirect()->to(base_url('ggr/absensi/' . $id_jadwal));
	}

    public function print_absensi($id_jadwal)
	{
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Print Absensi',
			'ta' => $ta,
			'jadwal' => $this->Mdl_ggr->DetailJadwal($id_jadwal),
			'ssw' => $this->Mdl_ggr->ssw($id_jadwal),
		];
		return view('ggr/absenkelas/v_print_absensi', $data);
	}

    public function NilaiSiswa()
	{
		$ta = $this->Mdl_Ta->ta_aktif();
		$guru = $this->Mdl_ggr->DataGuru();  
		$data = [
			'title' => 'Nilai Siswa',
			'ta' => $ta, 
			'absen' => $this->Mdl_ggr->JadwalGuru($guru['id_guru'], $ta['id_ta']),
			'isi' => 'ggr/nilai/v_nilaisiswa'
		];
		return view('layout/v_wrapper', $data);
	}

    public function DataNilai($id_jadwal)
	{
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Nilai',
			'ta' => $ta, 
			'jadwal' => $this->Mdl_ggr->DetailJadwal($id_jadwal),
			'ssw' => $this->Mdl_ggr->ssw($id_jadwal),
			'isi' => 'ggr/nilai/v_datanilai'
		];
		return view('layout/v_wrapper', $data);
	}

    public function SimpanNilai($id_jadwal)
	{
		$ssw = $this->Mdl_ggr->ssw($id_jadwal);
		foreach ($ssw as $key => $value) {
			$absen = $this->request->getPost($value['id_krs'] . 'absen');
			$tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
			$uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
			$uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
			$na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
			if ($na >= 85) {
				$nh = 'A';
				$bobot = 4;
			} elseif ($na < 85 && $na >= 75) {
				$nh = 'B';
				$bobot = 3;
			} elseif ($na < 75 && $na >= 65) {
				$nh = 'C';
				$bobot = 2;
			} elseif ($na < 65 && $na >= 55) {
				$nh = 'D';
				$bobot = 1;
			} else {
				$nh = 'E';
				$bobot = 0;
			}


			$data = [
				'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
				'nilai_tugas' => $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
				'nilai_uts' => $this->request->getPost($value['id_krs'] . 'nilai_uts'),
				'nilai_uas' => $this->request->getPost($value['id_krs'] . 'nilai_uas'),
				'nilai_akhir' => number_format($na, 0),
				'nilai_huruf' => $nh,
				'bobot' => $bobot,
			];
			$this->Mdl_ggr->SimpanNilai($data);

		}
		session()->setFlashdata('pesan', 'Nilai Berhasil Di Update !!');
		return redirect()->to(base_url('ggr/DataNilai/' . $id_jadwal));
	}

    public function PrintNilai($id_jadwal)
    {
        $ta = $this->Mdl_Ta->ta_aktif();
        $data = [
            'title' => 'Rekap Nilai Mahasiswa',
            'ta' => $ta, 
            'jadwal' => $this->Mdl_ggr->DetailJadwal($id_jadwal),
            'ssw' => $this->Mdl_ggr->ssw($id_jadwal),
        ];
        return view('ggr/nilai/v_printnilai', $data);
    }
}
