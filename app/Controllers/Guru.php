<?php

namespace App\Controllers;

class Guru extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Guru',
            'isi'   => 'admin/guru/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
}
