<?php

namespace App\Controllers;

use App\Models\Mdl_jurusan;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->Mdl_jurusan = new Mdl_jurusan();
    }
    public function index()
    {
        $data = [
            'title' => 'Jurusan',
            //'jurusan' => $this->Mdl_jurusan->allData(),
            'isi'   => 'admin/jurusan/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
