<?php
include_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
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

$query1 = "INSERT INTO seekerlogin(user_email,password) VALUES ('$email', '$pass')";
mysqli_query($obj->getConObj(),"SET NAMES 'utf8'");
$res=$obj->makeQuery($query1);
$data=mysqli_query($obj->getConObj(),"SELECT * FROM seekerlogin WHERE user_email='$email'AND password='$pass'");
$arr=mysqli_fetch_array($data);
$_SESSION['Sid']=$arr[0];
for($i=0;isset($_POST['wp'.$i]);$i++){
$wp=$_POST['wp'.$i];
$du=$_POST['du'.$i];
$pos=$_POST['pos'.$i];
$query3 ="INSERT INTO experience (s_id,work_place,du,position)values('$arr[0]','$wp','$du','$pos')";
$res=$obj->makeQuery($query3);
 }
$query2  ="INSERT INTO seekers
		(name,birthdate,gender,nationality,address,university,collage,spc,date,Language,computer,phone,phone2,degree)
VALUES ('$name','$barth', '$gender', '$natio', '$address','$uni','$col','$spc','$date','$lan','$comp','$phone','$phone2','$deg')";
$res=$obj->makeQuery($query2);
$_SESSION['username']=$email;
$_SESSION['password']=$pass;
$_SESSION['seeker']="true";
 header('Location: http://localhost/account.php');
 ?>