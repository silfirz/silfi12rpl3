<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/kasir', 'Home::index');

$routes->get('/', 'Home::login');
$routes->post('/proses-login', 'Pengguna::prosesLogin');
$routes->get('/logout', 'Pengguna::logout');

$routes->get('/dashboard', 'Home::index',['filter'=>'autentifikasi']);


//Master Data

//Devisi
$routes->get('/listPengguna', 'Pengguna::TampilPengguna',['filter'=>'autentifikasi']);
$routes->get('/listSatuan', 'Satuan::TampilSatuan',['filter'=>'autentifikasi']);
$routes->get('/listKategori', 'Kategori::TampilKategori',['filter'=>'autentifikasi']);
$routes->get('/listProduk', 'Produk::TampilProduk',['filter'=>'autentifikasi']);
$routes->get('/listPenjualan', 'Penjualan::index',['filter'=>'autentifikasi']);
$routes->get('/listLaporan', 'Laporan::tampilLaporan',['filter'=>'autentifikasi']);

//kategori
$routes->get('/tambahkategori', 'Kategori::TambahKategori',['filter'=>'autentifikasi']);
$routes->post('/simpanKategori', 'Kategori::simpanKategori',['filter'=>'autentifikasi']);
$routes->post('/hapus-kategori/(:num)', 'Kategori::hapusKategori/$1',['filter'=>'autentifikasi']);
$routes->get('/edit-kategori/(:num)', 'Kategori::editKategori/$1',['filter'=>'autentifikasi']);
$routes->post('/update-kategori', 'Kategori::UpdateKategori',['filter'=>'autentifikasi']);
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1',['filter'=>'autentifikasi']);

//satuan
$routes->get('/tambahsatuan', 'Satuan::TambahSatuan',['filter'=>'autentifikasi']);
$routes->post('/simpanSatuan', 'Satuan::simpanSatuan',['filter'=>'autentifikasi']);
$routes->post('/hapus-satuan/(:num)', 'Satuan::hapusSatuan/$1',['filter'=>'autentifikasi']);
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1',['filter'=>'autentifikasi']);
$routes->post('/update-satuan', 'Satuan::UpdateSatuan',['filter'=>'autentifikasi']);
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1',['filter'=>'autentifikasi']);

//produk
$routes->get('/tambahproduk', 'Produk::TambahProduk',['filter'=>'autentifikasi']);
$routes->post('/simpan-produk', 'Produk::simpanProduk',['filter'=>'autentifikasi']);
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1',['filter'=>'autentifikasi']);
$routes->post('/update-produk', 'Produk::UpdateProduk',['filter'=>'autentifikasi']);
$routes->get('/hapus-produk/(:num)', 'Produk::hapusProduk/$1',['filter'=>'autentifikasi']);

//pengguna
$routes->get('/tambah-pengguna', 'Pengguna::TambahPengguna',['filter'=>'autentifikasi']);
$routes->post('/simpan-pengguna', 'Pengguna::SimpanPengguna',['filter'=>'autentifikasi']);
$routes->get('/edit-pengguna/(:num)', 'Pengguna::editPengguna/$1',['filter'=>'autentifikasi']);
$routes->post('/update-pengguna', 'Pengguna::UpdatePengguna',['filter'=>'autentifikasi']);
$routes->get('/hapus-pengguna/(:num)', 'Pengguna::hapusPengguna/$1',['filter'=>'autentifikasi']);

//cetak
$routes->get('/pdf_view', 'PdfController::index',['filter'=>'autentifikasi']);
$routes->get('/pdf/generate', 'PdfController::generate',['filter'=>'autentifikasi']);

$routes->get('/transaksi-penjualan','Penjualan::index',['filter'=>'autentifikasi']);
$routes->post('/transaksi-penjualan','Penjualan::simpanPenjualan',['filter'=>'autentifikasi']);
$routes->get('/pembayaran','Penjualan::simpanPembayaran',['filter'=>'autentifikasi']);



