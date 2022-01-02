<?php

namespace App\Controllers;
use App\Models\Mdl_admin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->Mdl_admin = new Mdl_admin();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin',
            'jml_gedung' => $this->Mdl_admin->jml_gedung(),
            'jml_ruangan' => $this->Mdl_admin->jml_ruangan(),
            'jml_kelas' => $this->Mdl_admin->jml_kelas(),
            'jml_jurusan' => $this->Mdl_admin->jml_jurusan(),
            'jml_guru' => $this->Mdl_admin->jml_guru(),
            'jml_siswa' => $this->Mdl_admin->jml_siswa(),
            'jml_mapel' => $this->Mdl_admin->jml_mapel(),
            'jml_user' => $this->Mdl_admin->jml_user(),
            'isi'   => 'v_admin'
        ];
        return view('layout/v_wrapper', $data);
    }
}
