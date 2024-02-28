<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {
        //
    }
    public function TampilProduk(){
        $data =[
            'listproduk' => $this->produk->getProduk()
         ];

        return view('masterdata/list-produk', $data);
    }

    public function TambahProduk(){
        $data = [
            'validation' => \Config\Services::validation(), 
            'kategori' =>$this->kategori->findAll(), 
            'satuan' =>$this->satuan->findAll(),
            'kodeProduk' => $this->produk->generateProductCode()
        ];

        return view('Produk/tambah-produk', $data);
    }

    public function simpanProduk(){
        $kodeProduk= $this->produk->generateProductCode();
        $data = [
            'kode_produk'=> $kodeProduk,
            'nama_produk'=> $this->request->getVar('namaProduk'),
            'harga_beli'=> str_replace('.', '', $this->request->getVar('hargaBeli')),
            'harga_jual'=> str_replace('.', '', $this->request->getVar('hargaJual')),
            'id_satuan'=> $this->request->getVar('idSatuan'),
            'id_kategori'=> $this->request->getVar('idKategori'),
            'stok'=> $this->request->getVar('stok'),
    ];
    $this->produk->save($data);
    return redirect()->to('/listProduk')->with('pesansimpan','Data Berhasil Di Tambahkan');
    }

    public function editProduk($idProduk ){
        $syarat=[
            'id_produk'=>$idProduk
        ];
        $data=[
            'title' => 'edit data',
            'judulHalaman' => ' Data Produk',
            'detailProduk'=> $this-> produk->where($syarat)->findAll(),
            'kategori' =>$this->kategori->findAll(), 
            'satuan' =>$this->satuan->findAll(),
        ];
        
        return view('produk/edit-produk', $data);
    }
    public function UpdateProduk(){
        $data=[
            'kode_produk'=>$this->request->getVar('kode_produk'),
            'nama_produk'=>$this->request->getVar('namaProduk'),
            'harga_beli'=> str_replace('.', '',$this->request->getVar('hargaBeli')),
            'harga_jual'=> str_replace('.', '',$this->request->getVar('hargaJual')),
            'id_satuan'=>$this->request->getVar('idSatuan'),
            'id_kategori'=>$this->request->getVar('idKategori'),
            'stok'=>$this->request->getVar('stok')

        ];
        $this->produk->update($this->request->getVar('id_produk'),$data);
        return redirect()->to('listProduk')->with('pesanedit','Data Berhasil Di Edit');
    }


    public function hapusProduk($idproduk){
        $syarat=[
            'id_produk'=>$idproduk
        ];
        $this->produk->where($syarat)->delete();
        return redirect()->to('/listProduk')->with('pesan','Data Berhasil Di Hapus');
    }
}
