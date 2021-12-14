<?php

namespace App\Controllers;
use App\Models\Mdl_kelas;

class Kelas extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_kelas = new Mdl_kelas();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelas',
            'kelas' => $this->Mdl_kelas->allData(),
            'isi'   => 'admin/v_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'kelas' => $this->request->getPost('kelas'),
        ];
        $this->Mdl_kelas->add($data);
        session()->setFlashdata('pesan','Data berhasil disimpan!');
        return redirect()->to(base_url('kelas'));
    }

    public function edit($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'kelas' => $this->request->getPost('kelas'),
        ];
        $this->Mdl_kelas->edit($data);
        session()->setFlashdata('pesan','Data berhasil diedit!');
        return redirect()->to(base_url('kelas'));
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->Mdl_kelas->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil dihapus!');
        return redirect()->to(base_url('kelas'));
    }
}
