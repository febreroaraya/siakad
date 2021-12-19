<?php

namespace App\Controllers;

use App\Models\Mdl_jurusan;
use App\Models\Mdl_kelas;


class Jurusan extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_jurusan = new Mdl_jurusan();
        $this->Mdl_kelas = new Mdl_kelas();
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

    public function add()
    {
        $data = [
            'title' => 'Add jurusan',
            'kelas' => $this->Mdl_kelas->allData(),
            'isi'   => 'admin/jurusan/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'id_kelas'  => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'kode_jurusan'  => [
                'label' => 'Jurusan',
                'rules' => 'required|is_unique[tb_jurusan.kode_jurusan]',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                    'is_unique'  => '{field} Sudah ada, Input kode lain!'
                ]
            ],
            'jurusan'  => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'id_kelas' => $this->request->getPost('id_kelas'),
                'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
            ];
            $this->Mdl_jurusan->add($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to(base_url('jurusan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jurusan/add'));
        }
    }

    public function edit($id_jurusan)
    {
        $data = [
            'title' => 'edit jurusan',
            'kelas' => $this->Mdl_kelas->allData(),
            'jurusan' => $this->Mdl_jurusan->detail_Data($id_jurusan),
            'isi'   => 'admin/jurusan/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_jurusan)
    {
        if ($this->validate([
            'id_kelas'  => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],

            'jurusan'  => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'id_jurusan' => $id_jurusan,
                'id_kelas' => $this->request->getPost('id_kelas'),
                // 'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
            ];
            $this->Mdl_jurusan->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to(base_url('jurusan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jurusan/edit/' . $id_jurusan));
        }
    }

    public function delete($id_jurusan)
    {
        $data = [
            'id_jurusan' => $id_jurusan,
        ];
        $this->Mdl_jurusan->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('jurusan'));
    }
}
