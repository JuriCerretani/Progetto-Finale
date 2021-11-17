<?php

require "connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE `email` = '$email'";

if($_SERVER["REQUEST_METHOD"]=== "POST"){
  if($result = $conn->query($query)){
    if($result->num_rows == 1){
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if (password_verify($password , $row['password'])) {
        session_start();

        // Varibili di sessione
        $_SESSION['logged'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['nickname'] = $row['nickname'];
        $_SESSION['email'] = $row['email'];

        header("location: ../views/wallet.php");

      } else {
        $msg = 'La password non è corretta';
        header("location: ../views/login.html");
      }
    } else{
      $msg = "L'email che hai inserito non è ancora registrata";
      echo "L'email che hai inserito non è ancora registrata";
    }
  }
}
