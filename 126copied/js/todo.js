$(document).ready( function() {

 $("input:checkbox").change(function() {
    if($(this).is(":checked")) {
      alert("done");
      var id = $(this).attr('id');
      alert(id);
      $.ajax({
        type:'POST',
        url: 'addDone.php',
        data:{Value: id},
      });
    $(this).parent().remove();
  }
});
});



/*  $("input[type=checkbox]").on('click', function() {
    var done = $(this).attr('checked');
    var id = $done.attr('id');
    $.ajax({
      type: 'get',
      url: 'addDone.php';
      data: {ID: id }
      success: function(){
        $("#id~tr").remove();
      }
    });

    if(done) {
      var value = $(this).val();
      $.post('addDone.php', { value: value }, function(data){
        if(data == 1 {
          alert($id)
          alert('data was saved in db');
        }
        })
      }
    } */
