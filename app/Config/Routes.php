<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/kasir', 'Home::index');

$routes->get('/', 'Home::login');
$routes->post('/proses-login', 'Pengguna::prosesLogin');
$routes->get('/logout', 'Pengguna::logout');

$routes->get('/dashboard', 'Home::index');


//Master Data

//Devisi
$routes->get('/listPengguna', 'Pengguna::TampilPengguna');
$routes->get('/listSatuan', 'Satuan::TampilSatuan');
$routes->get('/listKategori', 'Kategori::TampilKategori');
$routes->get('/listProduk', 'Produk::TampilProduk');
$routes->get('/listPenjualan', 'Penjualan::index');
$routes->get('/listLaporan', 'Laporan::tampilLaporan');

//kategori
$routes->get('/tambahkategori', 'Kategori::TambahKategori');
$routes->post('/simpanKategori', 'Kategori::simpanKategori');
$routes->get('/hapus-kategori/(:num)', 'Kategori::hapusKategori/$1');
$routes->get('/edit-kategori/(:num)', 'Kategori::editKategori/$1');
$routes->post('/update-kategori', 'Kategori::UpdateKategori');
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1');

//satuan
$routes->get('/tambahsatuan', 'Satuan::TambahSatuan');
$routes->post('/simpanSatuan', 'Satuan::simpanSatuan');
$routes->get('/hapus-satuan/(:num)', 'Satuan::hapusSatuan/$1');
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1');
$routes->post('/update-satuan', 'Satuan::UpdateSatuan');
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1');

//produk
$routes->get('/tambahproduk', 'Produk::TambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1');
$routes->post('/update-produk', 'Produk::UpdateProduk');
$routes->get('/hapus-produk/(:num)', 'Produk::hapusProduk/$1');

//pengguna
$routes->get('/tambah-pengguna', 'Pengguna::TambahPengguna');
$routes->post('/simpan-pengguna', 'Pengguna::SimpanPengguna');
$routes->get('/edit-pengguna/(:num)', 'Pengguna::editPengguna/$1');
$routes->post('/update-pengguna', 'Pengguna::UpdatePengguna');
$routes->get('/hapus-pengguna/(:num)', 'Pengguna::hapusPengguna/$1');

//cetak
$routes->get('/pdf_view', 'PdfController::index');
$routes->get('/pdf/generate', 'PdfController::generate');

$routes->get('/transaksi-penjualan','Penjualan::index');
$routes->post('/transaksi-penjualan','Penjualan::simpanPenjualan');
$routes->get('/pembayaran','Penjualan::simpanPembayaran');



