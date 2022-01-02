<?php

namespace App\Controllers;

class Ggr extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Guru',
            'isi'   => 'v_dashboardguru'
        ];
        return view('layout/v_wrapper', $data);
    }
}
