<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Produk</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?= site_url('update-produk'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-6">
                                <div class="form-floating">
                                <input type="hidden" class="form-control" id="id_produk"  value="<?= $detailProduk[0]['id_produk']; ?>" name="id_produk" placeholder="">
                                <input type="text" class="form-control" id="kode_produk" value="<?= $detailProduk[0]['kode_produk']; ?>" name="kode_produk" placeholder="Masukan Kode Produk">
                                    <label for="kodeProduk">Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="namaProduk" value="<?= $detailProduk[0]['nama_produk']; ?>" name="namaProduk">
                                    <label for="namaProduk">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=
                                 "form-floating">
                                    <input type="text" class="form-control money" id="hargaBeli" value="<?= $detailProduk[0]['harga_beli']; ?>" name="hargaBeli">
                                    <label for="hargaBeli">Harga Beli</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=
                                 "form-floating">
                                    <input type="text" class="form-control money" id="hargaJual" value="<?= $detailProduk[0]['harga_jual']; ?>" name="hargaJual">
                                    <label for="hargaBeli">Harga Jual</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" value="<?= $detailProduk[0]['id_satuan']; ?>" aria-label="State" name="idSatuan"> 
                                    <?php 
                                    if (isset($satuan)) {
                                            $no = null;
                                            foreach ($satuan as $row) {
                                                $no++;
                                                $detailProduk[0]['id_satuan'] == $row['id_satuan'] ? $pilih='selected' : $pilih=null;
                                                echo '<option value=' . $row['id_satuan'] . '">' . $row['nama_satuan'] . '</option>';
                                            }
                                        }?>
                                    </select>
                                    <label for="floating Select">Satuan Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" value="<?= $detailProduk[0]['id_kategori']; ?>" aria-label="State" name="idKategori">
                                    <?php 
                                    if (isset($kategori)) {
                                            $no = null;
                                            foreach ($kategori as $row) {
                                                $no++;
                                                $detailProduk[0]['id_kategori'] == $row['id_kategori'] ? $pilih='selected' : $pilih=null;
                                                echo '<option value=' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';
                                            }
                                        }?>
                                    </select>
                                    <label for="floatingSelect">Kategori Produk</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="stok" value="<?= $detailProduk[0]['stok']; ?>" name="stok">
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