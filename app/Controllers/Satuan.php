<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function index()
    {
        //
    }
    public function TampilSatuan(){
        $data =[
            'listsatuan' => $this->satuan->getSatuan()
        ];

        return view('masterdata/list-satuan', $data);
    }

    public function TambahSatuan(){

        return view('Satuan/tambah-satuan');
    }
    public function simpanSatuan(){
        helper(['form']);
$validation = \config\Services::validation();

$rules = [
    'nama_satuan' => 'required|is_unique[tbl_satuan.nama_satuan]'
];

$messages = [
    'nama_satuan' => [
        'required' => 'Nama Satuan tidak boleh Kosong!!',
        'is_unique' => 'Nama satuan sudah Ada!!',
    ],
];

// set validasi
$validation->setRules($rules, $messages);

// cek validasi gagal
if(!$validation->withRequest($this->request)->run()) {
    return redirect()->back()->with('errors',$validation->getErrors());
}
        $data = ['nama_satuan'=> $this->request->getVar('nama_satuan')
    ];
    $this->satuan->save($data);
    return redirect()->to('/listSatuan')->with('pesansimpan','Data Berhasil Di Tambahkan');
    }

    public function editSatuan($idSatuan){
        $syarat=[
            'id_satuan'=>$idSatuan
        ];
        $data=[
            'title' => 'edit data',
            'judulHalaman' => ' Data Satuan',
            'listSatuan'=> $this-> satuan->where($syarat)->findAll()
        ];
        
        return view('satuan/edit-satuan', $data);
    }
    public function UpdateSatuan(){
        $data=[
            'id_satuan'=>$this->request->getVar('id_satuan'),
            'nama_satuan'=>$this->request->getVar('nama_satuan')
        ];
        $this->satuan->update($this->request->getVar('id_satuan'),$data);
        return redirect()->to('listSatuan')->with('pesanedit','Data Berhasil Di Edit');
    }
    public function hapusSatuan($idsatuan){
        $syarat=[
            'id_satuan'=>$idsatuan
        ];
        $this->satuan->where($syarat)->delete();
        return redirect()->to('/listSatuan')->with('pesan','Data Berhasil Di Hapus');;
    } 
    
    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->satuan->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }
    
}
