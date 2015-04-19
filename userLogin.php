<?php
SESSION_START();
include_once(__DIR__ .'\mySQL.php');
class userLogin extends mySQL{
private static $classObj = NULL;
protected function __construct(){
parent::__construct();
}
public static function getObj(){
if(!self::$classObj)
self::$classObj = new self();
return self::$classObj;
}
public function login($user,$pass){
if($user==NULL or $pass==NULL){
return false;
}else{
$Tquery = " SELECT * FROM users WHERE user_email='$user'AND user_pass='$pass'";
if($temp = $this->makeQuery($Tquery)->num_rows == 1){
$data=mysqli_query($this->getConObj(),$Tquery);
$arr=mysqli_fetch_array($data);
$_SESSION['id']=$arr[0];
return true;
}
else
return false;
}
}
}
?>