<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<div class="pagetitle">
  <h1>Data Penjualan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Transaksi</li>
      <li class="breadcrumb-item active">penjualan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          <h1 class="card-title">Penjualan</h1>
            <div class="mt-2  col">
            </div>
<form class="row g-3" action="<?= site_url('/transaksi-penjualan'); ?>" method="POST">
  <?= csrf_field(); ?>
  <div class="col-md-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="nofaktur" value="<?= $NoFaktur; ?>" disabled name="no_faktur">
      <label for="kodeProduk">Nomer Faktur</label>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="namakasir" value="<?= session()->get('nama_pengguna'); ?>" disabled>
      <label for="kodeProduk">Nama Kasir</label>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="tanggalpenjualan" value=<?php echo date("d-m-y"); ?> disabled>
      <label for="hargaBeli">Tanggal Penjualan</label>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingName" value="<?php echo date("h:i:sa"); ?>" disabled>
      <label for="inputName5" class="from-label">Waktu</label>
    </div>
  </div>

  <div class="col-md-5">
    <div class="form-floating">
      <select class="form-select js-example-basic-single" aria-label="Default select example" name="id_produk">
        <option selected="">Open this select menu</option>
        <?php if (isset($produkList)) :
          foreach ($produkList as $row) : ?>
            <option value="<?= $row['id_produk']; ?>"><?= $row['kode_produk']; ?>|<?= $row['nama_produk']; ?> | <?= $row['stok']; ?> | <?= number_format($row['harga_jual'], 0, ',', '.'); ?></option>
        <?php
          endforeach;
        endif; ?>
      </select>
    </div>

  </div>
  <div class="col-md-6">
    <div class="form-floating">
      <input type="text" class="form-control" id="qty" name="qty">
      <label for="qty">Jumlah</label>
    </div>
  </div>
  </div>
  <div class="card-footer text-end">
                      <button type="submit" class="btn sm btn-success"> <i class="bi bi-cart-fill"></i></button>
                    </div>
</form>

<!-- form penjualan -->
  <!-- Table with stripped rows -->
<table class="table">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($detailPenjualan) && !empty($detailPenjualan)) :
    $no = 1;
    foreach ($detailPenjualan as $detail) : ?>
    <tr>
      <td>
      <?= $no++; ?>
    </td>
    <td>
      <?= $detail['nama_produk']; ?>
    </td>
    <td>
    <?= $detail['qty']; ?>
    </td>
    <td>
      <?= number_format($totalHarga, 0, ',', '.'); ?>
    </td>
  </tr>
  <?php endforeach;
  else : ?>
  <tr>
    <td colspan="4">Tidak Ada Produk</td>
  </tr>
  <?php endif; ?>
  </tbody>
</table>
  </div>
  </div>
</div>
</div>
</div>
<!-- End Table with stripped rows -->
<div class="card">
          <div class="card-body">
            <h1 class="card-title">Form Pembayaran</h1>
            <div class="row g-3">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control money"  oninput="calculate()" id="total" name="total" data-mask="000.000.000.000.000" value="<?=number_format($totalHarga, 0, ',', '.');?>">
                    <label for="floatingName">Total :</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control money"  oninput="calculate()" id="txtBayar" name="bayar" data-mask="000.000.000.000.000">
                    <label for="floatingName">Bayar</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control money"  oninput="calculate()" id="kembali" name="kembali" data-mask="000.000.000.000.000">
                    <label for="floatingName">Kembalian</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-end">
                <a button type="submit" class="btn sm btn-success"  href="<?=site_url('pembayaran')?>" >Simpan</a>
              </div>
        </div> <!--end form penjualan -->

        <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen-elemen yang diperlukan
        var txtBayar = document.getElementById('txtbayar');
        var kembali = document.getElementById('kembali');
        var totalHarga = <?= $totalHarga ?>; // Ambil total harga dari controller dan diteruskan ke view

        // Tambahkan event listener untuk memantau perubahan pada input bayar
        txtBayar.addEventListener('input', function() {
            // Ambil nilai yang dibayarkan
            var bayar = parseFloat(txtBayar.value);

            // Hitung kembaliannya
            var kembalian = bayar - totalHarga;

            // Tampilkan kembaliannya pada input kembali
            if (kembalian >= 0) {
                kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
            } else {
                kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
            }
        });
    });
</script>

<script>
    function calculate() {
        // Remove dots from input values and convert to float
        var total = parseFloat(document.getElementById('total').value.replace(/\./g, '').replace(/,/g, '.'));
        var txtBayar = parseFloat(document.getElementById('txtBayar').value.replace(/\./g, '').replace(/,/g, '.'));

        // Calculate change
        var kembali = txtBayar - total;
        
        // Format change with dots as thousands separators
        var formattedChange = new Intl.NumberFormat().format(kembali);

        // Update change input field
        document.getElementById('kembali').value = isNaN(kembali) ? '' : formattedChange;
        
        // Enable/disable payment button based on payedmoney and grandtotal
        var paymentButton = document.getElementById('paymentButton');
        paymentButton.disabled = (txtBayar < total);
    }
</script>   

        <script>
    $(document).ready(function() {
        $('form').submit(function() {
            $('.money').each(function() {
                var unmaskedValue = $(this).cleanVal(); // Get the unmasked value for each input
                $(this).val(unmaskedValue); // Set the unmasked value to the input field
            });
        });
    });
    </script>



<?= $this->endsection(); ?>