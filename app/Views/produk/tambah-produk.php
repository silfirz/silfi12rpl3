<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Produk</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?= site_url('simpan-produk'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kodeProduk" name="kodeProduk"value="<?=$kodeProduk; ?>"disabled>
                                    <label for="kodeProduk">Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="namaProduk" name="namaProduk">
                                    <label for="namaProduk">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=
                                 "form-floating">
                                    <input type="text" class="form-control money" id="hargaBeli" name="hargaBeli">
                                    <label for="hargaBeli">Harga Beli</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=
                                 "form-floating">
                                    <input type="text" class="form-control money" id="hargaJual" name="hargaJual">
                                    <label for="hargaBeli">Harga Jual</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="State" name="idSatuan"> 
                                    <?php if (isset($satuan)) {
                                            $no = null;
                                            foreach ($satuan as $row) {
                                                $no++;
                                                echo '<option value=' . $row['id_satuan'] . '">' . $row['nama_satuan'] . '</option>';
                                            }
                                        }?>
                                    </select>
                                    <label for="floating Select">Satuan Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="State" name="idKategori">
                                    <?php if (isset($kategori)) {
                                            $no = null;
                                            foreach ($kategori as $row) {
                                                $no++;
                                                echo '<option value=' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';
                                            }
                                        }?>
                                    </select>
                                    <label for="floatingSelect">Kategori Produk</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="stok" name="stok">
                                    <label for="stok">Stok</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
          <?= $this->endsection();?>