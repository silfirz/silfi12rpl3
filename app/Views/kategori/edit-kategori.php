<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Kategori</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="<?=site_url('update-kategori');?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kategori</label>
                  <input type="hidden" class="form-control" id="hidden" name="id_kategori" value="<?=$listKategori[0]['id_kategori'];?>">
                  <input type="text" class="form-control" id="inputNanme4" name="nama_kategori" value="<?=$listKategori[0]['nama_kategori'];?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

          <?= $this->endsection();?>