<div class="card">
  <div class="card-body">
  
 <!-- Row konten -->
 <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/pembelian/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th style="width:100px;padding-bottom:5px;">No Faktur</th>
                    <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak');?>" class="form-control input-sm" style="width:200px;" required></th>
                    <th style="width:90px;padding-bottom:5px;">Suplier</th>
                    <td style="width:350px;">
                    <select name="suplier" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Suplier" data-width="100%" required>
                        <?php foreach ($sup->result_array() as $i) {
                            $id_sup=$i['suplier_id'];
                            $nm_sup=$i['suplier_nama'];
                            $al_sup=$i['suplier_alamat'];
                            $notelp_sup=$i['suplier_notelp'];
                            $sess_id=$this->session->userdata('suplier');
                            if($sess_id==$id_sup)
                                echo "<option value='$id_sup' selected>$nm_sup - $al_sup - $notelp_sup</option>";
                            else
                                echo "<option value='$id_sup'>$nm_sup - $al_sup - $notelp_sup</option>";
                        }?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>
                    <div class="form-group" style="width:200px;">
                        <input type="text" name="tgl" class="form-control datetimepicker" value="<?php echo $this->session->userdata('tglfak');?>" placeholder="Tanggal..." required/>
                    </div>
                    
                    </td>
                </tr>
            </table><hr/>
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
                        <th style="text-align:center;">Harga Pokok</th>
                        <th style="text-align:center;">Harga Jual</th>
                        <th style="text-align:center;">Jumlah Beli</th>
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
                         <td style="text-align:right;"><?php echo number_format($items['price']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['harga']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/pembelian/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align:center;">Total</td>
                        <td style="text-align:right;">Rp. <?php echo number_format($this->cart->total());?></td>
                    </tr>
                </tfoot>
            </table>
            <a href="<?php echo base_url().'admin/pembelian/simpan_pembelian'?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
            </div>
        </div>
        <!-- /.row -->
      
  </div>  </div>
</div>
  
   

  
      <?php
     $message = $this->session->flashdata('message');
     $msg = $this->session->flashdata('msg');
     if($msg == "simpanbeli"){
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
      '<b>Perhatian:</b> Pembelian telah berhasil!'+
      '</div>'+
      '</div>'


                 });

            });
        </script>
    <?php
    };?>
    <?php
    if($msg == "gagalbeli"){
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
      '<b>Perhatian:</b> Pembelian gagal dilakukan!'+
      '</div>'+
      '</div>'
             });

        });
    </script>
    <?php
    };
    ?>
      <script type="text/javascript">
           $('.datetimepicker').datetimepicker({
            format: 'YYYY/MM/DD'
    
});
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
  <script type="text/javascript">
      $(document).ready(function(){
          //Ajax kabupaten/kota insert
          $("#kode_brg").focus();
          $("#kode_brg").keyup(function(){
              var kobar = {kode_brg:$(this).val()};
                 $.ajax({
             type: "POST",
             url : "<?php echo base_url().'admin/pembelian/get_barang';?>",
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
    
    
