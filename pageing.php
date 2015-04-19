<?php
SESSION_START();
require_once('advertic.php');
$obj =new advertic;
$page=$_POST['page'];
echo $obj->getTabel($page);

?>