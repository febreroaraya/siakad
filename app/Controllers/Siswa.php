<?php

namespace App\Controllers;

use App\Models\Mdl_Siswa;
use App\Models\Mdl_jurusan;

class Siswa extends BaseController
{ 
    public function __construct()
    {
        helper('form');
        $this->Mdl_Siswa = new Mdl_Siswa();
        $this->Mdl_jurusan = new Mdl_jurusan();
    }

    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'siswa' => $this->Mdl_Siswa->allData(),
            'isi'   => 'admin/siswa/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Siswa',
            'jurusan' => $this->Mdl_jurusan->allData(),
            'isi'   => 'admin/siswa/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nis'  => [
                'label' => 'nis',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'nama_siswa'  => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                ]
            ],
            'id_jurusan'  => [
                'label' => 'Jurusan',
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
            'foto_siswa'  => [
                'label' => 'Foto Siswa',
                'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors'    =>  [
                    'uploaded'  => '{field} Wajib Diisi!',
                    'max_size'  => '{field} Max 1024 KB',
                    'mime_in'  => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO,'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto_siswa');
            //merename nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'nis' => $this->request->getPost('nis'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'password' => $this->request->getPost('password'),
                'foto_siswa' => $nama_file,
            );
            //memindahkan file foto dari form input ke folder foto di directory
            $foto->move('fotosiswa', $nama_file);
            $this->Mdl_Siswa->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to(base_url('siswa'));
        } else {
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa/add'));
        }
    }

    public function edit($id_siswa)
    {
        $data = [
            'title' => 'Edit Siswa',
            'jurusan' => $this->Mdl_jurusan->allData(),
            'siswa' => $this->Mdl_Siswa->detailData($id_siswa),
            'isi'   => 'admin/siswa/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_siswa)
    {
        if ($this->validate([
            'nis'  => [
                'label' => 'nis',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!'
                ]
            ],
            'nama_siswa'  => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Diisi!',
                ]
            ],
            'id_jurusan'  => [
                'label' => 'Jurusan',
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
            'foto_siswa'  => [
                'label' => 'Foto Siswa',
                'rules' => 'max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors'    =>  [
                    'max_size'  => '{field} Max 1024 KB',
                    'mime_in'  => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO,'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto_siswa');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_siswa' => $id_siswa,
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'id_jurusan' => $this->request->getPost('id_jurusan'),
                    'password' => $this->request->getPost('password'),
                );
                $this->Mdl_Siswa->edit($data);
            } else {
                
                //menghapus foto lama
                $siswa = $this->Mdl_Siswa->detailData($id_siswa);
                if ($siswa['foto_siswa'] != "") {
                    unlink('fotosiswa/'. $siswa['foto_siswa']);
                }

                //merename nama file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_siswa' => $id_siswa,
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'id_jurusan' => $this->request->getPost('id_jurusan'),
                    'password' => $this->request->getPost('password'),
                    'foto_siswa' => $nama_file,
                );
                //memindahkan file foto dari form input ke folder foto di directory
                $foto->move('fotosiswa', $nama_file);
                $this->Mdl_Siswa->edit($data);   
            }
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to(base_url('siswa'));
        } else {
            //jika tidak valid 
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa/edit/'. $id_siswa));
        }
    }

    public function delete($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
        ];
        $this->Mdl_Siswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('siswa'));
    }
}
