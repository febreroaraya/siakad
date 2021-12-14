<?php

namespace App\Controllers;
use App\Models\Mdl_auth;
class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mdl_auth = new Mdl_auth;
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi'   => 'v_login'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username'  => [
                'label' => 'Username',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'level'  => [
                'label' => 'Level',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'password'  => [
                'label' => 'Password',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
        
            $level = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($level == 1) {
                $cek_user = $this->Mdl_auth->login_user($username, $password);
                if ($cek_user) {
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    return redirect()->to(base_url('admin'));
                } else {
                    session()->setFlashdata('pesan', 'Login Gagal, Username atau Password Salah!!!');
                    return redirect()->to(base_url('auth/index')); 
                }
            } elseif ($level == 2) {
                echo 'Guru';
            } elseif ($level == 3) {
                echo 'Siswa';
            }

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }

    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Logout Sukses!!!');
        return redirect()->to(base_url('auth/index'));
    }
}
