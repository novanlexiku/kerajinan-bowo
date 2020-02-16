<div id="jqContent">
</div>
 
<footer class="footer footer-default">
      <div class=" container ">
	  <div class="footer-wrapper">

		<div class="pay-wrapper" style="text-align: center;">
			<h4>Kami Menerima Pembayaran Melalui</h4>
			<br>
			<div class="pay-content">
			
			<?php foreach($bank_data as $bd):?>
				<div class="pay" style="width: 67px;
		height: 38px;
		background: #fff;
		margin: auto;
		text-align: center;
		display: inline-block;
		vertical-align: top;
		padding: 4px;
		border-radius: 4px;">
					<img src="<?php echo base_url().'assets/hpublic/img_bank/'.$bd->logo_bank;?>" style="width: 100%;">
				</div>
			<?php endforeach;?>

			</div>
		</div>
		<br>
		</div>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, All right reserved
        </div>
      </div>
    </footer>
  </div>
