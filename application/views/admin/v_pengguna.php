<div class="card">
  <div class="card-body">
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
        

            <form class="form-inline ml-auto">
                
                <button type="button" data-toggle="modal" data-target="#largeModal" class="btn btn-white btn-round">
                    <span>Tambah Pengguna</span>
                    <i class="material-icons">add</i>
                </button>
            </form>
        </div>
    </div>
</nav>
 <!-- Row Konten -->

 <div class="table-responsive">
              <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead class="thead-light">
                    <tr>
                      <th style="text-align:center;width:40px;">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <!-- Memanggil data sesuai array nya -->
                <tbody>
                  <?php
                      $no=0;
                      foreach ($data->result_array() as $a):
                          $no++;
                          $id=$a['user_id'];
                          $nm=$a['user_nama'];
                          $username=$a['user_username'];
                          $password=$a['user_password'];
                          $level=$a['user_level'];
                          $status=$a['user_status'];
                  ?>
                      <tr>
                          <td style="text-align:center;"><?php echo $no;?></td>
                          <td><?php echo $nm;?></td>
                          <td><?php echo $username;?></td>
                          <td><?php echo $password;?></td>
                          <td><?php echo $level;?></td>
                          <td><?php echo $status;?></td>
                          <td style="text-align:center;">
                              <a class="btn btn-sm btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                              <?php if($status =='1'){ ?>


                              <a class="btn btn-sm btn-danger" href="#modaldeactivePelanggan<?php echo $id?>" data-toggle="modal" title="Nonaktifkan"><span class="fa fa-close"></span> Deactivated</a>
                            <?php }elseif($status=='0'){ ?>


                              <a class="btn btn-sm btn-success" href="#modalreactivePelanggan<?php echo $id?>" data-toggle="modal" title="Aktifkan"><span class="fa fa-close"></span> Reactivated</a>

                          <?php  }?>
                          </td>
                      </tr>
                  <?php endforeach;?>
                </tbody>
            </table>

          </div>
          </div>
        </div>

      </div>

      <!-- ============ MODAL ADD =============== -->
          <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/tambah_pengguna'?>">
                  <div class="modal-body">

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Nama</label>
                          <div class="col-xs-9">
                              <input name="nama" class="form-control" type="text" placeholder="Input Nama..." style="width:280px;" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Username</label>
                          <div class="col-xs-9">
                              <input name="username" class="form-control" type="text" placeholder="Input Username..." style="width:280px;" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Password</label>
                          <div class="col-xs-9">
                              <input name="password" class="form-control" type="password" placeholder="Input Password..." style="width:280px;" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Ulangi Password</label>
                          <div class="col-xs-9">
                              <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." style="width:280px;" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Level</label>
                          <div class="col-xs-9">
                              <select name="level" class="form-control" style="width:280px;" required>
                                  <option value="1">Admin</option>
                                  <option value="2">Kasir</option>
                              </select>
                          </div>
                      </div>

                  </div>

                  <div class="modal-footer">
                      <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button class="btn btn-sm btn-info">Simpan</button>
                  </div>
              </form>
              </div>
              </div>
          </div>

          <!-- ============ MODAL EDIT =============== -->
          <?php
                      foreach ($data->result_array() as $a) {
                          $id=$a['user_id'];
                          $nm=$a['user_nama'];
                          $username=$a['user_username'];
                          $password=$a['user_password'];
                          $level=$a['user_level'];
                          $status=$a['user_status'];
                      ?>
                  <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/edit_pengguna'?>">
                          <div class="modal-body">
                              <input name="kode" type="hidden" value="<?php echo $id;?>">

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Nama</label>
                          <div class="col-xs-9">
                              <input name="nama" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Input Nama..." style="width:280px;" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Username</label>
                          <div class="col-xs-9">
                              <input name="username" class="form-control" type="text" value="<?php echo $username;?>" placeholder="Input Username..." style="width:280px;" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Password</label>
                          <div class="col-xs-9">
                              <input name="password" class="form-control" type="password" placeholder="Input Password..." style="width:280px;">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Ulangi Password</label>
                          <div class="col-xs-9">
                              <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..." style="width:280px;">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-xs-3" >Level</label>
                          <div class="col-xs-9">
                              <select name="level" class="form-control" style="width:280px;" required>
                              <?php if ($level=='1'):?>
                                  <option value="1" selected>Admin</option>
                                  <option value="2">Kasir</option>
                              <?php else:?>
                                  <option value="1">Admin</option>
                                  <option value="2" selected>Kasir</option>
                              <?php endif;?>
                              </select>
                          </div>
                      </div>

                  </div>
                          <div class="modal-footer">
                              <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                              <button type="submit" class="btn btn-sm btn-info">Update</button>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
              <?php
          }
          ?>

          <!-- ============ MODAL Aktif/Non Aktif =============== -->
          <?php
                      foreach ($data->result_array() as $a) {
                          $id=$a['user_id'];
                          $nm=$a['user_nama'];
                          $username=$a['user_username'];
                          $password=$a['user_password'];
                          $level=$a['user_level'];
                          $status=$a['user_status'];
                      ?>
                  <div id="modaldeactivePelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">NonAktifkan Pengguna</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/nonaktifkan'?>">
                          <div class="modal-body">
                              <p>Yakin mau menonaktifkan pengguna <b><?php echo $nm;?></b>..?</p>
                                      <input name="kode" type="hidden" value="<?php echo $id; ?>">
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                              <button type="submit" class="btn btn-sm btn-primary">Nonaktifkan</button>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
              <?php
          }
          ?>
          <?php
                      foreach ($data->result_array() as $a) {
                          $id=$a['user_id'];
                          $nm=$a['user_nama'];
                          $username=$a['user_username'];
                          $password=$a['user_password'];
                          $level=$a['user_level'];
                          $status=$a['user_status'];
                      ?>
                  <div id="modalreactivePelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">Aktifkan Pengguna</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/pengguna/aktifkan'?>">
                          <div class="modal-body">
                              <p>Mau mengaktifkan pengguna <b><?php echo $nm;?></b>..?</p>
                                      <input name="kode" type="hidden" value="<?php echo $id; ?>">
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                              <button type="submit" class="btn btn-sm btn-primary">Aktifkan</button>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
              <?php
          }
          ?>
          <!--END MODAL-->
  </div>  </div>
