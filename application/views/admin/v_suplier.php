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
                    <span>Tambah Suplier</span>
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
                        <th>Nama Suplier</th>
                        <th>Alamat</th>
                        <th>No Telp/HP</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <!-- Memanggil data sesuai array nya -->
                <tbody>
                  <?php
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['suplier_id'];
                        $nm=$a['suplier_nama'];
                        $alamat=$a['suplier_alamat'];
                        $notelp=$a['suplier_notelp'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $alamat;?></td>
                        <td><?php echo $notelp;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-sm btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Suplier</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/suplier/tambah_suplier'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Suplier</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Suplier..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat" class="form-control" type="text" placeholder="Alamat..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No Telp/ HP</label>
                        <div class="col-xs-9">
                            <input name="notelp" class="form-control" type="text" placeholder="No Telp/HP..." style="width:280px;" required>
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
                        $id=$a['suplier_id'];
                        $nm=$a['suplier_nama'];
                        $alamat=$a['suplier_alamat'];
                        $notelp=$a['suplier_notelp'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit Suplier</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/suplier/edit_suplier'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id;?>">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Suplier</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Suplier..." value="<?php echo $nm;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                            <input name="alamat" class="form-control" type="text" placeholder="Alamat..." value="<?php echo $alamat;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No Telp/ HP</label>
                        <div class="col-xs-9">
                            <input name="notelp" class="form-control" type="text" placeholder="No Telp/HP..." value="<?php echo $notelp;?>" style="width:280px;" required>
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

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['suplier_id'];
                        $nm=$a['suplier_nama'];
                        $alamat=$a['suplier_alamat'];
                        $notelp=$a['suplier_notelp'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Hapus Suplier</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/suplier/hapus_suplier'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-sm btn-primary">Hapus</button>
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
 if($msg == "tambahsuplier"){
?>
     <script type="text/javascript">
            $(document).ready(function(){
             $.notify({

             },{
                     type: 'success',
                     timer: 100,
                     template: '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                         '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                         '<span class="alert-inner--text"><strong>Berhasil! </strong> Input data Suplier </span>'+
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
if($msg == "editsuplier"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'success',
                 timer: 100,
                 template: '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                     '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                     '<span class="alert-inner--text"><strong>Berhasil!</strong> Edit data Suplier !</span>'+
                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                     '<span aria-hidden="true">&times;</span>'+
                                     '</button>'+
                                     '</div>'

         });

    });
</script>
<?php
}
elseif($msg == "hapussuplier"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'warning',
                 timer: 100,
                 template: '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
                                     '<span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>'+
                                     '<span class="alert-inner--text"><strong>Peringatan!</strong> Suplier telah di hapus !</span>'+
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
    
    
