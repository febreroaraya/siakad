<?php

namespace App\Controllers;

class Ssw extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'isi'   => 'v_dashboardsiswa'
        ];
        return view('layout/v_wrapper', $data);
    }
}
