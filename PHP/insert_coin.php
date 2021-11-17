<?php

require 'connection.php';
require 'coinmarketcap_api.php';

session_start();

$crypto_name = $_POST['crypto_name'];
$usd = $_POST['usd'];
$email = $_SESSION['email'];

foreach ($data as $arr) {
  if ($crypto_name == $arr->name) {
    $symbol = $arr->symbol;
  }
}

if( !isset($_POST['value']) ){
  $price = $_POST['price'];
  $value = round($usd / $price, 6);
  $query="INSERT INTO assets (`email`,`crypto_name`,`symbol`,`usd`,`price`,`value`) VALUES ('$email' , '$crypto_name' , '$symbol' , '$usd' , '$price' , '$value')";
} elseif ( !isset($_POST['price']) ) {
  $value = $_POST['value'];
  $price = round($usd / $value, 2);
  $query="INSERT INTO assets (`email`,`crypto_name`,`symbol`,`usd`,`price`,`value`) VALUES ('$email' , '$crypto_name' , '$symbol' , '$usd' , '$price' , '$value')";
}



$query="INSERT INTO assets (`email`,`crypto_name`,`symbol`,`usd`,`price`,`value`) VALUES ('$email' , '$crypto_name' , '$symbol' , '$usd' , '$price' , '$value')";

if($_SERVER["REQUEST_METHOD"]=== "POST"){
  $conn->query($query);
  header('location: ../views/wallet.php');
}


?>
