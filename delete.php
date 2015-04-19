<?php
include_once('mySQL.php');
//include_once('inc/dbConnect.inc.php');
$obj=mySQL::getObj();

$id=$_POST['id'];
$query="delete from advertice  where  ad_id='$id'";
$data=mysqli_query($obj->getConObj(),$query);
if($data > 0)
    echo "success";
else{
    echo "Please after some time";
}
?>