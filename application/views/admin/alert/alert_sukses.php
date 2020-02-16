<!--
 =========================================================
 * Material Kit - v2.0.6
 =========================================================

 * Product Page: https://www.creative-tim.com/product/material-kit
 * Copyright 2019 Creative Tim (http://www.creative-tim.com)
   Licensed under MIT (https://github.com/creativetimofficial/material-kit/blob/master/LICENSE.md)


 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->


 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/ui/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/ui/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Toko Kerajinan Bowo
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/ui/css/material-kit.css?v=2.0.6" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>assets/ui/demo/demo.css" rel="stylesheet" />
</head>

  

<body class="landing-page sidebar-collapse">
<!-- Page Content -->
<div class="container">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success">
            <strong>Transaksi Berhasil Silahkan Cetak Faktur Penjualan!</strong>
            <a class="btn btn-default" href="<?php echo base_url().'index.php/admin/penjualan'?>"><span class="ni ni-bold-left"></span>Kembali</a>
            <a class="btn btn-info" href="<?php echo base_url().'index.php/admin/penjualan/cetak_faktur'?>" target="_blank"><span class="ni ni-check-bold"></span>Cetak</a>
        </div>
    </div>
</div>


<hr>



</div>
<!-- /.container -->
 
  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>assets/ui/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/ui/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/ui/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/ui/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo base_url()?>assets/ui/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>assets/ui/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/ui/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
  <!--  Notifications Plugin    -->
<script src="<?php echo base_url().'assets/ui/js/bootstrap-notify.js'?>"></script>
<?php
 $message = $this->session->flashdata('message');
 if($message == "sukseslogin"){
?>
     <script type="text/javascript">
            $(document).ready(function(){
             $.notify({

             },{
                     type: 'info',
                     timer: 100,
                     template: '<div class="alert alert-info"><div class="container">'+
      '<div class="alert-icon"><i class="material-icons">error_outline</i></div>'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>'+
      '<b>Welcome</b> <?php echo $this->session->userdata('user_nama');?>'+
      '</div>'+
      '</div>'


             });

        });
    </script>
<?php
};
?>
</body>

</html>
