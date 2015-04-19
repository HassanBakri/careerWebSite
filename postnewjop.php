<?php
include_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();

$compid   =$_SESSION['id'];
$name     =$_POST['name'];
$age	  =$_POST['age'];
$cat	  =$_POST['cat'];
$edu	  =$_POST['edu'];
$deg 	  =$_POST['degree'];
$exp 	  =$_POST['exp'];
$salary	  =$_POST['Salary'];
$spc	  =$_POST['spc'];


$query="INSERT INTO advertice(comp_id,jop_name,age,Category,education,degree,experince,salary,specification)
					VALUES   ('$compid','$name','$age','$cat','$edu','$deg','$exp','$salary','$spc')";
$res=$obj->makeQuery($query);
header('Location: http://localhost/company.php');
?>