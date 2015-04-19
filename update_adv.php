<?php
include_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id   =$_POST['id'];
$name     =$_POST['name'];
$age	  =$_POST['age'];
$cat	  =$_POST['cat'];
$edu	  =$_POST['edu'];
$deg 	  =$_POST['deg'];
$exp 	  =$_POST['exp'];
$salary	  =$_POST['sal'];
$spc	  =$_POST['spc'];
$q="UPDATE `advertice` SET `jop_name`='$name' ,`age`='$age',`Category`='$cat',`education`='$edu',`degree`='$deg',`experince`='$exp',`salary`='$salary',`specification`='$spc' where `ad_id`='$id'";
$res=$obj->makeQuery($q);
if($res ==1)
    echo "success";
else{
    echo "Please after some time";
}
?>
