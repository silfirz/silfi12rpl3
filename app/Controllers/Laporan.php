<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MProduk;

class Laporan extends BaseController
{
    public function index()
    {
        return view('masterdata/list-laporan');
    }


    public function tampilLaporan()
    {
        $produk = NEW MProduk;
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];

        // $listProduk = $this->produk->getLaporanProduk();

        return view('masterdata/list-laporan', $data);
    }

}
