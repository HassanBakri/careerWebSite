<?php
include_once(__DIR__ .'\myLogin.php');
class mySession extends myLogin {
private static $classObj = NULL;
protected function __construct(){
if(!isset($_SESSION)) SESSION_START();
parent::__construct();
}
public static function getObj(){
if(!self::$classObj)
self::$classObj = new self();
return self::$classObj;
}
public function sLogin($user,$pass){
if($this->login($user,$pass)){
$_SESSION['username'] = $user;
$_SESSION['password'] = $pass;
return true;
}else return false;
}
public function sLogout(){
if(isset($_SESSION['username']) and isset($_SESSION['password']))
unset($_SESSION['username'],$_SESSION['password']);
}
public function checkSLogin(){//دالة إختبار البيانات الموجودة  فى الجلسة //
if(isset($_SESSION['username']) and isset($_SESSION['password'])){
if($this->login($_SESSION['username'],$_SESSION['password']) and isset($_SESSION['seeker'])){
return true;}
else
return false;
}else return false;
}
} // end mySession class
?>
