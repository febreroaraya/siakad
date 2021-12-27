<?php

namespace App\Controllers;

use App\Models\Mdl_Siswa;

class Siswa extends BaseController
{ 
    public function __construct()
    {
        helper('form');
        $this->Mdl_Siswa = new Mdl_Siswa();
    }
    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'siswa' => $this->Mdl_Siswa->allData(),
            'isi'   => 'admin/siswa/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
