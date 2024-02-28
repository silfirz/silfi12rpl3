  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="kasir">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php if(session()->get('level') == 'admin'){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=site_url('/listPengguna');?>">
              <i class="bi bi-circle"></i><span>Pengguna</span>
            </a>
          </li>
          <li>
            <a href="<?=site_url('/listSatuan');?>">
              <i class="bi bi-circle"></i><span>Satuan</span>
            </a>
          </li>
          <li>
            <a href="<?=site_url('/listKategori');?>">
              <i class="bi bi-circle"></i><span>Kategori</span>
            </a>
          </li>
          <li>
            <a href="<?=site_url('/listProduk');?>">
              <i class="bi bi-circle"></i><span>Produk</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <?php } ?>

      <?php if(session()->get('level') == 'kasir'){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bag-plus"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="<?= site_url('listPenjualan') ?>">
              <i class="bi bi-circle"></i><span>Penjualan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="<?= site_url('/listLaporan') ?>">
          <i class="bi bi-bar-chart-line"></i>
          <span>Laporan Stok</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <?php } ?>


      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-left"></i>
          <span>logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
