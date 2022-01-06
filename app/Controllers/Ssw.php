<?php

namespace App\Controllers;

use App\Models\Mdl_Ta;
use App\Models\Mdl_krs;

class Ssw extends BaseController
{
    public function __construct()
    {
        $this->Mdl_Ta = new Mdl_Ta();
		$this->Mdl_krs = new Mdl_krs();
    }

    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'ssw' => $this->Mdl_krs->DataSiswa(),
			'ta' => $this->Mdl_Ta->ta_aktif(),
            'isi'   => 'v_dashboardsiswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi()
	{
		$ssw = $this->Mdl_krs->DataSiswa();
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Absensi',
			'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'ssw' => $this->Mdl_krs->DataSiswa(),
            'data_mapel' => $this->Mdl_krs->data_krs($ssw['id_siswa'], $ta['id_ta']),
			'isi' => 'ssw/v_absensi'
		];
		return view('layout/v_wrapper', $data);
	}

    public function khs()
	{
		$ssw = $this->Mdl_krs->DataSiswa();
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Kartu Hasil Studi (KHS)',
			'ta_aktif' => $this->Mdl_Ta->ta_aktif(),
			'ssw' => $this->Mdl_krs->DataSiswa(),
			//'matapelajaran' => $this->Mdl_krs->MataPelajaran($ta ['$id_ta'], $ssw['id_jurusan']), 
			'data_mapel'	=> $this->Mdl_krs->data_krs($ssw['id_siswa'], $ta['id_ta']),
			'isi' => 'ssw/v_khs'
		];
		return view('layout/v_wrapper', $data);
	}

    public function print_khs()
	{
		$ssw = $this->Mdl_krs->DataSiswa();
		$ta = $this->Mdl_Ta->ta_aktif();
		$data = [
			'title' => 'Kartu Hasil Studi (KHS)',
			'ta_aktif' => $this->Mdl_Ta->ta_aktif(),
			'ssw' => $this->Mdl_krs->DataSiswa(),
			//'matapelajaran' => $this->Mdl_krs->MataPelajaran($ta ['$id_ta'], $ssw['id_jurusan']), 
			'data_mapel'	=> $this->Mdl_krs->data_krs($ssw['id_siswa'], $ta['id_ta']),

		];
		return view('ssw/v_print_khs', $data);
	}
}
