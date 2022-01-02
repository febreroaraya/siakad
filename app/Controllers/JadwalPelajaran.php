<?php

namespace App\Controllers;

//use App\Models\Mdl_fakultas;
use App\Models\Mdl_Ta;
use App\Models\Mdl_jurusan;
use App\Models\Mdl_jadwalpelajaran;
//use App\Models\Mdl_kelas;
use App\Models\Mdl_ruangan;
use App\Models\Mdl_guru;

class JadwalPelajaran extends BaseController
{

    public function __construct()
    {
        helper('form');
      $this->Mdl_Ta = new Mdl_Ta();
      $this->Mdl_jurusan = new Mdl_jurusan();
      $this->Mdl_jadwalpelajaran = new Mdl_jadwalpelajaran();
      //$this->Mdl_fakultas = new Mdl_fakultas();
      $this->Mdl_ruangan = new Mdl_ruangan();
      $this->Mdl_guru = new Mdl_guru();
    }

    public function index()
    {

        $data = [
            'title' => 'Jadwal Pelajaran',
            'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'jurusan'=> $this->Mdl_jurusan->allData(),
            'guru'=> $this->Mdl_guru->allData(),
            'isi'   => 'admin/jadwalpelajaran/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detailjadwal($id_jurusan)
    {
        $data = [
            'title' => 'Jadwal Pelajaran',
            'ta_aktif'=> $this->Mdl_Ta->ta_aktif(),
            'jurusan'=> $this->Mdl_jurusan->detail_Data($id_jurusan),
            'guru'=> $this->Mdl_guru->allData(),
            'jadwal' => $this->Mdl_jadwalpelajaran->all_Data($id_jurusan),
            'mapel' => $this->Mdl_jadwalpelajaran->mapel($id_jurusan),
            'golongan' => $this->Mdl_jadwalpelajaran->golongan($id_jurusan),
            'ruangan' => $this->Mdl_ruangan->allData(),
            'isi'   => 'admin/jadwalpelajaran/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_jurusan)
    {
        if ($this->validate([
            'id_mapel'  => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Dipilih'
                ]
            ],
            'id_guru'  => [
                'label' => 'Guru',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Dipilih !',
                ]
            ],
            'id_fakultas'  => [
                'label' => 'Golongan',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Dipilih !',
                ]
            ],
            'hari'  => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Dipilih!'
                ]
            ],
            'waktu'  => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Dipilih!'
                ]
             ], 
             'id_ruangan'  => [
                    'label' => 'Ruangan',
                    'rules' => 'required',
                    'errors'    =>  [
                        'required'  => '{field} Wajib Dipilih!'
                ]
            ], 
            'quota'  => [
                'label' => 'Quota',
                'rules' => 'required',
                'errors'    =>  [
                    'required'  => '{field} Wajib Dipilih!'
                ]
            ], 
        ])) {
            //jika valid
            $ta = $this->Mdl_Ta->ta_aktif();
           $data = [
               'id_jurusan' => $id_jurusan,
               'id_ta' => $ta['id_ta'],
               'id_mapel' => $this->request->getPost('id_mapel'),
               'id_guru' => $this->request->getPost('id_guru'),
               'id_fakultas' => $this->request->getPost('id_fakultas'),
               'hari' => $this->request->getPost('hari'),
               'waktu' => $this->request->getPost('waktu'),
               'id_ruangan' => $this->request->getPost('id_ruangan'),
               'quota' => $this->request->getPost('quota'),
           ];
           $this->Mdl_jadwalpelajaran->add($data);
           session()->setFlashdata('pesan', 'Data berhasil disimpan!');
           return redirect()->to(base_url('jadwalpelajaran/detailjadwal/' . $id_jurusan));
        } else {
             //jika tidak valid
             session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
             return redirect()->to(base_url('jadwalpelajaran/detailjadwal/' . $id_jurusan));
        }    
    }

    public function delete($id_jadwal, $id_jurusan)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->Mdl_jadwalpelajaran->delete_Data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('jadwalpelajaran/detailjadwal/' . $id_jurusan));
    }
}