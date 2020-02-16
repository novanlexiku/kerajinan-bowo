<div class="section section-contact-us text-center">
      <div class="container">
        <h2 class="title">Cek Pemesanan</h2>
		<form method="POST" action="<?php echo base_url();?>ordercheck/process">
        <div class="row">
          <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons users_circle-08"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="orderId" placeholder="Masukan ID Pemesanan anda disini">
            </div>
            <div class="input-group input-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons ui-1_email-85"></i>
                </span>
              </div>
              <input type="text" name="noHp" class="form-control" placeholder="Masukan No.Handphone pada saat pemesanan">
            </div>
            <div class="send-button">
			<button type="submit" class="btn btn-primary btn-round btn-block btn-lg">Cek Pemesanan</button>
            </div>
		  </div>
		</div>
		</form>
		<blockquote class="blockquote">
		<p class="description">
			Lengkapi isian di atas untuk melakukan pengecekan pemesanan aksesoris Anda.
		</p>

		<p class="description">
			<strong>ID Pemesanan</strong> adalah 13 digit angka yang terdapat di email pemesanan Aksesoris di <?php echo $title_web;?> yang dikirim ke alamat email Anda.
		</p>

		<p class="description">
			<strong>No.Handphone</strong> adalah nomor telepon / handphone yang digunakan ketika melakukan pemesanan Aksesoris di <?php echo $title_web;?>.
		</p>
		</blockquote>
		
      </div>
    </div>
