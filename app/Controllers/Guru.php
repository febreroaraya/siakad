<?php

namespace App\Controllers;

use App\Models\Mdl_Guru;

class Guru extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_Guru = new Mdl_Guru();
    }

    public function index()
    {
        $data = [
            'title' => 'Guru',
            'guru'  => $this->Mdl_Guru->allData(),
            'isi'   => 'admin/guru/v_index'
        ]; 
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Guru',
            'guru' => $this->Mdl_Guru->allData(),
            'isi'   => 'admin/guru/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'kode_guru'  => [
                'label' => 'Kode Guru',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'nip'  => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                ]
            ],
            'nama_guru'  => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                ]
            ],
            'password'  => [
                'label' => 'Password',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'foto_guru'  => [
                'label' => 'Foto Guru',
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors'    =>  [
                    'uploaded'  => '{field} Wajib Diisi!',
                    'max_size'  => '{field} Max 1024 KB',
                    'mime_in'  => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO,'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto_guru');
            //merename nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nip' => $this->request->getPost('nip'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'password' => $this->request->getPost('password'),
                'foto_guru' => $nama_file,
            );
            //memindahkan file foto dari form input ke folder foto di directory
            $foto->move('fotoguru', $nama_file);
            $this->Mdl_Guru->add($data);
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
            return redirect()->to(base_url('guru'));
        } else {
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/add'));
        }
    }

    public function edit($id_guru)
    {
        $data = [
            'title' => 'Edit Guru',
            'guru' => $this->Mdl_Guru->detailData($id_guru),
            'isi'   => 'admin/guru/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_user)
    {
        if ($this->validate([
            'kode_guru'  => [
                'label' => 'Kode Guru',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'nip'  => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                ]
            ],
            'nama_guru'  => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                ]
            ],
            'password'  => [
                'label' => 'Password',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'foto_guru'  => [
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors'    =>  [
                    'max_size'  => '{field} Max 1024 KB',
                    'mime_in'  => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO,'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto');
            //merename nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'kode_guru' => $this->request->getPost('kode_guru'),
                'nip' => $this->request->getPost('nip'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'password' => $this->request->getPost('password'),
            );
            //memindahkan file foto dari form input ke folder foto di directory
            $foto->move('foto', $nama_file);
            $this->Mdl_User->add($data);
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
            return redirect()->to(base_url('guru'));
        } else {
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru'));
        }
    }

    
}


