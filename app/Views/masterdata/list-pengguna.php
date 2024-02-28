<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="pagetitle">
      <h1>Data Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master Data</li>
          <li class="breadcrumb-item active">Pengguna</li>
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

        <a href="<?= site_url('tambah-pengguna'); ?>" type="button" class="btn btn-primary">Tambah</a>   

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($listpengguna)){
                    $no=null;
                    foreach ($listpengguna as $baris){
                      $no++;
                      ?>

                      <tr>
                        <td scope="row"><?=$no;?></td>
                        <td><?=$baris['nama_pengguna'];?></td>
                        <td><?=$baris['username'];?></td>
                        <td><?=$baris['level'];?></td>
                        <td>
                        <a href="<?=site_url('/edit-pengguna/'.$baris['id_pengguna']);?>" title="edit"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?=site_url('/hapus-pengguna/'.$baris['id_pengguna']);?>" title="hapus"><i class="bi bi-trash"></i></a></td>
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