</div>
  
   

  <?php
 $message = $this->session->flashdata('message');
 $msg = $this->session->flashdata('msg');
 if($msg == "tambahpengguna"){
?>
     <script type="text/javascript">
            $(document).ready(function(){
             $.notify({

             },{
                     type: 'success',
                     timer: 100,
                     template: '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                         '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                         '<span class="alert-inner--text"><strong>Berhasil! </strong> Input data Pengguna </span>'+
                                         '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                         '<span aria-hidden="true">&times;</span>'+
                                         '</button>'+
                                         '</div>'


             });

        });
    </script>
<?php
};?>
<?php
if($msg == "updatepengguna"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'success',
                 timer: 100,
                 template: '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                     '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                     '<span class="alert-inner--text"><strong>Berhasil!</strong> Edit data Pengguna !</span>'+
                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                     '<span aria-hidden="true">&times;</span>'+
                                     '</button>'+
                                     '</div>'

         });

    });
</script>
<?php
}
elseif($msg == "penggunadeactivated"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'warning',
                 timer: 100,
                 template: '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
                                     '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                     '<span class="alert-inner--text"><strong>Peringatan!</strong> Pengguna telah di nonaktifkan !</span>'+
                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                     '<span aria-hidden="true">&times;</span>'+
                                     '</button>'+
                                     '</div>'
         });

    });
</script>
<?php
}elseif($msg == "penggunaactivated"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'success',
                 timer: 100,
                 template: '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                     '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                     '<span class="alert-inner--text"><strong>Berhasil!</strong> Pengguna telah di aktifkan kembali !</span>'+
                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                     '<span aria-hidden="true">&times;</span>'+
                                     '</button>'+
                                     '</div>'
         });

    });
</script>
<?php
}elseif($msg == "passwordtidaksama"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'warning',
                 timer: 100,
                 template: '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
                                     '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                     '<span class="alert-inner--text"><strong>Peringatan!</strong> Password yang anda masukkan tidak sama !</span>'+
                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                     '<span aria-hidden="true">&times;</span>'+
                                     '</button>'+
                                     '</div>'
         });

    });
</script>
<?php
};
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mydata').DataTable();
    } );
</script>
    
    
