<?php
class mySQL {
private $DB = array();
private static $classObj = NULL;
private static $objCon = NULL;
protected function __construct(){
$this->DB['Host'] = "localhost";
$this->DB['UserName'] = "root";
$this->DB['UserPass'] = "root";
$this->DB['Name'] = "careerdb";
}
final private function __clone() {}
public static function getObj(){
if(!self::$classObj)
self::$classObj = new self();
return self::$classObj;
}
public function getConObj(){
if(!self::$objCon){
self::$objCon = new mysqli($this->DB['Host'],$this->DB['UserName'],$this->DB['UserPass'],$this->DB['Name']);
if(self::$objCon->connect_error)
die(self::$objCon->connect_error);
}
return self::$objCon;
}
public function makeQuery($qu){
mysqli_query($this->getConObj(),"SET NAMES 'utf8'");
$temp=mysqli_query($this->getConObj(),$qu);
//$temp = $this->getConObj()->query($qu);
if(!$temp)
die($this->getConObj()->error);
return $temp;
}
}
?>