
    <div class="container">
      <div class="section text-center">
        
        <div class="features">
          <div class="row">
		  <?php if ($this->session->userdata('user_level')=='1') { ?>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                <a href="<?php echo base_url().'admin/penjualan'?>">
                    <div class="icon">
                        <i class="material-icons">content_paste</i>
                    </div>
                    <h3 class="card-title">Penjualan</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/pembelian'?>">
                    <div class="icon">
                        <i class="material-icons">layers</i>
                    </div>
                    <h3 class="card-title">Pembelian</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/barang'?>">
                    <div class="icon">
                        <i class="material-icons">archive</i>
                    </div>
                    <h3 class="card-title">Barang</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/suplier'?>">
                    <div class="icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <h3 class="card-title">Suplier</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/laporan'?>">
                    <div class="icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h3 class="card-title">Laporan</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/pengguna'?>">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <h3 class="card-title">Pengguna</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
			<div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/aksesoris'?>">
                    <div class="icon">
                        <i class="material-icons">inbox</i>
                    </div>
                    <h3 class="card-title">Aksesoris</h3>
                    
                    </a>
                    </div>
                </div>
			</div>
			<div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/tagihan'?>">
                    <div class="icon">
                        <i class="material-icons">save_alt</i>
                    </div>
                    <h3 class="card-title">Tagihan</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
			<?php } 
          elseif ($this->session->userdata('user_level')=='2') { ?>
			 <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                <a href="<?php echo base_url().'admin/penjualan'?>">
                    <div class="icon">
                        <i class="material-icons">content_paste</i>
                    </div>
                    <h3 class="card-title">Penjualan</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/pembelian'?>">
                    <div class="icon">
                        <i class="material-icons">layers</i>
                    </div>
                    <h3 class="card-title">Pembelian</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/barang'?>">
                    <div class="icon">
                        <i class="material-icons">archive</i>
                    </div>
                    <h3 class="card-title">Barang</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
			<div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/laporan'?>">
                    <div class="icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h3 class="card-title">Laporan</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
			<div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/aksesoris'?>">
                    <div class="icon">
                        <i class="material-icons">inbox</i>
                    </div>
                    <h3 class="card-title">Aksesoris</h3>
                    
                    </a>
                    </div>
                </div>
			</div>
			<div class="col-md-4 ml-auto mr-auto">
                <div class="card card-pricing bg-primary"><div class="card-body ">
                    <a href="<?php echo base_url().'admin/tagihan'?>">
                    <div class="icon">
                        <i class="material-icons">save_alt</i>
                    </div>
                    <h3 class="card-title">Tagihan</h3>
                    
                    </a>
                    </div>
                </div>
            </div>
			<?php }?>



          </div>
        </div>
      </div>
      
    </div>
  </div>

    
  </div>
