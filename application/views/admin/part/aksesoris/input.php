<div class="card">
  <div class="card-body">
	<div class="close-jqContent">
	<i class="material-icons">clear</i>
</div>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Input Aksesoris</label>

<form id="inputForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="aksesoris" type="text" class="form-control" name="aksesoris" placeholder="Nama Aksesoris" required="">
  </div>
  <br>
 	<div id="texte"></div>
 	<textarea name="desc" id="desc" style="display:none;"></textarea>
  <br>
  <div id="textf"></div>
  <textarea name="info" id="info" style="display:none;"></textarea>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="price" type="number" class="form-control" name="price" placeholder="Harga" required="">
  </div>
  <br>

  
  	<label for="imgn" class="btn btn-success" style="display: block; width: 100%;">Gambar Aksesoris</label>
    <input id="imgn" type="file" name="img" class="file form-control" required="" style="margin-left: 2000px; position: fixed;">
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

  var string = 'Deskripsi Aksesoris . . .';
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
