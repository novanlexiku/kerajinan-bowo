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
                
                <button type="button" data-toggle="modal" data-target="#largeModal" class="btn btn-white btn-just-icon btn-round">
                    <i class="material-icons">search</i>
                </button>
            </form>
        </div>
    </div>
</nav>
  <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                </tr>
                <tr>
                    <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_barang" style="position:absolute;">
                    </div>
            </table>
             </form>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Diskon(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>

            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->
      
  </div>
   <!-- ============ MODAL ADD =============== -->
   <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </div>
              <div class="modal-body" style="overflow:scroll;height:500px;">
                <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Barang</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga (Eceran)</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
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
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>
                        <td style="text-align:center;">
                          <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
                            <input type="hidden" name="kode_brg" value="<?php echo $id?>">
                            <input type="hidden" name="nabar" value="<?php echo $nm;?>">
                            <input type="hidden" name="satuan" value="<?php echo $satuan;?>">
                            <input type="hidden" name="stok" value="<?php echo $stok;?>">
                            <input type="hidden" name="harjul" value="<?php echo number_format($harjul);?>">
                            <input type="hidden" name="diskon" value="0">
                            <input type="hidden" name="qty" value="1" required>
                            <!-- disable tombol tanpa hapus konten -->
                            <?php if ($stok==0)
                            {?>
                              <button type="submit" class="btn btn-success btn-sm" title="Pilih" disabled><span class="ni ni-cart"></span> Pilih</button>
                            <?php }else{?>
                              <button type="submit" class="btn btn-success btn-sm" title="Pilih"><span class="ni ni-cart"></span> Pilih</button>

                            <?php };?>                            </form>
                          </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>

                </div>

                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

                </div>
              </div>
            </div>
          </div>  </div>
</div>
 

  
      <?php
      $message = $this->session->flashdata('message');
      $msg = $this->session->flashdata('msg');
        ?>
        
      <?php
      if($msg == "uangkurang"){
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
      '<b>Perhatian:</b> jumlah uang yang anda masukkan kurang!'+
      '</div>'+
      '</div>'

          });

        });
      </script>
      <?php
    }
    elseif($msg == "gagaljual"){
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
      '<b>Perhatian:</b> Penjualan gagal dilakukan, periksa kembali inputan anda!'+
      '</div>'+
      '</div>'
        });

      });
    </script>
    <?php
  };
  ?>
<script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
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
    <script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>
    
