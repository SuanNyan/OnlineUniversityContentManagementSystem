<?php 
 function checkandHash($checkpassword){


return password_hash($checkpassword, PASSWORD_DEFAULT);

}
function verifypassword($password, $hashed_password){

if(password_verify($password, $hashed_password)) {
  return true;
} 
return false;

}
 ?>
