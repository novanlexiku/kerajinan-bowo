<?php foreach($aksesoris_data as $hd):?>
<?php endforeach;?>
<!-- title -->
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>aksesoris">Aksesoris</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $hd->name_acc;?></li>
  </ol>
</nav>

<div class="section section-about-us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
		  	<h2 class="title"><?php echo title_web();?></h2>
            <h5 class="description"><?php echo slogan_web();?></h5>
          </div>
        </div>
        <div class="separator separator-primary"></div>
        <div class="section-story-overview">
          <div class="row">
            <div class="col-md-6">
              <div class="image-container" style="background-image: url('<?php echo base_url().'assets/hpublic/img_aksesoris/'.$hd->image_acc;?>')" >
                <!-- First image on the left side -->
                <p class="blockquote blockquote-primary">
				<span>Untuk pelanggan di wajibkan memberikan :</span>
				<br>
				<small>- 1 foto copy KTP</small>
				<br>
				<small>- Uang Jaminan</small>
                </p>
              </div>
              <!-- Second image on the left side of the article -->
            </div>
            <div class="col-md-5">
              <!-- First image on the right side, above the article -->
			  <h3><?php echo $hd->name_acc;?></h3>
			  <blockquote class="blockquote">
				<footer class="blockquote-footer">Harga :<?php echo ' Rp. '.rpCurrency($hd->price_acc);?> <cite title="Source Title"></cite></footer>
				<p class="mb-0"><?php echo $hd->desc_acc;?></p>  
			</blockquote>
			<h2 class="title">Form Pemesanan</h2>
			<span style="    color: #e2e2e2;
			font-weight: bold;
			display: block;
			font-size: 13px">Form pemesanan untuk aksesoris <?php echo $hd->name_acc;?></span>
				<br>
			
			<form method="POST" action="<?php echo base_url();?>cpublic/p_process_form">
			<input type="hidden" name="idvh" value="<?php echo $hd->id_acc;?>">
        	<input type="hidden" name="price" value="<?php echo $hd->price_acc;?>">
			<div class="form-group">
			<label for="exampleFormControlInput1">Nama Pemesan</label>
				<div class="form-row">
					<div class="col">
					<input type="text" name="fname" class="form-control" placeholder="Nama depan" required>
					</div>
					<div class="col">
					<input type="text" name="lname" class="form-control" placeholder="Nama belakang" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Email</label>
				<input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">No. Handphone</label>
				<input type="text" name="hp" class="form-control" id="exampleFormControlInput1" placeholder="0812345678" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Tujuan</label>
				<textarea class="form-control" name="destination" id="exampleFormControlTextarea1" rows="2" placeholder="Alamat Tujuan / Lokasi Tujuan" required></textarea>
			</div>
			
			<div class="form-group">
				<label for="exampleFormControlInput1">Jumlah Barang</label>
				<input type="number" name="long" placeholder="Jumlah Barang" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Metode Pembayaran</label>
				<select name="bank" class="form-control" id="exampleFormControlSelect1">
				<option value="">-- Pilih Pembayaran --</option>
				<?php foreach($bank_data as $bd):?>
				<option value="<?php echo $bd->id_bank;?>"><?php echo $bd->name_bank;?></option>
				<?php endforeach;?>
				</select>
			</div>
			<input type="submit" name="submit" value="Kirim Pesanan" class="btn btn-success">
			</form>            
		</div>
          </div>
        </div>
      </div>
	</div>
	<!-- Akhir dari konten -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/hadmin/css/timepicker.css">
<script src="<?php echo base_url();?>assets/hpublic/js/timepicker.js"></script>
<script>

  $( function() {
    $( ".startdate" ).datetimepicker({ timepicker:false, format: 'd-m-Y' });

    

  });
jQuery('.starttime').datetimepicker({
  datepicker:false,
  format:'H:i'
});

  </script>
