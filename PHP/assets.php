<?php

session_start();

$email = $_SESSION['email'];

$query = "SELECT * FROM assets WHERE `email` = '$email'";

$result = $conn->query($query);

?>
