<?php 
include_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id		 =$_SESSION['Sid'];
$name    =$_POST['uname1'];
$barth   =$_POST['bdate'];
$gender  =$_POST['sex'];
$natio   =$_POST['countries'];
$address =$_POST['address'];
$uni     =$_POST['unive'];
$col	 =$_POST['colg'];
$spc	 =$_POST['spcf'];
$comp	 =$_POST['comp'];
$phone	 =$_POST['mobno1'];
$phone2	 =$_POST['mobnox1'];
$deg	 =$_POST['degX1'];
$email   =$_POST['em1'];
$pass	 =$_POST['pass'];
$date	 =$_POST['mdate'];
$lan	 =$_POST['lang'];
$query="UPDATE `seekerlogin` SET `user_email`='$email',`password`='$pass' WHERE `user_id`='$id'";
mysqli_query($obj->getConObj(),"SET NAMES 'utf8'");
$res=$obj->makeQuery($query);
$x;
for($i=0;isset($_POST['wp'.$i]) and $i!=10;$i++){
$wp=$_POST['wp'.$i];
$du=$_POST['du'.$i];
$pos=$_POST['pos'.$i];
if( isset($_SESSION['experience_id'.$i])==1){echo "edit";
$exp_id=$_SESSION['experience_id'.$i];
unset($_SESSION['experience_id'.$i]);
$query3 ="UPDATE `experience` SET `work_place`='$wp',`du`='$du',`position`='$pos' WHERE experience_id='$exp_id'";
$res=$obj->makeQuery($query3) ;
$x=$i;}
else{echo "insert";
$qu="INSERT INTO experience (s_id,work_place,du,position)values('$id','$wp','$du','$pos')";
$res=$obj->makeQuery($qu);
}
}

$query2="UPDATE `seekers` SET `name`='$name',`birthdate`='$barth',`gender`='$gender',`nationality`='$natio',`address`='$address',
`university`='$uni',`collage`='$col',`spc`='$spc',`date`='$date',`Language`='$lan',`computer`='$comp',`phone2`='$phone2',
`phone`='$phone',`degree`='$deg' WHERE `id`='$id'";
$res1=$obj->makeQuery($query2);
/*for($i=$x+1;(isset($_POST['wp'.$i]) );$i++)
{echo $i;
$wp=$_POST['wp'.$i];
$du=$_POST['du'.$i];
$pos=$_POST['pos'.$i];
#echo '<script>alert("err");</script>' ;
$qu="INSERT INTO experience (s_id,work_place,du,position)values('$id','$wp','$du','$pos')";
$res=$obj->makeQuery($qu);}*/
 header('Location: http://localhost/account.php');
?>