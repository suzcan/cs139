$(document).ready( function() {

  $("#email_error").hide();
  $("#username_error").hide();
  $("#pass_error").hide();
  $("#passconf_error").hide();
  $("#submit_error").hide();

  var u_error = false;
  var e_error = false;
  var p_error = false;
  var pc_error = false;

  $("#Email").focusout( function(){
    email_test();
  });

  $("#Username").focusout( function(){
    user_test();
  });

  $("#Password").focusout( function(){
    pass_test();
  });

  $("#PasswordConf").focusout( function(){
    passconf_test();
  });

  function email_test() {
    var email_length = $("#Email").val().length;

    if(email_length < 5) {
      $("#email_error").html("Please provide a valid email");
      $("#email_error").show();
      e_error = true;
    } else {
      $("#email_error").hide();
    }
  }

  function user_test() {
    var user_length = $("#Username").val().length;

    if(user_length < 5 || user_length > 20) {
      $("#username_error").html("Please provide a username");
      $("#username_error").show();
      u_error = true;
    } else {
      $("#username_error").hide();
    }
  }

  function pass_test(){
    var password_length = $("#Password").val().length;

    if (password_length < 8) {
      $("#pass_error").html("At least 8 characters long");
      $("#pass_error").show();
      p_error = true;
    } else {
      $("#pass_error").hide();
    }
  }

  function passconf_test(){
    var password = $("#Password").val();
    var passconf = $("#PasswordConf").val();

    if (password != passconf) {
      $("#passconf_error").html("Passwords do not match");
      $("#passconf_error").show();
      pc_error = true;
    } else {
      $("#passconf_error").hide();
    }
  }

  $("#regForm").submit( function() {
    u_error = false;
    e_error = false;
    p_error = false;
    pc_error = false;

    email_test();
    user_test();
    pass_test();
    passconf_test();

    if(e_error == false && u_error == false && p_error == false && pc_error == false){
      return true;
    } else {
      $("#submit_error").html("There is still an error in one of the fields");
      $("#submit_error").show();
      return false;
    }
  });

});
