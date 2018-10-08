
<?php 

$pass="password1";
$pass_encrypt=password_hash($pass, PASSWORD_DEFAULT);
echo $pass_encrypt;
