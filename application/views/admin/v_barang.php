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
                    <span>Tambah Barang</span>
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
                  <th style="text-align:center;width:20px;">No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Harga Pokok</th>
                  <th>Harga (Eceran)</th>
                  <th>Harga (Grosir)</th>
                  <th>Stok</th>
                  <th>Min Stok</th>
                  <th>Kategori</th>
                  <th style="width:100px;text-align:center;">Aksi</th>
              </tr>
          </thead>
          <!-- Memanggil data sesuai array nya -->
          <tbody>
          <?php
              $no=0;
              foreach ($data->result_array() as $a):
                  $no++;
                  $id=$a['barang_id'];
                  $nm=$a['barang_nama'];
                  $satuan=$a['barang_satuan'];
                  $harpok=$a['barang_harpok'];
                  $harjul=$a['barang_harjul'];
                  $harjul_grosir=$a['barang_harjul_grosir'];
                  $stok=$a['barang_stok'];
                  $min_stok=$a['barang_min_stok'];
                  $kat_id=$a['barang_kategori_id'];
                  $kat_nama=$a['kategori_nama'];
          ?>
              <tr>
                  <td style="text-align:center;"><?php echo $no;?></td>
                  <td><?php echo $id;?></td>
                  <td><?php echo $nm;?></td>
                  <td style="text-align:center;"><?php echo $satuan;?></td>
                  <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                  <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                  <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul_grosir);?></td>
                  <td style="text-align:center;"><?php echo $stok;?></td>
                  <td style="text-align:center;"><?php echo $min_stok;?></td>
                  <td><?php echo $kat_nama;?></td>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/tambah_barang'?>">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" required>
                        </div>
                    </div>

                     <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="select show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['kategori_nama'];
                                    ?>
                                        <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                                <?php }?>

                                </select>
                            </div>
                        </div>



                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-9">
                             <select name="satuan" class="select show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>

                                <option>PCS</option>
                                <option>Lusin</option>

                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Pokok</label>
                        <div class="col-xs-9">
                            <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga (Eceran)</label>
                        <div class="col-xs-9">
                            <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga (Grosir)</label>
                        <div class="col-xs-9">
                            <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Minimal Stok</label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." style="width:335px;">
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
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $satuan=$a['barang_satuan'];
                        $harpok=$a['barang_harpok'];
                        $harjul=$a['barang_harjul'];
                        $harjul_grosir=$a['barang_harjul_grosir'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/edit_barang'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nama Barang..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="select show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['kategori_nama'];
                                    if($id_kat==$kat_id)
                                        echo "<option value='$id_kat' selected>$nm_kat</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kat</option>";
                                }
                                ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Satuan</label>
                            <div class="col-xs-9">
                                 <select name="satuan" class="select show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>

                                    <?php if($satuan=='PCS'):?>
                                        <option selected>PCS</option>
                                        <option>Lusin</option>
                                    <?php elseif($satuan=='Lusin'):?>
                                        <option>PCS</option>
                                        <option selected>Lusin</option>
                                    <?php endif;?>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harpok form-control" type="text" value="<?php echo $harpok;?>" placeholder="Harga Pokok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga (Eceran)</label>
                            <div class="col-xs-9">
                                <input name="harjul" class="harjul form-control" type="text" value="<?php echo $harjul;?>" placeholder="Harga Jual..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga (Grosir)</label>
                            <div class="col-xs-9">
                                <input name="harjul_grosir" class="harjul form-control" type="text" value="<?php echo $harjul_grosir;?>" placeholder="Harga Jual Grosir..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" value="<?php echo $stok;?>" placeholder="Stok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok;?>" placeholder="Minimal Stok..." style="width:335px;" required>
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
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $harpok=$a['barang_harpok'];
                        $harjul=$a['barang_harjul'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/hapus_barang'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
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
  

 
  <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
     <?php
 $message = $this->session->flashdata('message');
 $msg = $this->session->flashdata('msg');
 if($msg == "tambahbrg"){
?>
     <script type="text/javascript">
            $(document).ready(function(){
             $.notify({

             },{
                     type: 'success',
                     timer: 100,
                     template: '<div class="alert alert-success"><div class="container">'+
      '<div class="alert-icon"><i class="material-icons">error_outline</i></div>'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>'+
      '<b>Perhatian:</b> Input barang berhasil!'+
      '</div>'+
      '</div>'


             });

        });
    </script>
<?php
};?>
<?php
if($msg == "editbrg"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'success',
                 timer: 100,
                 template: '<div class="alert alert-success"><div class="container">'+
      '<div class="alert-icon"><i class="material-icons">error_outline</i></div>'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>'+
      '<b>Perhatian:</b> Edit Barang telah berhasil!'+
      '</div>'+
      '</div>'

         });

    });
</script>
<?php
}
elseif($msg == "hapusbrg"){
?>
 <script type="text/javascript">
        $(document).ready(function(){
         $.notify({

         },{
                 type: 'warning',
                 timer: 100,
                 template: '<div class="alert alert-warning"><div class="container">'+
      '<div class="alert-icon"><i class="material-icons">error_outline</i></div>'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button>'+
      '<b>Perhatian:</b> Data barang telah berhasil dihapus!'+
      '</div>'+
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
    
    
