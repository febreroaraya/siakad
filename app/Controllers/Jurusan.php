<?php

namespace App\Controllers;
use App\Models\Mdl_jurusan;
//use App\Models\Mdl_kelas;

class Jurusan extends BaseController
{
    public function __construct()
     {
          //helper('form');
          $this->Mdl_jurusan = new Mdl_jurusan();
          //$this->Mdl_kelas = new Mdl_kelas();
     }
     public function index()
     {
          $data = [
               'title' => 'Jurusan',
               'jurusan' => $this->Mdl_jurusan->allData(),
               'isi'   => 'admin/jurusan/v_index'
          ];
          return view('layout/v_wrapper', $data);
     }
}