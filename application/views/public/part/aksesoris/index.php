<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Aksesoris</li>
  </ol>
</nav>
	<!-- Bagian Daftar Aksesoris -->
    <div class="section section-team text-center">
      <div class="container">
        <h2 class="title">Daftar Aksesoris yang dapat anda pilih</h2>
        <div class="team">
          <div class="row">
			  <!-- Mulai memanggil daftar aksesoris -->
			  <?php foreach($aksesoris_data as $raksesoris):?>

            <div class="col-md-4">
                <div class="card text-center" style="width: 20rem;">
                <img class="card-img-top" style="height: 240px;" src="<?php echo base_url().'assets/hpublic/img_aksesoris/'.$raksesoris->image_acc;?>" alt="Card image cap">
                  <div class="card-body">
					<h4 class="card-title"><?php echo $raksesoris->name_acc;?></h4>
					<blockquote class="blockquote blockquote-primary mb-0">
					<p><?php echo $raksesoris->desc_acc;?></p>
					<footer class="blockquote-footer"><?php echo 'Rp. '.rpCurrency($raksesoris->price_acc);?> <cite title="Source Title"></cite></footer>
					</blockquote>
                    <a href="<?php echo base_url().'aksesoris/'.$raksesoris->slug_acc;?>" class="btn btn-primary">Pesan Sekarang</a>
                  </div>
                </div>
			</div>
			<?php endforeach;?>
            <!-- Akhir dari daftar aksesoris -->
          </div>
        </div>
      </div>
	</div>
