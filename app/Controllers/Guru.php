<?php

namespace App\Controllers;

use App\Models\Mdl_Guru;

class Guru extends BaseController
{
    public function __construct()
    {
        $this->Mdl_guru = new Mdl_guru();

    }
    public function index()
    {
        $data = [
            'title' => 'Guru',
            'guru'  => $this->Mdl_guru->allData();
            'isi'   => 'admin/guru/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
