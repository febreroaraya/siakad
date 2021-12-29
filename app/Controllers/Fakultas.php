<?php

namespace App\Controllers;

use App\Models\Mdl_fakultas;
use App\Models\Mdl_guru;
use App\Models\Mdl_jurusan;

class Fakultas extends BaseController
{
    public function __construct()
    {
        $this->Mdl_fakultas = new Mdl_fakultas();
        $this->Mdl_guru = new Mdl_guru();
        $this->Mdl_jurusan = new Mdl_jurusan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Fakultas',
            'fakultas' => $this->Mdl_fakultas->allData(),
            'guru' => $this->Mdl_guru->allData(),
            'jurusan' => $this->Mdl_jurusan->allData(),
            'isi'   => 'admin/fakultas/v_fakultas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'fakultas'  => [
                'label' => 'fakultas',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],

            'id_jurusan'  => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'id_guru'  => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
             ],

            'tahun_angkatan'  => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
        ])){
             //jika valid
            $data = [
                'fakultas' => $this->request->getPost('fakultas'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'id_guru' => $this->request->getPost('id_guru'),
                'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
            ];
            $this->Mdl_fakultas->add($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to(base_url('fakultas'));
        }else{
              //jika tidak valid
              session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
              return redirect()->to(base_url('fakultas'));
        }

    }

    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
        ];
        $this->Mdl_fakultas->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil dihapus!');
        return redirect()->to(base_url('fakultas'));
 
    }
    public function rincian_fakultas($id_fakultas)
    {
        $fakultas = $this->Mdl_fakultas->detail($id_fakultas);
        $data = [
            'title' => 'Data Fakultas ',
            'fakultas' => $fakultas,
            'isi'   => 'admin/fakultas/v_rincianfakultas'
        ];
        return view('layout/v_wrapper', $data);
    }
}

