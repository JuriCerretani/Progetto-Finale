<?php
require "connection.php";

session_start();

$query = "DELETE FROM users WHERE `id` = $_SESSION[id]";

$conn->query($query);
header('location: logout.php');


?>
