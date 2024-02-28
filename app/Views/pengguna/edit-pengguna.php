<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Satuan</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="<?=site_url('update-pengguna');?>">
                <div class="col-12">
                  
                  <input type="hidden" class="form-control" id="hidden" name="id_pengguna" value="<?=$listPengguna[0]['id_pengguna'];?>">
                  <label for="inputNanme4" class="form-label">Nama Pengguna</label>
                  <input type="text" class="form-control" id="inputNanme4" name="nama_pengguna" value="<?=$listPengguna[0]['nama_pengguna'];?>">
                  <label for="inputNanme4" class="form-label">Username</label>
                  <input type="text" class="form-control" id="inputNanme4" name="username" value="<?=$listPengguna[0]['username'];?>">
                  <label for="inputNanme4" class="form-label">Password</label>
                  <input type="text" class="form-control" id="inputNanme4" name="password" value="<?=$listPengguna[0]['password'];?>">
                  <div class="form-group row">
                    
                  <label for="inputEmail3" class="col-sm-7 col-form-label">Level</label>
            <div class="col-sm-10">
              <select class="form-control" id="inputJenis" name="Level" value="<?= $listPengguna[0]['level']; ?>">
                <option value=""></option>
                <option value="Admin" <?php echo ($listPengguna[0]['level'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="Kasir" <?php echo ($listPengguna[0]['level'] == 'Kasir') ? 'selected' : ''; ?>>Kasir</option>
              </select>
            </div>
          </div>

                    <required name="pengguna" placeholder="Masukan Nama Pengguna">
                </div> 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

          <?= $this->endsection();?>