<?php 
SESSION_START();
$id = $_SESSION['id'];
include_once('mySQL.php');
$obj=mySQL::getObj();
$companyname=$_POST['cname1'];
$phone1 =	$_POST['mobno1'];
#$phone2 =	$_POST['mobnoa1'];
$email  =		$_POST['email1'];
$spc    =		$_POST['spc'];
$addr   =		$_POST['add'];
$pass   =		$_POST['pass'];
$query="update users set user_email='$email',user_pass='$pass'where id='$id'";
$res=$obj->makeQuery($query);
$query1="update company set address='$addr',company_name='$companyname',email='$email',phone='$phone1',specification='$spc' where company_id='$id'";
$res=$obj->makeQuery($query1);
//include_once('company.php');
header('Location: http://localhost/company.php');
?>
