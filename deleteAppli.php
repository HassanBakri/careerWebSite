<?php
require_once('mySQL.php');
$obj=mySQL::getObj();
$id=$_POST['id'];
$query="delete from applications where  app_id='$id'";
$res=$obj->makeQuery($query);
if($res > 0)
    echo "success";
else{
    echo "Please after some time";
}
?>