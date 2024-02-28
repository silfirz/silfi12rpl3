<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Mpenjualan;
use App\Models\MProduk;

class Penjualan extends BaseController
{
    public function index()
    {
        $no_faktur = $this->penjualan->generateTransactionNumber();
        $data=[
            'detailPenjualan' => $this->detail->getDetailPenjualan(session()->get('IdPenjualan')),
            'listproduk' => $this->produk->getProduk(),
            'produkList'=> $this->produk->findAll(),
            'NoFaktur' => $this->penjualan->generateNoFaktur(),
            'totalHarga' =>$this->penjualan->getTotalHargaById(session()->get('IdPenjualan')),
        ];
        return view('masterdata/list-penjualan',$data);
    }

   public function TambahPenjualan(){
    $data =[
        'NoFaktur' => $this->penjualan->generateNoFaktur(),
        'nama_pengguna' => session()->get('nama_pengguna'),
        'produk' => $this->produk->getProduk()
    ];

       return view('penjualan/tambah-penjualan', $data);
   }

   public function simpanPenjualan(){
    // ambil detail barang yang dijual
    $where=['id_produk'=>$this->request->getPost('id_produk')];
//NOTE BAGIAN GET POST ITU NGAMBIL DARI VIEW BAGIAN <input name=”(disini)”>
    $cekBarang=$this->produk->where($where)->findAll(); 
    $hargaJual=$cekBarang[0]['harga_jual'];

    if(session()->get('IdPenjualan') == null){            
        // 1. Menyiapkan data penjualan
        date_default_timezone_set('Asia/Jakarta');
        // Mendapatkan waktu saat ini dalam zona waktu yang telah diatur
        $tanggal_sekarang = date('Y-m-d H:i:s');

        $dataPenjualan=[
            'no_faktur'=>$this->penjualan->generateNoFaktur(),
            'tgl_penjualan'=>$tanggal_sekarang, // Perbaiki format tanggal
            'id_pengguna'=> session()->get('id_pengguna'),
            'total'=>0
//NOTE SAMAIN TABEL PENJUALAN YA
        ];
        
        // 2. Menyimpan data ke dalam tabel penjualan
        $this->penjualan->insert($dataPenjualan);

        // 3. Menyiapkan data untuk menyimpan detail penjualan
        $idPenjualanBaru = $this->penjualan->insertID(); // Mendapatkan ID penjualan baru
        $dataDetailPenjualan=[
            'id_penjualan'=>$idPenjualanBaru,
            'id_produk'=>$this->request->getPost('id_produk'),
            // 'kode_produk'=>$this->request->getPost('kode_produk'),
            'qty'=> $this->request->getPost('qty'),
            'total_harga'=>$hargaJual*$this->request->getPost('qty')
        ];
//NOTE SAMAIN KAYA DETAIL PENJUALAN
        // 4. Menyimpan data ke dalam tabel detail penjualan
        $this->detail->insert($dataDetailPenjualan);

        // 5. Membuat session untuk penjualan baru
        session()->set('IdPenjualan', $idPenjualanBaru);
    } else {
        // Jika ada ID penjualan yang sudah tersimpan di sesi, gunakan ID itu untuk menyimpan detail penjualan
        $idPenjualanSaatIni = session()->get('IdPenjualan');
        $dataDetailPenjualan=[
            'id_penjualan'=>$idPenjualanSaatIni,
            'id_produk'=>$this->request->getPost('id_produk'),
            // 'kode_produk'=>$this->request->getPost('kode_produk'),
            'qty'=> $this->request->getPost('qty'),
            'total_harga'=>$hargaJual*$this->request->getPost('qty')
        ];

        // Simpan data ke dalam tabel detail penjualan
        $this->detail->insert($dataDetailPenjualan);
    }

    // Mengarahkan pengguna kembali ke halaman transaksi penjualan
    return redirect()->to('transaksi-penjualan');
}
public function simpanPembayaran(){
    // Mendapatkan ID penjualan yang selesai
    $idPenjualanSelesai = session()->get('IdPenjualan');
    
    // Menghapus ID penjualan dari sesi
    session()->remove('IdPenjualan');
    
    // Mengarahkan pengguna kembali ke halaman transaksi penjualan
    return redirect()->to('/listPenjualan');
}


   
}
