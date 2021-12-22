<?php

namespace App\Controllers;

use App\Models\Mdl_User;


class User extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Mdl_User = new Mdl_User();
    }
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->Mdl_User->allData(),
            'isi'   => 'admin/v_user'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_user'  => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'username'  => [
                'label' => 'Username',
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
            'foto'  => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors'    =>  [
                    'uploaded'  => '{field} Wajib Diisi!',
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
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            );
            $foto->move('foto', $nama_file);
            $this->Mdl_User->add($data);
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }
}
