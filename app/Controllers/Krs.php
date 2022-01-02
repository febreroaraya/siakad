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
        $data = [
            'title' => 'Kartu Rencana Studi (KRS)',
            'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'ssw' => $this->Mdl_krs->DataSiswa(),
            'mapel' => $this->Mdl_krs->MataPelajaran(),
            'isi'   => 'ssw/krs/v_krs'
        ];
        return view('layout/v_wrapper', $data);
    }
}
