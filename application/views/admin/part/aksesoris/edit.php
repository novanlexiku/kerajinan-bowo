<div class="card">
  <div class="card-body">
	<?php foreach($aksesoris_data as $bd){}?>

<div class="close-jqContent">
<i class="material-icons">clear</i>
</div>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Edit Aksesoris</label>

<form id="editForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="idaksesoris" type="hidden" name="idaksesoris" value="<?php echo $bd->id_acc;?>">
    <input id="aksesoris" type="text" class="form-control" name="aksesoris" value="<?php echo $bd->name_acc;?>" placeholder="Nama Aksesoris" required="">
  </div>
  <br>
 	<div id="texte"></div>
 	<textarea name="desc" id="desc" style="display:none;"></textarea>
  <br>
  <div id="textf"></div>
  <textarea name="info" id="info" style="display:none;"></textarea>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="price" type="number" class="form-control" name="price" value="<?php echo $bd->price_acc;?>" placeholder="Harga" required="">
  </div>
  <br>

  <br>
  	<label for="imgn" class="btn btn-success" style="display: block; width: 100%;">Gambar Aksesoris</label>
    <input id="imgn" type="file" name="img" class="file form-control" style="margin-left: 2000px; position: fixed;">
  <br>

  <div class="left">
  </div>


  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Aksesoris</button>
</form>


</div>  </div>
</div>
<style type="text/css">

.gs-ipt-wrapper
{
    width: 40%;
    margin: auto;
    margin-top: 3%;
    margin-bottom: 20px;
}

</style>



<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/aksesoris_save.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {
  $('#texte').summernote();

  var string = '<?php echo $bd->desc_acc;?>';
  $('#texte').summernote('code', string);
});

$('.fd-content').on('click', function(){

    var checkbox = $(this).find("input[type='checkbox']");

    if( checkbox.attr("checked") == "" ){
        checkbox.attr("checked","true");
    } else {
        checkbox.attr("checked","");
    }
  $(this).toggleClass('active');

});

</script>
