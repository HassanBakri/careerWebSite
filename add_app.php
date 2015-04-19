<?php
require_once('mySQL.php');
$obj=mySQL::getObj();
$Sid=$_GET['s_id'];
$cid=$_GET['c_id'];
$jid=$_GET['j_id'];//echo $Sid,$cid,$jid;
$query="INSERT INTO `applications`(`seeker_id`, `comp_id`, `jop_id`) VALUES ('$Sid','$cid','$jid')";
$res1=$obj->makeQuery($query);
if($res1 == 1)
 echo "success";
else{
    echo "Please after some time";
}
?>