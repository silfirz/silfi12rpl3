<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="row">
  <div class="col-lg-12">
    <div class="card card-info ">

      <!-- form start -->
      <form action="<?= site_url('simpan-pengguna'); ?>" method="POST">

        <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Nama User</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="nama">
              <input type="text" class="form-control" id="inputJenis" name="nama" required name="pengguna" placeholder="Masukan Nama User">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">username</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="inputJenis" name="username">
            <input type="text" class="form-control" id="inputJenis" name="username" required name="pengguna" placeholder="Masukan  username">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="inputJenis" name="password">
            <input type="text" class="form-control" id="inputJenis" name="password" required name="pengguna" placeholder="Masukan  Password">
          </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Level</label>
            <div class="col-sm-10">
              <select class="form-control" id="inputJenis" name="level">
                <option value="">Silahkan Pilih Level</option>
                <?php foreach ($listlevel as $value) : ?>
                  <option value="<?= $value['level']; ?>"><?= $value['level']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
       


        
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>

  </div>
</div>
                 
<?= $this->endsection();?>