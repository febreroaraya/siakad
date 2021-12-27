<?php

namespace App\Controllers;

use App\Models\Mdl_Ta;
use App\Models\Mdl_jurusan;
use App\Models\Mdl_jadwalpelajaran;

class JadwalPelajaran extends BaseController
{

    public function __construct()
    {
        helper('form');
      $this->Mdl_Ta = new Mdl_Ta();
      $this->Mdl_jurusan = new Mdl_jurusan();
      $this->Mdl_jadwalpelajaran = new Mdl_jadwalpelajaran();
    }

    public function index()
    {

        $data = [
            'title' => 'Jadwal Pelajaran',
            'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'jurusan'=> $this->Mdl_jurusan->allData(),
            'isi'   => 'admin/jadwalpelajaran/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detailjadwal($id_jurusan)
    {
        $data = [
            'title' => 'Jadwal Pelajaran',
            'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'jurusan'=> $this->Mdl_jurusan->detail_Data($id_jurusan),
            'jadwal' => $this->Mdl_jadwalpelajaran->all_Data($id_jurusan),
            'isi'   => 'admin/jadwalpelajaran/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }
}
