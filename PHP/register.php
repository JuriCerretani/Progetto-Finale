<?php

require "connection.php";

$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = $_POST['password'];
$crypted_password = password_hash($password , PASSWORD_DEFAULT);

$query = "INSERT INTO users (`nickname`,`email`,`password`) VALUES ('$nickname' , '$email' , '$crypted_password')";

//Query che controlla se l'utente gia esiste
$sql = "SELECT * FROM users WHERE `email` = '$email'";

if($_SERVER["REQUEST_METHOD"]=== "POST"){
  if ($result = $conn->query($sql)) {
    if($result->num_rows < 1){
      $conn->query($query);
      header('location: ../views/login.html');
    } else {
      $msg = "L'Email cha hai inserito è già registrata";
      echo $msg;
    }
  }
}

?>
