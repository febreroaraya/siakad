<?php

namespace App\Controllers;

use App\Models\Mdl_Ruangan;
use App\Models\Mdl_gedung;


class Ruangan extends BaseController
{

     public function __construct()
     {
          helper('form');
          $this->Mdl_Ruangan = new Mdl_Ruangan();
          $this->Mdl_gedung = new Mdl_gedung();
     }
     public function index()
     {
          $data = [
               'title' => 'Ruangan',
               'ruangan' => $this->Mdl_Ruangan->allData(),
               'isi'   => 'admin/ruangan/v_index'
          ];
          return view('layout/v_wrapper', $data);
     }
     public function add()
     {
          $data = [
               'title' => 'Add Ruangan',
               'gedung' => $this->Mdl_gedung->allData(),
               'isi'   => 'admin/ruangan/v_add'
          ];
          return view('layout/v_wrapper', $data);
     }

     public function insert()
     {
          if ($this->validate([
               'id_gedung'  => [
                    'label' => 'Gedung',
                    'rules' => 'required',
                    'errors'    =>  [
                         'required'  => '{field} Wajib Diisi!'
                    ]
               ],
          ])) {
               //jika valid
               $data = [
                    'id_gedung' => $this->request->getPost('id_gedung'),
                    'ruangan' => $this->request->getPost('ruangan'),
               ];
               $this->Mdl_Ruangan->add($data);
               session()->setFlashdata('pesan', 'Data berhasil disimpan!');
               return redirect()->to(base_url('ruangan'));
          } else {
               //jika tidak valid
               session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
               return redirect()->to(base_url('ruangan/add'));
          }
     }
     public function edit($id_ruangan)
     {
          $data = [
               'title' => 'edit Ruangan',
               'gedung' => $this->Mdl_gedung->allData(),
               'ruangan' => $this->Mdl_Ruangan->detail_Data($id_ruangan),
               'isi'   => 'admin/ruangan/v_edit'
          ];
          return view('layout/v_wrapper', $data);
     }
     public function update($id_ruangan)
     {
          if ($this->validate([
               'id_gedung'  => [
                    'label' => 'Gedung',
                    'rules' => 'required',
                    'errors'    =>  [
                         'required'  => '{field} Wajib Diisi!'
                    ]
               ],
          ])) {
               //jika valid
               $data = [
                    'id_ruangan' => $id_ruangan,
                    'id_gedung' => $this->request->getPost('id_gedung'),
                    'ruangan' => $this->request->getPost('ruangan'),
               ];
               $this->Mdl_Ruangan->edit($data);
               session()->setFlashdata('pesan', 'Data berhasil update !!');
               return redirect()->to(base_url('ruangan'));
          } else {
               //jika tidak valid
               session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
               return redirect()->to(base_url('ruangan/edit/' . $id_ruangan));
          }
     }

     public function delete($id_ruangan)
     {
          $data = [
               'id_ruangan' => $id_ruangan,
          ];
          $this->Mdl_Ruangan->delete_data($data);
          session()->setFlashdata('pesan', 'Data berhasil dihapus!');
          return redirect()->to(base_url('ruangan'));
     }
}
