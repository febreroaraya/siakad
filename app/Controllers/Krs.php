<?php

namespace App\Controllers;
use App\Models\Mdl_Ta;
use App\Models\Mdl_krs;

class Krs extends BaseController
{
    public function __construct()
    {
        $this->Mdl_Ta = new Mdl_Ta();
        $this->Mdl_krs = new Mdl_krs();
    }

    public function index()
    {
        $ssw = $this->Mdl_krs->DataSiswa();
		$ta = $this->Mdl_Ta->ta_aktif();
        $data = [
            'title' => 'Kartu Rencana Studi (KRS)',
            'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'ssw' => $this->Mdl_krs->DataSiswa(),
            'mapel' => $this->Mdl_krs->MataPelajaran($ta['id_ta'], $ssw['id_jurusan']),
            'data_mapel' => $this->Mdl_krs->data_krs($ssw['id_siswa'], $ta['id_ta']),
            'isi'   => 'ssw/krs/v_krs'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function tambah($id_jadwal)
    {
        $ssw = $this->Mdl_krs->DataSiswa();
        $ta = $this->Mdl_Ta->ta_aktif();
        $data = [
            'id_jadwal' => $id_jadwal,
            'id_ta' => $ta['id_ta'],
            'id_siswa' => $ssw['id_siswa']
        ];
        $this->Mdl_krs->tambah_mapel($data);
        session()->setFlashdata('pesan', 'Mata Pelajaran berhasil ditambahkan!');
        return redirect()->to(base_url('krs'));
    }

    public function delete($id_krs)
	{
		$data = [
			'id_krs' => $id_krs, 
		];

		$this->Mdl_krs->delete_data($data);
		session()->setFlashdata('pesan', 'Data KRS Berhasil Di Hapus !!');
		return redirect()->to(base_url('krs'));
	}

    public function print()
	{
		$ssw = $this->Mdl_krs->DataSiswa();
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Print KRS',
			'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'ssw' => $this->Mdl_krs->DataSiswa(),
            'data_mapel' => $this->Mdl_krs->data_krs($ssw['id_siswa'], $ta['id_ta']),
		];
		return view('ssw/krs/v_print_krs', $data);
	}
}
