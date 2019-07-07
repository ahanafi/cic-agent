<?php
$hostname = "localhost";
$username = "root";
$password = "password";
$database = "db_cic_agent";

$link = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_connect_error($link));

?>