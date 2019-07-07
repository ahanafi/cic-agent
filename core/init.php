<?php
session_start();
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
ob_start();

require_once 'session.php';
require_once 'other.php';
require_once 'connect.php';
require_once 'crud.php';
require_once 'method.php';
require_once 'auth.php';
$no = 1;
?>