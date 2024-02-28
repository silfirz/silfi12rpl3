<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Satuan</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="post" action="simpanSatuan">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control" id="inputNanme4" name="nama_satuan">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
          <?= $this->endsection();?>