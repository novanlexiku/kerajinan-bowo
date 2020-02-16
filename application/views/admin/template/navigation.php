<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?= base_url() ?>">
          Selamat Datang <?php echo $this->session->userdata('user_nama');?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>admin/beranda">
              <i class="material-icons">home</i> Dashboard
            </a>
          </li>
					<?php if ($this->session->userdata('user_level')=='1') { ?>
            <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Transaksi
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="<?php echo base_url().'admin/penjualan'?>" class="dropdown-item">
                <i class="material-icons">content_paste</i> Penjualan
              </a>
              <a href="<?php echo base_url().'admin/pembelian'?>" class="dropdown-item">
                <i class="material-icons">layers</i> Pembelian
              </a>
            </div>
					</li>
					<li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">assignment</i> Laporan
            </a>
            <div class="dropdown-menu dropdown-with-icons">
						<a class="nav-link" href="<?php echo base_url().'admin/grafik'?>">
              <i class="material-icons">show_chart</i> Grafik
            </a>
						<a class="nav-link" href="<?php echo base_url().'admin/laporan'?>">
              <i class="material-icons">assignment</i> Laporan
            </a>
						<a class="nav-link" href="<?php echo base_url().'admin/laporan_pemesanan'?>">
              <i class="material-icons">assignment</i> Laporan Invoice
            </a>
            </div>
					</li>
					<li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">settings_applications</i> Settings
            </a>
            <div class="dropdown-menu dropdown-with-icons">
						<a class="nav-link" href="<?php echo base_url().'admin/setting'?>">
              <i class="material-icons">settings_applications</i> Settings
            </a>
						<a class="nav-link" href="<?php echo base_url().'admin/halaman'?>">
              <i class="material-icons">label</i> Halaman
            </a>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'admin/setting'?>">
              <i class="material-icons">settings_applications</i> Settings
            </a>
          </li> -->
					<?php } 
          elseif ($this->session->userdata('user_level')=='2') { ?>
					<li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Transaksi
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="<?php echo base_url().'admin/penjualan'?>" class="dropdown-item">
                <i class="material-icons">content_paste</i> Penjualan
              </a>
              <a href="<?php echo base_url().'admin/pembelian'?>" class="dropdown-item">
                <i class="material-icons">layers</i> Pembelian
              </a>
            </div>
					</li>
					<li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">assignment</i> Laporan
            </a>
            <div class="dropdown-menu dropdown-with-icons">
						
						<a class="nav-link" href="<?php echo base_url().'admin/laporan'?>">
              <i class="material-icons">assignment</i> Laporan
            </a>
						<a class="nav-link" href="<?php echo base_url().'admin/laporan_pemesanan'?>">
              <i class="material-icons">assignment</i> Laporan Invoice
            </a>
            </div>
					</li>
					<?php }?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'Auth/logout'; ?>">
              <i class="material-icons">input</i> Keluar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
