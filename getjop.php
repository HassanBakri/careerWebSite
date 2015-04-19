<?php
require_once('mySQL.php');
$obj=mySQL::getObj();
$id=$_POST['id'];
$query="select * from advertice where  ad_id='$id'";
$res1=$obj->makeQuery($query);
	$res = mysqli_fetch_assoc($res1);
	$result=implode(',', $res);
if($res > 0)
 echo $result;
else{
    echo "err";
}
?>