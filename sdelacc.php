<?php
require_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id = $_SESSION['Sid'];
#$query="delete from seekerlogin where user_id='$id'";
$query="DELETE FROM `careerdb`.`seekerlogin` WHERE `seekerlogin`.`user_id` ='$id'";
$res=$obj->makeQuery($query);#echo "<script>alert('Deleting');</script>";
$obj->getConObj()->query($query);
session_destroy();
//include_once('home.php');
header('Location: http://localhost/home.php');
?>