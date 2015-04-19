<?php
require_once('mySQL.php');
$obj=mySQL::getObj();
if(isset($_POST['username']) && !empty($_POST['username'])){
     $username=$_POST['username'];
      $query="select * from users where user_email='$username'";
      $res=$obj->makeQuery($query);
      $count=$res->num_rows;
      $HTML='';
      if($count == 1){
        $HTML='1';
      }else{
        $HTML='0';
      }
      echo $HTML;
}
?>