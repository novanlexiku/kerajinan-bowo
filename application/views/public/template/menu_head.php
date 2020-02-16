
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary ">
    <div class="container">
      <div class="dropdown button-dropdown">
        <a href="#" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
          <span class="button-bar"></span>
          <span class="button-bar"></span>
          <span class="button-bar"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-header">Dropdown header</a>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">One more separated link</a>
        </div>
      </div>
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo base_url();?>">
		<?php echo title_web();?>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?php echo base_url();?>assets/hadmin/ui/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
		<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>aksesoris">Aksesoris</a>
		  </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>ordercheck">Cek Pemesanan</a>
		  </li>
		  <?php foreach($menu as $md):?>
				<?php if(count($menu)>0):?>
			<li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'page/'.url_title($md->name_page, '-', TRUE);?>"><?php echo $md->name_page;?></a>
          	</li>
				<?php else:?>
				<?php endif;?>
				<?php endforeach;?>
         
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
