<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
<i class="bi bi-exclamation-triangle me-1"></i>
  <?php foreach (session('errors') as $error) : ?>
   
      <?= $error; ?>
    
    <?php endforeach; ?>
 </div>
 <?php endif; ?>

<div class="pagetitle">
      <h1>Data Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master Data</li>
          <li class="breadcrumb-item active">Kategori</li>
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


<div class="row">
        <div class="col-lg-12">

        <a href="<?= site_url('tambahkategori'); ?>" type="button" class="btn btn-primary">Tambah</a>   
        

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($listkategori)){
                    $no=null;
                    foreach ($listkategori as $baris){
                      $no++;
                      ?>

                      <tr>
                        <td scope="row"><?=$no;?></td>
                        <td><?=$baris['nama_kategori'];?></td>
                        <td>
                        <a href="<?=site_url('/edit-kategori/'.$baris['id_kategori']);?>" title="edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="<?= site_url('hapus-kategori/' . $baris['id_kategori']); ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>

                        <button type="submit" class="btn btn-danger"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" id="hapusKategori"
                          data-id="<?= $baris['id_kategori']; ?>"><i class="bi bi-trash-fill"></i></button>
                      </form>
                    </tr>
                    <?php
                    }
                  }
                  ?>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>     
                 
<?= $this->endsection();?>