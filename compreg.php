<?php 
include_once('mySQL.php');
$obj=mySQL::getObj();
$companyname=$_POST['cname1'];
$phone1 =	$_POST['mobno1'];
#$phone2 =	$_POST['mobnoa1'];
$email  =		$_POST['email1'];
$spc    =		$_POST['spc'];
$addr   =		$_POST['add'];
$pass   =		$_POST['pass'];
$query="insert into users(user_email,user_pass) values ('$email','$pass')";
$res=$obj->makeQuery($query);
$query1="insert into company(address,company_name,email,phone,specification) values ('$addr','$companyname','$email','$phone1','$spc')";
$res=$obj->makeQuery($query1);
//include_once('home.php');
header('Location: http://localhost/home.php');
?>
