<?php

namespace App\Controllers;

use App\Models\Mdl_Ta;

class Ta extends BaseController
{
    public function __construct()
    {
        helper('form');

        $this->Mdl_Ta = new Mdl_Ta();
    }
    public function index()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'Ta'    => $this->Mdl_Ta->allData(),
            'isi'   => 'admin/v_ta'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->Mdl_Ta->add($data);
        session()->setFlashdata('pesan', 'Data berhasil disimpan!');
        return redirect()->to(base_url('ta'));
    }

    public function edit($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->Mdl_Ta->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil Edit');
        return redirect()->to(base_url('ta'));
    }

    public function delete($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
        ];
        $this->Mdl_Ta->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('ta'));
    }

    //setting Tahun Akademik
    public function setting()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'Ta'    => $this->Mdl_Ta->allData(),
            'isi'   => 'admin/v_set_ta'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function set_status_ta($id_ta)
    {
        //reset status ta
        $this->Mdl_Ta->reset_status_ta();
        //set status ta
        $data = [
            'id_ta' => $id_ta,
            'status' => 1
        ];
        $this->Mdl_Ta->edit($data);
        session()->setFlashdata('pesan', 'Status Tahun Akademik berhasil Diganti !!!');
        return redirect()->to(base_url('ta/setting'));
    }
}
