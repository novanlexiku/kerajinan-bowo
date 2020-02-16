$(document).on('click', '#edit', function(){

  var id = $(this).attr('idcontent');

  $.get(bu+'admin/aksesoris/aksesoris_delete/'+id, function(data){
    alert(data);
  });

});
