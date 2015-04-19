<?php
include_once(__DIR__ .'\userLogin.php');
//include_once('company.php');
//include_once('company.php');
class userSession extends userLogin {
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
public function checkSLogin(){
if(isset($_SESSION['username']) and isset($_SESSION['password'])){
if($this->login($_SESSION['username'],$_SESSION['password']) and isset($_SESSION['company'])){
return true;}
else
return false;
}else return false;
}
function getData()
{
$id=$_SESSION['id'];
$Tquery = " SELECT * FROM company WHERE company_id='$id'";
//$Tquery1 = " SELECT * FROM users WHERE id='$id'";
$a = array();
if($temp = $this->makeQuery($Tquery)->num_rows == 1){
$data=mysqli_query($this->getConObj(),$Tquery);
if($row =mysqli_fetch_array($data))
{
array_push($a,$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
}
return $a;
//$data1=mysqli_query($this->getConObj(),$Tquery);
//$row1 =mysqli_fetch_array($data1);
}}
} // end mySession class
$obj = userSession::getObj();
if(isset($_POST['username'])and isset($_POST['password'])){
$user=$_POST['username'];
$pass=$_POST['password'];}
else{$user=null;$pass=null;}
$login=$obj->slogin( $user,$pass);
if($login){
			setcookie('username', $user, time() + 60 * 60 * 24);
			setcookie('password', $pass, time() + 60 * 60 * 24);
			$_SESSION['company']="true";
	header('Location: http://localhost/company.php');	
	}

?>