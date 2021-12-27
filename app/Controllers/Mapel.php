<?php

namespace App\Controllers;

use App\Models\Mdl_mapel;
use App\Models\Mdl_jurusan;

class Mapel extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_mapel = new Mdl_mapel();
        $this->Mdl_jurusan = new Mdl_jurusan();
    }
    public function index()
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'jurusan' => $this->Mdl_jurusan->allData(),
            'isi'   => 'admin/mapel/v_mapel'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail($id_jurusan)
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'jurusan' => $this->Mdl_jurusan->detail_Data($id_jurusan),
            'mapel' => $this->Mdl_mapel->allDataMapel($id_jurusan),
            'isi'   => 'admin/mapel/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_jurusan)
    {
        if ($this->validate([
            'kode_mapel'  => [
                'label' => 'Kode Mata Pelajaran',
                'rules' => 'required|is_unique[tb_mapel.kode_mapel]',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                    'is_unique'  => '{field} Sudah ada, Input kode lain!'
                ]
            ],
            'mapel'  => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'semester'  => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'kategori'  => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'mapel' => $this->request->getPost('mapel'),
                'kategori' => $this->request->getPost('kategori'),
                'semester' => $this->request->getPost('semester'),
                'id_jurusan' => $id_jurusan,
            ];
            $this->Mdl_mapel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to(base_url('mapel/detail/' . $id_jurusan));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mapel/detail/' . $id_jurusan));
        }
    }
    public function delete($id_jurusan,  $id_mapel)
    {
         $data = [
              'id_mapel' => $id_mapel,
         ];
         $this->Mdl_mapel->delete_data($data);
         session()->setFlashdata('pesan', 'Data berhasil dihapus!');
         return redirect()->to(base_url('mapel/detail/' . $id_jurusan));
    }

}
