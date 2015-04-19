<?php
require_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id=$_POST['id'];
$query="DELETE FROM `experience` WHERE `experience_id`='$id'";
$res1=$obj->makeQuery($query);
if($res1 != 0){
	unset($_SESSION['experience_id'.$id]);
 echo "success";}
else{
    echo "err";
}
?>