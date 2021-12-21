<?php

namespace App\Controllers;

use App\Models\Mdl_mapel;
use App\Models\Mdl_jurusan;

class Mapel extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_mapel = new Mdl_mapel();
        $this->Mdl_jurusan = new Mdl_jurusan();
    }
    public function index()
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'jurusan' => $this->Mdl_jurusan->allData(),
            'isi'   => 'admin/mapel/v_mapel'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail($id_jurusan)
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'jurusan' => $this->Mdl_jurusan->detail_Data($id_jurusan),
            'mapel' => $this->Mdl_mapel->allDataMapel($id_jurusan),
            'isi'   => 'admin/mapel/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }
}
