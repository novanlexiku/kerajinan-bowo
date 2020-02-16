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
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/hadmin/ui/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/hadmin/ui/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Toko Kerajinan Bowo || Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/hadmin/ui/css/material-kit.css?v=2.0.6" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?= base_url() ?>">
          Toko Kerajinan Bowo </a>
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
            <a class="nav-link" href="<?= base_url() ?>">
              <i class="material-icons">home</i> kembali ke Home
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('<?php echo base_url()?>assets/hadmin/ui/img/bg.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form class="form" role="form" action="<?php echo base_url().'index.php/auth'; ?>" method="post" accept-charset="utf-8" >
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input class="form-control" name="user_username" placeholder="Username" type="text" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input class="form-control" name="user_password" placeholder="Password" type="password" required>
                </div>
              </div>
              <div class="footer text-center">
              <button type="submit" class="btn btn-primary my-4">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/hadmin/ui/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
  <!--  Notifications Plugin    -->
<script src="<?php echo base_url().'assets/hadmin/ui/js/bootstrap-notify.js'?>"></script>
<?php

$message = $this->session->flashdata('message');
if($message == "usernamesalah"){
  ?>
  <script type="text/javascript">
  $(document).ready(function(){
    $.notify({

    },{

      timer: 200,
      template: '<div class="alert alert-danger"><div class="container">'+
      '<div class="alert-icon"><i class="material-icons">error_outline</i></div>'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>'+
      '<b>Peringatan:</b> Username yang anda masukkan Salah!'+
      '</div>'+
      '</div>'


    });

  });
  </script>
  <?php
}elseif($message == "passwordsalah"){
  ?>
  <script type="text/javascript">
  $(document).ready(function(){
    $.notify({

    },{
      type: 'danger',
      timer: 500,
      template: '<div class="alert alert-danger"><div class="container">'+
      '<div class="alert-icon"><i class="material-icons">error_outline</i></div>'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>'+
      '<b>Peringatan:</b> Password yang anda masukkan Salah!'+
      '</div>'+
      '</div>'

    });

  });
</script>
<?php
}
else{
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
      '<b>Peringatan:</b> Anda telah logout, silahkan login kembali !'+
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
