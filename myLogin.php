<?php
include_once(__DIR__ .'\mySQL.php');
class myLogin extends mySQL{
private static $classObj = NULL;
protected function __construct(){
parent::__construct();
}
public static function getObj(){
if(!self::$classObj)
self::$classObj = new self();
return self::$classObj;
}
//دالة تسجيل الدخول //
public function login($user,$pass){
if($user==NULL or $pass==NULL){
return false;
}else{
//هذا كود الفلترة  لسم المستخدم وكلمة المرور يمكنك ضابطه كما تريد بإستخدام التعابير القياسية//
/*$user = preg_replace('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/','',$user);
$pass = preg_replace('/^([a-zA-Z0-9ْا-ي])+$/','',$pass);*/
$Tquery = " SELECT * FROM seekerlogin WHERE user_email='$user'AND password='$pass'";
$data=$this->makeQuery($Tquery);
if($temp = $data->num_rows == 1){
$arr=mysqli_fetch_array($data);
$_SESSION['Sid']=$arr[0];
//echo "<script>alert('$d');</script>";
return true;}
else{
$_SESSION['msg']='Wrong Email/Password Combination ';
return false;
}
}
}
}
?>