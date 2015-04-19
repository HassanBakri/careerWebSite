<?php
require_once('mySession.php');
SESSION_START();
$obj = mySession::getObj();
if(isset($_POST['username'])and isset($_POST['password'])){
$user=$_POST['username'];
$pass=$_POST['password'];}
else{$user=null;
$pass=null;}
$login=$obj->slogin( $user,$pass);
if($login){
			setcookie('username', $user, time() + 60 * 60 * 24);
			setcookie('password', $pass, time() + 60 * 60 * 24);
			$_SESSION['seeker']=true;
header('Location: http://localhost/account.php');			}

else header('Location: http://localhost/home.php');;
?>