<?php

require "connection.php";

$id = $_GET['id'];

$query = "DELETE FROM assets WHERE `id` = '$id'";

$conn->query($query);
header('location: ../views/wallet.php');


?>
