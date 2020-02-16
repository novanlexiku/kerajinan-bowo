<div class="card">
  <div class="card-body">
	<h4>Bank Setting</h4>
	<br>
	
<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/setting/bank_setting_data"
       data-pagination="true"
       data-side-pagination="server"
       data-page-list="[5, 10, 20, 50, 100, 200]"
       data-search="true"

       data-toolbar="#toolbar"
       data-show-columns="true"
       >
<div id="toolbar">
<button class="btn btn-default cnw"><i class="material-icons">add_box</i> Tambah Bank</button>
</div>

    <thead>
        <tr>
            <th data-field="title">Nama Bank</th>
            <th data-field="desc">No. Rekening</th>
            <th data-field="date">Tanggal</th>
            <th data-field="action">Aksi</th>
        </tr>
    </thead>
</table>
  </div>
</div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>



<script type="text/javascript">

$(document).on('click', '#edit', function(){

  var id = $(this).attr('idcontent');

  $('#jqContent').load(bu+'admin/setting/bank_edit/'+id);
  $('#jqContent').slideDown('400');


});

$(document).on('click', '#delete', function(){

  var id = $(this).attr('idcontent');
  var c = confirm('Apa anda yakin ingin menghapus data ini ?');

  if(c == true)
  {
    $.get(bu+'admin/setting/bank_delete/'+id, function(data){
        alert(data);
        window.location.href=window.location.href;
    });
  }

});

</script>
