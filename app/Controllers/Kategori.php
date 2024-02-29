<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        //
    }
    public function TampilKategori(){
         $data =[
            'listkategori' => $this->kategori->findAll()
         ];

        return view('masterdata/list-kategori', $data);
    }

    public function TambahKategori(){

        return view('Kategori/tambah-kategori');
    }

    public function simpanKategori(){
        helper(['form']);
        $validation = \config\Services::validation();
        
        $rules = [
            'nama_kategori' => 'required|is_unique[tbl_kategori.nama_kategori]'
        ];
        
        $messages = [
            'nama_kategori' => [
                'required' => 'Nama Kategori tidak boleh Kosong!!',
                'is_unique' => 'Nama Kategori sudah Ada!!',
            ],
        ];
        
        // set validasi
        $validation->setRules($rules, $messages);
        
        // cek validasi gagal
        if(!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/listKategori')->with('errors',$validation->getErrors());
        }


        $data = ['nama_kategori'=> $this->request->getVar('nama_kategori')
    ];
    $this->kategori->save($data);
    return redirect()->to('/listKategori')->with('pesansimpan','Data Berhasil Di Tambahkan');
    }

    public function editKategori($idKategori ){
        $syarat=[
            'id_kategori'=>$idKategori
        ];
        $data=[
            'title' => 'edit data',
            'judulHalaman' => ' Data Kategori',
            'listKategori'=> $this-> kategori->where($syarat)->findAll()
        ];
        
        return view('kategori/edit-kategori', $data);
    }
    public function UpdateKategori(){
        $data=[
            'id_kategori'=>$this->request->getVar('id_kategori'),
            'nama_kategori'=>$this->request->getVar('nama_kategori')
        ];
        $this->kategori->update($this->request->getVar('id_kategori'),$data);
        return redirect()->to('listKategori')->with('pesanedit','Data Berhasil Di Edit');
    }

    

    public function hapusKategori($idkategori){
        $syarat=[
            'id_kategori'=>$idkategori
        ];
        $this->kategori->where($syarat)->delete();
        return redirect()->to('/listKategori')->with('pesan','Data Berhasil Di Hapus');
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->kategori->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }
}
