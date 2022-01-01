<?php

namespace App\Controllers;

use App\Models\Mdl_Guru;

class Guru extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_guru = new Mdl_Guru();
    }

    public function index()
    {
        $data = [
            'title' => 'Guru',
            'guru'  => $this->Mdl_guru->allData(),
            'isi'   => 'admin/guru/v_index'
        ]; 
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Guru',
            'guru' => $this->Mdl_guru->allData(),
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
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors'    =>  [
                    'uploaded' => '{field} Wajib Diisi!!!',
                    'max_size'  => '{field} Max 1024 KB!',
                    'mime_in'  => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO!'
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
        $this->Mdl_guru->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
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
            'guru' => $this->Mdl_guru->detail_Data($id_guru),
            'isi'   => 'admin/guru/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_guru)
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
                'rules' => 'max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors'    =>  [
                    'max_size'  => '{field} Max 1024 KB!',
                    'mime_in'  => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO!'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto_guru');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_guru' => $id_guru,
                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nip' => $this->request->getPost('nip'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'password' => $this->request->getPost('password'),
                );
                $this->Mdl_guru->edit($data);
            } else {
                //menghapus foto lama
                $guru = $this->Mdl_guru->detail_Data($id_guru);
                if ($guru['foto_guru'] != "") {
                    unlink('fotoguru/'. $guru['foto_guru']);
                }
                //merename nama file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_guru' => $id_guru,
                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nip' => $this->request->getPost('nip'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'password' => $this->request->getPost('password'),
                    'foto_guru' => $nama_file
                );
                //memindahkan file foto dari form input ke folder foto di directory
                $foto->move('fotoguru', $nama_file);
                $this->Mdl_guru->edit($data);
            }
            
            session()->setFlashdata('pesan', 'Data berhasil di Ganti');
            return redirect()->to(base_url('guru'));
        } else {
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/edit/'. $id_guru));
        }
    }

    public function delete($id_guru)
    {
        //menghapus foto lama
        $guru = $this->Mdl_guru->detail_Data($id_guru);
        if ($guru['foto_guru'] != "") {
            unlink('fotoguru/'. $guru['foto_guru']);
        }
        $data = [
            'id_guru' => $id_guru,
        ];
        $this->Mdl_guru->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil dihapus!');
        return redirect()->to(base_url('guru'));
    }
}


