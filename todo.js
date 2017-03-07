$(document).ready( function() {

 $("input:checkbox").change(function() {
    if($(this).is(":checked")) {
      $.ajax({
        url: 'addDone.php',
        type: 'GET',
        data: { ID: $(this).attr("id"), state:"1"}
      });
    } else {
      $.ajax({
        url: 'addDone.php',
        type: 'GET',
        data: { ID: $(this).attr("id"), state:"0"}
      });
    }

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

});
