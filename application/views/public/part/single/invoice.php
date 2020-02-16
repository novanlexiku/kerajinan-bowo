
<?php foreach($aksesoris_data as $hd):?>
<?php endforeach;?>

<?php foreach($inv_data as $ivd):?>
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
			<h2 class="title">Detail Pemesanan</h2>
			<span style="    color: #e2e2e2;
			font-weight: bold;
			display: block;
			font-size: 13px">Detail pemesanan untuk aksesoris <?php echo $hd->name_acc;?></span>
				<br>
								<table style="    width: 100%;">
									<tr style="border-bottom: 1px solid#ddd;padding-bottom: 11px;display: block;width: 100%;">
									<td style="color: #8a8686;width: 188px;">Status</td>
									<td style="font-size: 20px;text-align: right;width: 81%;">
									<?php 
										$status = $ivd->status_inv;

										if($status == 0)
										{
											echo "<span class='pend'>Menunggu Pembayaran</span>";
										}
										elseif($status == 1)
										{
											echo "<span class='proses'>Proses Konfirmasi</span>";
										}
										elseif($status == 2)
										{
											echo "<span class='selesai'>Pembayaran Selesai</span>";
										}
										elseif($status == 9)
										{
											echo "<span class='pend'>Dibatalkan</span>";
										}
									?>
									</td>
								</tr>
								<tr style="border-bottom: 1px solid#ddd;padding-bottom: 11px;display: block;width: 100%;">
									<td style="color: #8a8686;width: 188px;">ID Pemesanan</td>
									<td style="font-size: 20px;text-align: right;width: 81%;">
									<?php echo $ivd->code_inv;?></td>
								</tr>
								<tr style="border-bottom: 1px solid#ddd;padding-bottom: 11px;display: block;width: 100%;">
									<td style="color: #8a8686;width: 188px;">Nama Pemesan</td>
									<td style="font-size: 20px;text-align: right;width: 81%;">
									<?php echo $ivd->name_inv;?></td>
								</tr>
								<tr style="border-bottom: 1px solid#ddd;padding-bottom: 11px;display: block;width: 100%;">
									<td style="color: #8a8686;width: 188px;">No. Telp / Whatsapp</td>
									<td style="font-size: 20px;text-align: right;width: 81%;">
									<?php echo $ivd->handphone_inv;?></td>
								</tr>
								
								<tr style="border-bottom: 1px solid#ddd;padding-bottom: 11px;display: block;width: 100%;">
									<td style="color: #8a8686; width: 188px;">Tujuan :</td>
									<td style="font-size: 20px;	text-align: right;width: 81%;">
									<?php echo $ivd->destination_inv;?></td>
								</tr>
								<tr style="border-bottom: 1px solid#ddd;padding-bottom: 11px;display: block;width: 100%;">
									<td style="color: #8a8686; width: 188px;">Total yang harus dibayar :</td>
									<td style="font-size: 20px;	text-align: right;width: 81%;">
									<?php echo 'Rp. '.rpCurrency($ivd->total_inv);?></td>
								</tr>
							</table>
							<!-- Penghitung Waktu -->
							<blockquote class="blockquote text-center">
							<?php if($status == 0):?>
							
							<p class="mb-0 time-left">Sisa Waktu Pembayaran :</p>
							<footer class="blockquote-footer" id="timer"></footer>
							<?php else:?>
							<?php endif;?>
							<strong>Pembayaran melalui Bank <?php echo $ivd->name_bank;?></strong>
							<br>
							<strong>No.rek : <?php echo $ivd->acc_bank;?></strong> 
							<br>
							<strong>Atas nama : <?php echo $ivd->owner_bank;?></strong>
							</blockquote>           
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


<style type="text/css">
    
.pend
{
    color: orange;
}

.proses
{
    color: blue;
}

.selesai
{
    color:green ;
}

</style>

<script type="text/javascript">


function timer()
{
    $('#timer').load(bu+'public/invoice/timer/<?php echo $ivd->code_inv;?>');
}

setInterval(timer, 1000 );

// confirmation payment
$(document).on('click', '.conf', function(){

    $('#jqContent').load(bu+'public/invoice/conf_invoice/<?php echo $ivd->code_inv;?>');
    $('#jqContent').slideDown('400');

});

$(document).on('submit', '#confForm', function(){

    $.ajax({

        url:bu+'public/invoice/process_invoice',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            alert(data);
            window.location.href=window.location.href;
        }

    });

    return false;

});


</script>
