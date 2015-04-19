<?php 
include_once('mySession.php');
include_once('userSession.php');
session_destroy();
echo "<script>localStorage.setItem('isCompany','false');localStorage.clear();</script>";
//include_once('home.php');
header('Location: http://localhost/home.php');
?>