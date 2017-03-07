$(function() {
  $("form[name='regForm']").validate({
    rules: {
      Email: {
	required: true,
	email: true
      },
      Username: "required",
      Password: "required",
      PasswordConf: "required"
    },
    messages: {
      Email: "Not a valid email address", 
      Password: "Please provide a password",
      Username: "Please provide a usernamd",
      PasswordConf: "Please rewrite your password"
    }, 
    
    submitHandler: function(form) {
      form.submit();
      
    }
      
    
  });
  
});
