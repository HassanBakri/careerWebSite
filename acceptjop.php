<?php
require_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id=$_GET['id'];
$date=$_GET['date'];
$add=$_GET['add'];
$date.="   ".$_GET['hur'].":".$_GET['mnt'];
$query="UPDATE `applications` SET`state`='Sucsess',`date`='$date' ,`int_addres`='$add'  WHERE `app_id`='$id'";
$res=$obj->makeQuery($query);
if($res==1){echo $res;}
?>