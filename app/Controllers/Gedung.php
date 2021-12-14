<?php

namespace App\Controllers;
use App\Models\Mdl_gedung;

class Gedung extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_gedung = new Mdl_gedung();
    }
    public function index()
    {
        $data = [
            'title' => 'Gedung',
            'gedung' => $this->Mdl_gedung->allData(),
            'isi'   => 'admin/v_gedung'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'gedung' => $this->request->getPost('gedung'),
        ];
        $this->Mdl_gedung->add($data);
        session()->setFlashdata('pesan','Data berhasil disimpan!');
        return redirect()->to(base_url('gedung'));
    }

    public function edit($id_gedung)
    {
        $data = [
            'id_gedung' => $id_gedung,
            'gedung' => $this->request->getPost('gedung'),
        ];
        $this->Mdl_gedung->edit($data);
        session()->setFlashdata('pesan','Data berhasil diedit!');
        return redirect()->to(base_url('gedung'));
    }

    public function delete($id_gedung)
    {
        $data = [
            'id_gedung' => $id_gedung,
        ];
        $this->Mdl_gedung->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil dihapus!');
        return redirect()->to(base_url('gedung'));
    }
}
