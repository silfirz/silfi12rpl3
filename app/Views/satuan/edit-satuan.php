<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Satuan</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="<?=site_url('update-satuan');?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Satuan</label>
                  <input type="hidden" class="form-control" id="hidden" name="id_satuan" value="<?=$listSatuan[0]['id_satuan'];?>">
                  <input type="text" class="form-control" id="inputNanme4" name="nama_satuan" value="<?=$listSatuan[0]['nama_satuan'];?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

          <?= $this->endsection();?>