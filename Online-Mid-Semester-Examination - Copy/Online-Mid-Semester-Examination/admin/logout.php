<?php

error_reporting(0);
session_start();
include_once 'oesdb.php';

session_destroy();
$_GLOBALS['message']="You are Loggged Out Successfully.";
header('location:login.php');

exit;
?>