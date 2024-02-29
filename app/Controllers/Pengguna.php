<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function index()
    {
         //
    }
    public function TampilPengguna(){
        $data =[
           'listpengguna' => $this->pengguna->findAll()
        ];

       return view('masterdata/list-pengguna', $data);
   }
   public function login()
    {
        return view('pengguna/login');
    }

    public function prosesLogin()
    {
        $validasiForm =[
            'username' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($validasiForm)) {

                $user = $this->pengguna->getPengguna(
                        $this->request->getPost('username'),
                        $this->request->getPost('password')
                );

            if(count($user) == 1) {
                $dataSession = [
                    'id_pengguna' => $user[0]['id_pengguna'],
                    'nama_pengguna' => $user[0]['nama_pengguna'],
                    'username' => $user[0]['username'],
                    'password' => $user[0]['password'],
                    'level' => $user[0]['level'],
                    'sudahkahLogin' => true
                ];
                session()->set($dataSession);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/')->with('pesan', 'Username atau Password Salah!! ');
            }
        }  
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function TambahPengguna(){
        $data = [
            'listlevel' => $this->pengguna->findAll(),
        ];
        return view('pengguna/tambah-pengguna', $data);
    }

    public function SimpanPengguna(){
        $data = [
            'nama_pengguna'=>$this->request->getVar('nama'),
            'username'=>$this->request->getVar('username'),
            'password'=>$this->request->getVar('password'),
            'level'=>$this->request->getVar('level'),
    ];
    $this->pengguna->save($data);
    session()->setFlashdata('tambah','pengguna Berhasil Di Tambah');
    return redirect()->to('/listPengguna');
    }

    public function editPengguna($idPengguna ){
        $syarat=[
            'id_pengguna'=>$idPengguna
        ];
        $data=[
            'title' => 'edit data',
            'judulHalaman' => ' Data Kategori',
            'listPengguna'=> $this->pengguna->where($syarat)->findAll()
            // 'listPengguna'=> $this->pengguna->where($syarat)->findAll()
        ];
        
        return view('pengguna/edit-pengguna', $data);
    }
    public function UpdatePengguna(){
        $data=[
            'id_pengguna'=>$this->request->getVar('id_pengguna'),
            'nama_pengguna'=>$this->request->getVar('nama_pengguna'),
            'username'=>$this->request->getVar('username'),
            'password'=>$this->request->getVar('password'),
            'level'=>$this->request->getVar('Level')
        ];
        $this->pengguna->update($this->request->getVar('id_pengguna'),$data);
        return redirect()->to('listPengguna')->with('pesanedit','Data Berhasil Di Edit');
    }

    public function hapusPengguna($idpengguna){
        $syarat=[
            'id_pengguna'=>$idpengguna
        ];
        $this->pengguna->where($syarat)->delete();
        return redirect()->to('/listPengguna')->with('pesan','Data Berhasil Di Hapus');
    }
}
