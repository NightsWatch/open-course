  function validateUploadForm(){

  var form = document.login-form;
  var valid= true;
  if(form.username.value == ''){
    $('#usererror').html("Enter your username");
    valid=false;
  }
  if(form.password.value == ''){
    $('#passerror').html("Enter your password");
    valid=false;
  } 

  return valid;
}