<?php
include_once('mySQL.php');
SESSION_START();
$id = $_SESSION['id'];
$obj=mySQL::getObj();
$query="delete from users where id='$id'";
$res=$obj->makeQuery($query);
session_destroy();
//include_once('home.php');
header('Location: http://localhost/home.php');
?>