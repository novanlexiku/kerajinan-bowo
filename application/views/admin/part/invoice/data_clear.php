<div class="card">
  <div class="card-body">
  <h4>Tagihan Selesai</h4>
<br>
<div class="alert alert-warning"><strong>Perhatian !</strong> Kotak pencarian digunakan untuk mencari nama pemesan dan kode tagihan</div>

<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/invoice/invoice_clear_data"
       data-pagination="true"
       data-side-pagination="server"
       data-page-list="[5, 10, 20, 50, 100, 200]"
       data-search="true"

       data-toolbar="#toolbar"
       data-show-refresh="true"
       data-show-columns="true"
       >

    <thead>
        <tr>
            <th data-field="title">Nama Pemesan</th>
            <th data-field="code">Kode Tagihan</th>
            <th data-field="price">Total Tagihan</th>
            <th data-field="date">Tanggal</th>
        </tr>
    </thead>
</table>
  </div>
</div>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>




<script type="text/javascript">
  
$(document).on('click', '#penal', function(){

  var id = $(this).attr('idaksesoris');

  $('#jqContent').slideDown('400');
  $('#jqContent').load(bu+'admin/invoice/invoice_penalty/'+id);

});

</script>
