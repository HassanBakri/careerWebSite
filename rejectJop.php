<?php
require_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id=$_POST['id'];
$query="UPDATE `applications` SET `state`='Rejected',`date`='Rejected',`int_addres`='Rejected' WHERE app_id='$id'";
$res1=$obj->makeQuery($query);
if($res1 == 1){
 echo "ok";}
else{
    echo "err";
}
?>