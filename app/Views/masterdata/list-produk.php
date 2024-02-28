<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<div class="pagetitle">
      <h1>Data Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master Data</li>
          <li class="breadcrumb-item active">Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
    if (session()->getFlashdata('pesan')) { ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <i class="bi bi-exclamation-octagon me-1"></i>
                <?= (session()->getFlashdata('pesan')); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php } ?>

    <?php
      if (session()->getFlashdata('pesansimpan')) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
        <?= (session()->getFlashdata('pesansimpan')); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php } ?>

     <?php
      if (session()->getFlashdata('pesanedit')) { ?>         
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-1"></i>
              <?= (session()->getFlashdata('pesanedit')); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php } ?>

    <a href="<?= site_url('tambahproduk'); ?>" type="button" class="btn btn-primary">Tambah</a>   

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Satuan Produk</th>
                    <th scope="col">Kategori Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1;?>
                  <?php foreach ($listproduk as $row): ?>
                    <tr>
                      <td>
                        <?= $no++ ?>
                 
                  <td>
                  <?= $row['kode_produk'];?>
                  </td>
                  <td>
                  <?= $row['nama_produk'];?>
                  </td>
                  <td>
                  <?= $row['harga_beli'];?>
                  </td>
                  <td>
                  <?= $row['harga_jual'];?>
                  </td>
                  <td>
                  <?= $row['nama_satuan'];?>
                  </td>
                  <td>
                  <?= $row['nama_kategori'];?> 
                  </td>
                  <td>
                  <?= $row['stok'];?>
                  </td>
                  <td>
                    <a href="<?=site_url('/edit-produk/'.$row['id_produk']);?>" title="edit"><i class="bi bi-pencil-square"></i></a>
                    <a href="<?=site_url('/hapus-produk/'.$row['id_produk']);?>" title="hapus"><i class="bi bi-trash"></i></a>
                  </td>
                  </tr>
                  <?php endforeach; ?>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    

<?= $this->endsection();?>