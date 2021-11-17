<?php

$config = require '../config.php';

$host = $config['database']['host'];
$db_name = $config['database']['db_name'];
$username = $config['database']['username'];
$password = $config['database']['password'];

$conn = new mysqli($host , $username , $password , $db_name);


?>
