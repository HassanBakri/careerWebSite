<?php
require_once('mySession.php');
$ss=mySession::getObj();
$_SESSION['Sid']=0;
$live=$ss->checkSLogin();
#$err=isset($_SESSION['err'])?true:false;
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
	<link rel="stylesheet" type="text/css" href="css/msdropdown/flags.css" />
	<link rel="stylesheet" type="text/css" href="1/js-image-slider.css" />
	<link rel="stylesheet" type="text/css"  href="register.css" />
	<link rel="stylesheet" type="text/css" href="button.css"/>
	<script src="jquery-1.8.2.min.js"></script ><!-- https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js -->
    <script src="1/js-image-slider.js" type="text/javascript"></script>
	<script src="form.js" type="text/javascript"></script>
	<script src="js/msdropdown/jquery.dd.min.js"></script>
	<script>
		$(document).ready(function() {
		$("#countries").msDropdown();
		});
		var userId=<?php echo $_SESSION['Sid'];?>;
		var jopData;
function getprev(id){var curr = $("#adv_"+id );curr = curr.prev();return curr.attr('id').replace(/adv_/,'');}
function getnext(id){var $curr = $("#adv_"+id );$curr= $curr.next();return $curr.attr('id').replace(/adv_/,'');}
function applyads(id)
{	
x=localStorage.getItem("leggedin")=="true"?true:false;
if(x){
document.getElementById('fade').style.display='block';
document.getElementById('light').style.cssText="width:500px;height:320px;left:25%;top:25%;display:block;";document.getElementById('light').innerHTML="";
var dataString ='id='+id;
 $.ajax({
	  type: "POST",
	  url: "getjop.php",
	  data: dataString,
	  cache: false,
	 
	  success: function(result){
		   if(result){
			if(result=='err'){
			document.getElementById('light').innerHTML+="Please Try Agin ";
			document.getElementById('light').innerHTML+='<Button id="logb"  class="form-submit-button-light" onclick="hideshow();">Close</Button>';

			}else{
					//
			jopData=result.split(",");
			document.getElementById('light').innerHTML+='<div id="detais"><br>Jop Title&nbsp:'+jopData[2];
			document.getElementById('light').innerHTML+='<br>Age&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:'+jopData[3];
			document.getElementById('light').innerHTML+='<br>Education&nbsp:'+jopData[5];
			document.getElementById('light').innerHTML+='<br>Degree&nbsp&nbsp&nbsp&nbsp:'+jopData[6];
			document.getElementById('light').innerHTML+='<br>Experince&nbsp:'+jopData[7];
			document.getElementById('light').innerHTML+='<br>Salary&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:'+jopData[8];
			document.getElementById('light').innerHTML+='<br>Specification&nbsp&nbsp:'+jopData[9];
			document.getElementById('light').innerHTML+='</div>';
			document.getElementById('light').innerHTML+='<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
			document.getElementById('light').innerHTML+='<Button id="logb"  class="form-submit-button-light" onclick="applyads(getprev('+id+'));"  > Prev</Button>';
			document.getElementById('light').innerHTML+='<Button id="apply"  class="form-submit-button-light" onclick="apply();" > Apply</Button>';
			document.getElementById('light').innerHTML+='<Button id="logb"  class="form-submit-button-light"  onclick="applyads(getnext('+id+'));"> Next</Button>';
			document.getElementById('light').innerHTML+='<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
			document.getElementById('light').innerHTML+='<Button id="logb"  class="form-submit-button-light" onclick="hideshow();">Close</Button>';

			}}}
			  });
		// Sid	0ad_id   1comp_id   2jop_name   3age   !Category   5education   6degree   7experince   8salary   9specification


}
else{
document.getElementById('fade').style.cssText='display:block;z-index:2;';
document.getElementById('popul').style.cssText='display:block;z-index:1002;';
setTimeout(function(){document.getElementById('fade').style.cssText='display:none;';},1000);
}
}
function apply(){
//app_id   comp_id    date    jop_id      seeker_id   state   
//auto     jopData[1] auto    jopData[0]  userId      auto
//alert("err");
var dataString ='c_id='+jopData[1]+'&j_id='+jopData[0]+'&s_id='+userId;
 $.ajax({
	  type: "GET",
	  url: "add_app.php",
	  data: dataString,
	  cache: false,
	 
	  success: function(result){
	  if(result=='success')
	  notfy();
	  else {document.getElementById('light').innerHTML+=result;}
	  }});
}
function checkava(username,type,idn){
  $('#flash').fadeIn(400).html('<img src="loading.gif"/> ');
  var dataString = 'username='+username;
  var url=(type=='c')?"checkcomp.php":"check.php";
  var returnval;
  $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          cache: false,
          success: function(result){
               if(result=='0'){
						$('.flash').fadeIn(400).html('<img height="25" width="25" src="accept.png"/> ');
                       returnval= true;
               }else{
                      $("#"+idn+'.flash').fadeIn(400).html('');
					  alert("The Email You Enterd Already Uesed");
					  $("#"+idn).val("");
					  returnval= false;
               }
          }
      });
	  return returnval;
}
	</script>
	</head>
	<body onload="viewads();companychecklogin();"><script>	<?php echo ($live)?'localStorage.setItem("leggedin","true");localStorage.setItem("isCompany","false")':'localStorage.setItem("leggedin","false");';?></script>
		<div id="light" class="white_content">Wrong User Name /Password <br>the Syntax should contain chracters and digits and @  . </div>
		<div id="fade" class="black_overlay"></div>
		<div id="sliderFrame">
        <div id="slider">
            <img src="images/l1.png" alt="" />
            <img src="images/l2.png" alt="" />
            <img src="images/l3.png" alt="" />
        </div>
        </div>
		<div >
			<ul  id="menu" >
				<li id="home"   ><a href="home.php" >Home</a></li>
				<li id="regmng1"><a <?php echo $live ? 'href="account.php"':'href="#" onclick="viewr();"';?>> <?php  echo $live? 'Account' :'Register' ;?></a></li>
				<li id="comsrv" ><a href="#" onclick="viewcom();">Companies Service</a></li>
				<li id="logina1"><a <?php  echo $live? 'href="logout.php" onclick="localStorage.setItem("leggedin")="false";"' :'href=""' ;?>><?php  echo $live? 'Logout' :'Login' ;?></a>	
				<ul id="popul" <?php echo $live?'style="visibility:hidden;"':'""';?>>
				<form  method="POST" name="loginform1" id="log1" action="login.php" onsubmit=" return validate();" >
				<?php  echo isset($_SESSION['msg'])?"<span id='err'>".$_SESSION['msg']."</span><br/>":"" ;?>
				Email<br>
				<input name="username" id="username"type="text"  value="" placeholder="E-mail" required="required"/><br>
				Password<br>
				<input name="password" id="password" type="password" placeholder="Password" value="" required="required"  /><br/>
				<button id="logb"  class="form-submit-button form-submit-button-light"  > login    </button><?php # echo $err? '<a href="/lost_password.php" class="lost">Forget Password</span>' :'' ;?>
				</form>
				</ul>
				</li>
			</ul>
		</div>
		<div class="leftcol">
			<div id="leftcol1">
			<ul><!-- //ENG  MED EDU    IND  ART   DI   Mgmnt-->
			<li><a href="#ENG" onclick="" title="Engineering"><img class="icon" src="cat1.png" height="30" width="30" alt="Engineering"/>Engineering</a></li>
			<li><a href="#MED" onclick=""><img class="icon" src="cat2.png" height="30" width="30" />Medical</a></li>
			<li><a href="#EDU" onclick=""><img class="icon" src="cat3.png" height="30" width="30" />Educational</a></li>
			<li><a href="#IND" onclick=""><img class="icon" src="cat4.png" height="30" width="30" />Industrial</a></li>
			<li><a href="#Mgmnt" onclick=""><img class="icon" src="user74.png" height="30" width="30" />Management</a></li>
			<li><a href="#ART" onclick=""><img class="icon" src="cat5.png" height="30" width="30" />Artisan</a></li>
			<li><a href="#DI" onclick=""><img class="icon" src="cat6.png" height="30" width="30" />Diary</a></li>
			</ul>
			</div>
			<div id="leftcol2">
			<ul>
			<li id="comph"><a href="javaScript:void(0);" onclick="viewelm(true);">Login As Company </a></li>
			<li><a href="#" onclick="viewelm(false);">Register As Company</a></li>
			</ul>
			</div>
		</div>
		<div class="centerspace"  id="viewz">
		<div id="masadv">
		<!--<h1>Lastest Five Advertisements : </h1>
		<div class="adv">3 Account <br> Zain  <br>2 Years of Experince <br>Male <br><a href="#" onclick="applyads(0);">More details</a></div>
		<div class="adv">2 Engneers <br> Zain  <br>1 Years of Experince <br>Grraduate <br><a href="#" onclick="applyads(1);">More details</a></div>
		<div class="adv">1 Lab  Assesstant <br> STAC  <br>Sudaness <br>Diploma <br><a href="#" onclick="applyads(2);">More details</a></div>
		<div class="adv">8 Arabic Teacher <br> Ministory of Education  <br>Under Graduate <br>Male <br><a href="#" onclick="applyads(3);">More details</a></div>
		<div class="adv">1 Analysis <br> CCIT  <br>5 Years of Experince <br>Sudaness <br><a href="#"onclick="applyads(4);">More details</a></div>-->
		<?php
		$top5="select * FROM  `advertice` ORDER BY  `advertice`.`addtime` DESC  LIMIT 0 , 5";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		echo "<div><br><h2>The Last Five Jops</h2>";
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Education</h2>";
		//EDU  ENG  MED  ART   DI  IND   Mgmnt
		echo '<a name="EDU"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='EDU'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Engineering</h2>";
		echo '<a name="ENG"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='ENG'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Medical</h2>";
		echo '<a name="MED"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='MED'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Artisan</h2>";
		echo '<a name="ART"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='ART'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Diary</h2>";
		echo '<a name="DI"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='DI'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Industrial</h2>";
		echo '<a name="IND"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='IND'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div><div><br><h2>Management</h2>";
		echo '<a name="Mgmnt"></a>';
		$top5="SELECT * FROM `advertice` WHERE `Category`='Mgmnt'";
		mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		$top5=mysqli_query($ss->getConObj(),$top5);
		while($row = mysqli_fetch_array($top5,MYSQLI_ASSOC)){
		$comp_id=$row['comp_id'];mysqli_query($ss->getConObj(),"SET NAMES 'utf8'");
		// Sid	ad_id   comp_id   jop_name   age   !Category   education   degree   experince   salary   specification
		$cname=mysqli_fetch_array(mysqli_query($ss->getConObj(),"select company_name from company where company_id='$comp_id'"),MYSQLI_ASSOC);
		echo '<div class="adv" id="adv_'.$row['ad_id'].'">';
		echo $row['jop_name'].'<br>'.$cname['company_name'].'<br>'.$row['experince'].' 
		Years of Experience<br>'.$row['salary'].'Initial Salary<br><a href="#"onclick="applyads('.$row['ad_id'].');">More details</a></div>';
		//$_SESSION['Sid']','$row['ad_id']','$row['comp_id']','$row['jop_name']','$row['age']','$row['education']','$row['degree']','$row['experince']','$row['salary']','$row['specification']'
		}
		echo "</div>";
		?>
		</div>
		<div id="rform">
			<h1 id="pls">Please Fill Out  The Fourm in Order to Rigester</h1>
			<ul>
			<li>
			<form  method="post" name="seekerform" id="log1" onsubmit="return validatess();"action="Registerseeker.php">
			<fieldset>
			
			<div class="block">
			<fieldset><legend class="cap">Basic Information</legend>
				<div class="formdiv" id="uname2" ><label>Name</label><br>
				<input name="uname1" id="uname" type="text" value="" required="required"  onblur="checkname('uname');"/><br>
				</div>
				<div class="formdiv" id="rr" >Date Of Birth:<br>
				<input name="bdate" id="barthdate"type="date" />
				</div>
				<div class="formdiv" id="gender"><label>Gender</label><br>
				<input name="sex" type="radio" value="male"   /><label>Male</label>
				<input name="sex" type="radio" value="female" selected="selected"  /><label>Female</label>
				</div>
				<div class="formdiv" id="nat2"><label>Nationalty</label><br>
				<select name="countries" id="countries" style="width:200px;">
  <option value='ad' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ad" data-title="Andorra">Andorra</option>
  <option value='ae' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ae" data-title="United Arab Emirates">United Arab Emirates</option>
  <option value='af' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag af" data-title="Afghanistan">Afghanistan</option>
  <option value='ag' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ag" data-title="Antigua and Barbuda">Antigua and Barbuda</option>
  <option value='ai' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ai" data-title="Anguilla">Anguilla</option>
  <option value='al' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag al" data-title="Albania">Albania</option>
  <option value='am' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag am" data-title="Armenia">Armenia</option>
  <option value='an' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag an" data-title="Netherlands Antilles">Netherlands Antilles</option>
  <option value='ao' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ao" data-title="Angola">Angola</option>
  <option value='aq' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag aq" data-title="Antarctica">Antarctica</option>
  <option value='ar' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ar" data-title="Argentina">Argentina</option>
  <option value='as' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag as" data-title="American Samoa">American Samoa</option>
  <option value='at' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag at" data-title="Austria">Austria</option>
  <option value='au' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag au" data-title="Australia">Australia</option>
  <option value='aw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag aw" data-title="Aruba">Aruba</option>
  <option value='ax' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ax" data-title="Aland Islands">Aland Islands</option>
  <option value='az' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag az" data-title="Azerbaijan">Azerbaijan</option>
  <option value='ba' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ba" data-title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
  <option value='bb' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bb" data-title="Barbados">Barbados</option>
  <option value='bd' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bd" data-title="Bangladesh">Bangladesh</option>
  <option value='be' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag be" data-title="Belgium">Belgium</option>
  <option value='bf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bf" data-title="Burkina Faso">Burkina Faso</option>
  <option value='bg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bg" data-title="Bulgaria">Bulgaria</option>
  <option value='bh' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bh" data-title="Bahrain">Bahrain</option>
  <option value='bi' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bi" data-title="Burundi">Burundi</option>
  <option value='bj' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bj" data-title="Benin">Benin</option>
  <option value='bm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bm" data-title="Bermuda">Bermuda</option>
  <option value='bn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bn" data-title="Brunei Darussalam">Brunei Darussalam</option>
  <option value='bo' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bo" data-title="Bolivia">Bolivia</option>
  <option value='br' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag br" data-title="Brazil">Brazil</option>
  <option value='bs' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bs" data-title="Bahamas">Bahamas</option>
  <option value='bt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bt" data-title="Bhutan">Bhutan</option>
  <option value='bv' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bv" data-title="Bouvet Island">Bouvet Island</option>
  <option value='bw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bw" data-title="Botswana">Botswana</option>
  <option value='by' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag by" data-title="Belarus">Belarus</option>
  <option value='bz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag bz" data-title="Belize">Belize</option>
  <option value='ca' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ca" data-title="Canada">Canada</option>
  <option value='cc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cc" data-title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
  <option value='cd' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cd" data-title="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
  <option value='cf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cf" data-title="Central African Republic">Central African Republic</option>
  <option value='cg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cg" data-title="Congo">Congo</option>
  <option value='ch' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ch" data-title="Switzerland">Switzerland</option>
  <option value='ci' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ci" data-title="Cote D'Ivoire (Ivory Coast)">Cote D'Ivoire (Ivory Coast)</option>
  <option value='ck' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ck" data-title="Cook Islands">Cook Islands</option>
  <option value='cl' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cl" data-title="Chile">Chile</option>
  <option value='cm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cm" data-title="Cameroon">Cameroon</option>
  <option value='cn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cn" data-title="China">China</option>
  <option value='co' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag co" data-title="Colombia">Colombia</option>
  <option value='cr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cr" data-title="Costa Rica">Costa Rica</option>
  <option value='cs' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cs" data-title="Serbia and Montenegro">Serbia and Montenegro</option>
  <option value='cu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cu" data-title="Cuba">Cuba</option>
  <option value='cv' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cv" data-title="Cape Verde">Cape Verde</option>
  <option value='cx' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cx" data-title="Christmas Island">Christmas Island</option>
  <option value='cy' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cy" data-title="Cyprus">Cyprus</option>
  <option value='cz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag cz" data-title="Czech Republic">Czech Republic</option>
  <option value='de' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag de" data-title="Germany">Germany</option>
  <option value='dj' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dj" data-title="Djibouti">Djibouti</option>
  <option value='dk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dk" data-title="Denmark">Denmark</option>
  <option value='dm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dm" data-title="Dominica">Dominica</option>
  <option value='do' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag do" data-title="Dominican Republic">Dominican Republic</option>
  <option value='dz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag dz" data-title="Algeria">Algeria</option>
  <option value='ec' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ec" data-title="Ecuador">Ecuador</option>
  <option value='ee' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ee" data-title="Estonia">Estonia</option>
  <option value='eg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag eg" data-title="Egypt">Egypt</option>
  <option value='eh' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag eh" data-title="Western Sahara">Western Sahara</option>
  <option value='er' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag er" data-title="Eritrea">Eritrea</option>
  <option value='es' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag es" data-title="Spain">Spain</option>
  <option value='et' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag et" data-title="Ethiopia">Ethiopia</option>
  <option value='fi' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fi" data-title="Finland">Finland</option>
  <option value='fj' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fj" data-title="Fiji">Fiji</option>
  <option value='fk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fk" data-title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
  <option value='fm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fm" data-title="Federated States of Micronesia">Federated States of Micronesia</option>
  <option value='fo' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fo" data-title="Faroe Islands">Faroe Islands</option>
  <option value='fr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">France</option>
  <option value='fx' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag fx" data-title="France, Metropolitan">France, Metropolitan</option>
  <option value='ga' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ga" data-title="Gabon">Gabon</option>
  <option value='gb' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gb" data-title="Great Britain (UK)">Great Britain (UK)</option>
  <option value='gd' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gd" data-title="Grenada">Grenada</option>
  <option value='ge' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ge" data-title="Georgia">Georgia</option>
  <option value='gf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gf" data-title="French Guiana">French Guiana</option>
  <option value='gh' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gh" data-title="Ghana">Ghana</option>
  <option value='gi' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gi" data-title="Gibraltar">Gibraltar</option>
  <option value='gl' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gl" data-title="Greenland">Greenland</option>
  <option value='gm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gm" data-title="Gambia">Gambia</option>
  <option value='gn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gn" data-title="Guinea">Guinea</option>
  <option value='gp' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gp" data-title="Guadeloupe">Guadeloupe</option>
  <option value='gq' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gq" data-title="Equatorial Guinea">Equatorial Guinea</option>
  <option value='gr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gr" data-title="Greece">Greece</option>
  <option value='gs' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gs" data-title="S. Georgia and S. Sandwich Islands">S. Georgia and S. Sandwich Islands</option>
  <option value='gt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gt" data-title="Guatemala">Guatemala</option>
  <option value='gu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gu" data-title="Guam">Guam</option>
  <option value='gw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gw" data-title="Guinea-Bissau">Guinea-Bissau</option>
  <option value='gy' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag gy" data-title="Guyana">Guyana</option>
  <option value='hk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hk" data-title="Hong Kong">Hong Kong</option>
  <option value='hm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hm" data-title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
  <option value='hn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hn" data-title="Honduras">Honduras</option>
  <option value='hr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hr" data-title="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
  <option value='ht' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ht" data-title="Haiti">Haiti</option>
  <option value='hu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag hu" data-title="Hungary">Hungary</option>
  <option value='id' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag id" data-title="Indonesia">Indonesia</option>
  <option value='ie' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ie" data-title="Ireland">Ireland</option>
  <option value='il' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag il" data-title="Israel">Israel</option>
  <option value='in' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag in" data-title="India" >India</option>
  <option value='io' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag io" data-title="British Indian Ocean Territory">British Indian Ocean Territory</option>
  <option value='iq' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag iq" data-title="Iraq">Iraq</option>
  <option value='ir' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ir" data-title="Iran">Iran</option>
  <option value='is' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag is" data-title="Iceland">Iceland</option>
  <option value='it' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag it" data-title="Italy">Italy</option>
  <option value='jm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag jm" data-title="Jamaica">Jamaica</option>
  <option value='jo' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag jo" data-title="Jordan">Jordan</option>
  <option value='jp' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag jp" data-title="Japan">Japan</option>
  <option value='ke' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ke" data-title="Kenya">Kenya</option>
  <option value='kg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kg" data-title="Kyrgyzstan">Kyrgyzstan</option>
  <option value='kh' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kh" data-title="Cambodia">Cambodia</option>
  <option value='ki' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ki" data-title="Kiribati">Kiribati</option>
  <option value='km' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag km" data-title="Comoros">Comoros</option>
  <option value='kn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kn" data-title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
  <option value='kp' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kp" data-title="Korea (North)">Korea (North)</option>
  <option value='kr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kr" data-title="Korea (South)">Korea (South)</option>
  <option value='kw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kw" data-title="Kuwait">Kuwait</option>
  <option value='ky' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ky" data-title="Cayman Islands">Cayman Islands</option>
  <option value='kz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag kz" data-title="Kazakhstan">Kazakhstan</option>
  <option value='la' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag la" data-title="Laos">Laos</option>
  <option value='lb' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lb" data-title="Lebanon">Lebanon</option>
  <option value='lc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lc" data-title="Saint Lucia">Saint Lucia</option>
  <option value='li' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag li" data-title="Liechtenstein">Liechtenstein</option>
  <option value='lk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lk" data-title="Sri Lanka">Sri Lanka</option>
  <option value='lr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lr" data-title="Liberia">Liberia</option>
  <option value='ls' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ls" data-title="Lesotho">Lesotho</option>
  <option value='lt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lt" data-title="Lithuania">Lithuania</option>
  <option value='lu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lu" data-title="Luxembourg">Luxembourg</option>
  <option value='lv' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag lv" data-title="Latvia">Latvia</option>
  <option value='ly' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ly" data-title="Libya">Libya</option>
  <option value='ma' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ma" data-title="Morocco">Morocco</option>
  <option value='mc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mc" data-title="Monaco">Monaco</option>
  <option value='md' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag md" data-title="Moldova">Moldova</option>
  <option value='mg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mg" data-title="Madagascar">Madagascar</option>
  <option value='mh' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mh" data-title="Marshall Islands">Marshall Islands</option>
  <option value='mk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mk" data-title="Macedonia">Macedonia</option>
  <option value='ml' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ml" data-title="Mali">Mali</option>
  <option value='mm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mm" data-title="Myanmar">Myanmar</option>
  <option value='mn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mn" data-title="Mongolia">Mongolia</option>
  <option value='mo' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mo" data-title="Macao">Macao</option>
  <option value='mp' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mp" data-title="Northern Mariana Islands">Northern Mariana Islands</option>
  <option value='mq' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mq" data-title="Martinique">Martinique</option>
  <option value='mr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mr" data-title="Mauritania">Mauritania</option>
  <option value='ms' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ms" data-title="Montserrat">Montserrat</option>
  <option value='mt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mt" data-title="Malta">Malta</option>
  <option value='mu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mu" data-title="Mauritius">Mauritius</option>
  <option value='mv' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mv" data-title="Maldives">Maldives</option>
  <option value='mw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mw" data-title="Malawi">Malawi</option>
  <option value='mx' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mx" data-title="Mexico">Mexico</option>
  <option value='my' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag my" data-title="Malaysia">Malaysia</option>
  <option value='mz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag mz" data-title="Mozambique">Mozambique</option>
  <option value='na' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag na" data-title="Namibia">Namibia</option>
  <option value='nc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nc" data-title="New Caledonia">New Caledonia</option>
  <option value='ne' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ne" data-title="Niger">Niger</option>
  <option value='nf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nf" data-title="Norfolk Island">Norfolk Island</option>
  <option value='ng' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ng" data-title="Nigeria">Nigeria</option>
  <option value='ni' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ni" data-title="Nicaragua">Nicaragua</option>
  <option value='nl' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nl" data-title="Netherlands">Netherlands</option>
  <option value='no' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag no" data-title="Norway">Norway</option>
  <option value='np' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag np" data-title="Nepal">Nepal</option>
  <option value='nr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nr" data-title="Nauru">Nauru</option>
  <option value='nu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nu" data-title="Niue">Niue</option>
  <option value='nz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag nz" data-title="New Zealand (Aotearoa)">New Zealand (Aotearoa)</option>
  <option value='om' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag om" data-title="Oman">Oman</option>
  <option value='pa' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pa" data-title="Panama">Panama</option>
  <option value='pe' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pe" data-title="Peru">Peru</option>
  <option value='pf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pf" data-title="French Polynesia">French Polynesia</option>
  <option value='pg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pg" data-title="Papua New Guinea">Papua New Guinea</option>
  <option value='ph' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ph" data-title="Philippines">Philippines</option>
  <option value='pk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pk" data-title="Pakistan">Pakistan</option>
  <option value='pl' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pl" data-title="Poland">Poland</option>
  <option value='pm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pm" data-title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
  <option value='pn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pn" data-title="Pitcairn">Pitcairn</option>
  <option value='pr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pr" data-title="Puerto Rico">Puerto Rico</option>
  <option value='ps' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ps" data-title="Palestinian Territory">Palestinian Territory</option>
  <option value='pt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pt" data-title="Portugal">Portugal</option>
  <option value='pw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag pw" data-title="Palau">Palau</option>
  <option value='py' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag py" data-title="Paraguay">Paraguay</option>
  <option value='qa' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag qa" data-title="Qatar">Qatar</option>
  <option value='re' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag re" data-title="Reunion">Reunion</option>
  <option value='ro' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ro" data-title="Romania">Romania</option>
  <option value='ru' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ru" data-title="Russian Federation">Russian Federation</option>
  <option value='rw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag rw" data-title="Rwanda">Rwanda</option>
  <option value='sa' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sa" data-title="Saudi Arabia">Saudi Arabia</option>
  <option value='sb' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sb" data-title="Solomon Islands">Solomon Islands</option>
  <option value='sc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sc" data-title="Seychelles">Seychelles</option>
  <option value='sd' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sd" data-title="Sudan" selected="selected">Sudan</option>
  <option value='se' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag se" data-title="Sweden">Sweden</option>
  <option value='sg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sg" data-title="Singapore">Singapore</option>
  <option value='sh' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sh" data-title="Saint Helena">Saint Helena</option>
  <option value='si' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag si" data-title="Slovenia">Slovenia</option>
  <option value='sj' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sj" data-title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
  <option value='sk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sk" data-title="Slovakia">Slovakia</option>
  <option value='sl' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sl" data-title="Sierra Leone">Sierra Leone</option>
  <option value='sm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sm" data-title="San Marino">San Marino</option>
  <option value='sn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sn" data-title="Senegal">Senegal</option>
  <option value='so' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag so" data-title="Somalia">Somalia</option>
  <option value='sr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sr" data-title="Suriname">Suriname</option>
  <option value='st' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag st" data-title="Sao Tome and Principe">Sao Tome and Principe</option>
  <option value='su' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag su" data-title="USSR (former)">USSR (former)</option>
  <option value='sv' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sv" data-title="El Salvador">El Salvador</option>
  <option value='sy' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sy" data-title="Syria">Syria</option>
  <option value='sz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sz" data-title="Swaziland">Swaziland</option>
  <option value='tc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tc" data-title="Turks and Caicos Islands">Turks and Caicos Islands</option>
  <option value='td' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag td" data-title="Chad">Chad</option>
  <option value='tf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tf" data-title="French Southern Territories">French Southern Territories</option>
  <option value='tg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tg" data-title="Togo">Togo</option>
  <option value='th' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag th" data-title="Thailand">Thailand</option>
  <option value='tj' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tj" data-title="Tajikistan">Tajikistan</option>
  <option value='tk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tk" data-title="Tokelau">Tokelau</option>
  <option value='tl' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tl" data-title="Timor-Leste">Timor-Leste</option>
  <option value='tm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tm" data-title="Turkmenistan">Turkmenistan</option>
  <option value='tn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tn" data-title="Tunisia">Tunisia</option>
  <option value='to' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag to" data-title="Tonga">Tonga</option>
  <option value='tp' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tp" data-title="East Timor">East Timor</option>
  <option value='tr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tr" data-title="Turkey">Turkey</option>
  <option value='tt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tt" data-title="Trinidad and Tobago">Trinidad and Tobago</option>
  <option value='tv' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tv" data-title="Tuvalu">Tuvalu</option>
  <option value='tw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tw" data-title="Taiwan">Taiwan</option>
  <option value='tz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag tz" data-title="Tanzania">Tanzania</option>
  <option value='ua' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ua" data-title="Ukraine">Ukraine</option>
  <option value='ug' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ug" data-title="Uganda">Uganda</option>
  <option value='uk' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag uk" data-title="United Kingdom">United Kingdom</option>
  <option value='um' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag um" data-title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
  <option value='us' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="United States">United States</option>
  <option value='uy' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag uy" data-title="Uruguay">Uruguay</option>
  <option value='uz' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag uz" data-title="Uzbekistan">Uzbekistan</option>
  <option value='va' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag va" data-title="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
  <option value='vc' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vc" data-title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
  <option value='ve' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ve" data-title="Venezuela">Venezuela</option>
  <option value='vg' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vg" data-title="Virgin Islands (British)">Virgin Islands (British)</option>
  <option value='vi' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vi" data-title="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
  <option value='vn' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vn" data-title="Viet Nam">Viet Nam</option>
  <option value='vu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag vu" data-title="Vanuatu">Vanuatu</option>
  <option value='wf' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag wf" data-title="Wallis and Futuna">Wallis and Futuna</option>
  <option value='ws' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ws" data-title="Samoa">Samoa</option>
  <option value='ye' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ye" data-title="Yemen">Yemen</option>
  <option value='yt' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag yt" data-title="Mayotte">Mayotte</option>
  <option value='yu' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag yu" data-title="Yugoslavia (former)">Yugoslavia (former)</option>
  <option value='za' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag za" data-title="South Africa">South Africa</option>
  <option value='zm' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag zm" data-title="Zambia">Zambia</option>
  <option value='zr' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag zr" data-title="Zaire (former)">Zaire (former)</option>
  <option value='zw' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag zw" data-title="Zimbabwe">Zimbabwe</option>
</select>
				<!--<input name="nat1" id="nat" type="text" onblur="checkname('nat');" required="required"  /><br>-->
				</div>
				<div class="formdiv"><label>Address</label><br>
				<input name="address" type="text" value="" required="required"  /><br>
				</div>
				<div class="formdiv" id="mobno2"><label>Mobile No</label><br>
				<input name="mobno1" id="mobno" type="text" value="" required="required" onblur="phonenumber('mobno');" /><br>
				</div>
				<br><div id="phone">+Add Mobile No  </div><script>$('#phone').click(function(){document.getElementById('mobnox2').style.display="block";$('#phone').remove();});</script>
				<div class="formdiv" id="mobnox2"><label>Mobile No II</label><br>
				<input name="mobnox1" id="mobnox" type="text" value="" onblur="phonenumber('mobnox');" /><br>
				</div>
			</fieldset>
			<fieldset>
			<div class="formdiv" id="em2"><label>E-mail</label><br>
				<input name="em1" id="em" type="text" value="" required="required" onblur="return checkEmail('em','a');" /><span class="flash"></span><br>
			</div>
			<div class="formdiv"><label>Password</label><br>
			<input type="password" name="pass"/>
			</div>	
			</fieldset>
			</div>	
			<div class="block">
			<fieldset><legend class="cap">Education</legend>
				<div class="formdiv"><label>University</label><br>
				<input name="unive" type="text" value="" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Collage</label><br>
				<input name="colg" type="text" value="" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Specification</label><br>
				<input name="spcf" type="text" value=""   /><br>
				</div>
				<div class="formdiv"><label>Degree</label><br>
				<input name="degX1" type="text" value="" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Date</label>
				<input name="mdate" type="date" value="" required="required"  /><br>
				</div>
			</fieldset>
			</div>
			
			<div class="block">
			<fieldset><legend class="cap">Skills</legend>
				<div class="formdiv"><label>Language</label><br>
				<input name="lang" type="text" value=""  /><br>
				</div>
				<div class="formdiv"><label>Computer Skills</label><br>
				<input name="comp" type="text" value=""  /><br>
				</div>
				</fieldset>
			</div>
			<div class="block">
			<fieldset><legend class="cap">Experience</legend>
				<div class="formdiv"><label>Work place</label><br>
				<input name="wp0" type="text" value=""   /><br>
				</div>
				<div class="formdiv"><label>Duration</label><br>
				<input name="du0" type="text" value=""   /><br>
				</div>
				<div class="formdiv"><label>Position</label><br>
				<input name="pos0" type="text" value=""   /><br>
				</div><span class="removeVar">Remove Experience</span>
			</fieldset>
			</div><span class="addVar">Add New Experiences</span><script>
			var displayCount=0;	
			$('.addVar').click( function(){
			$(this).parent().append('<div class="block"><fieldset><legend class="cap">Experience No '+(++displayCount+1)+'</legend><br><div class="formdiv"><label>Work place</label><br><input name="wp'+(displayCount)+'" type="text"/><br></div><div class="formdiv"><label>Duration</label><br><input name="du'+(displayCount)+'" type="text"   /><br></div><div class="formdiv"><label>Position</label><br><input name="pos'+(displayCount)+'" type="text"/><br></div><span class="removeVar">Remove Variable</span></fieldset></div>');
			});
			$('fieldset').on('click', '.removeVar', function(){$(this).parent().remove();displayCount--;});
			</script>
			</fieldset>
			<button id="logb1" type="submit" class="form-submit-button form-submit-button-light"> Register A   </button>
			</form>
			</li>
			</ul>
		</div>
		<div id="compsrvs">
		You are  Welcome in Our Site , We Well Guarantee To You That We Doing Our Best To Delver To You The Applicants That You Looking For
		in Time and On Specification That Want , If This is First Time You Visit Th Site You Have To Register Firstly Or We Have Honor 
		By Your Joining Us and Share Your Experince  
		
			<ul>
				<li><form  method="post" name="loginform" id="log1" action="userSession.php" onsubmit="return validatec();" >
				<label>User Name</label><br>
				<input name="username" type="text"  placeholder="User Name" required="required"  /><br>
				<label>Password</label><br>
				<input name="password" type="password" placeholder="Password" required="required"   "/>
				<button id="logb" type="submit" class="form-submit-button form-submit-button-light"> login    </button>
				</form>	</li>
			</ul>
 		</div>
		<div id="compreg">
		<ul><li>
			<form  method="post" action="compreg.php" id="log1">
			<fieldset>
				<legend class="cap">Company Information </legend><br>
				<div class="formdiv" id="cname2"><label>Company Name</label><br>
				<input name="cname1" id="cname" onblur="checkname('cname');" type="text" value="" required="required"   /><br>
				</div>
				<div class="formdiv" id="mobno2"><label>Phone</label><br>
				<input name="mobno1" id="mobno" type="text" value="" required="required" onblur="phonenumber('mobno');" /><br>
				</div><!--
				<div class="formdiv" style="display:none;"id="mobnoa2"><label>Phone 2</label><br>
				<input name="mobnoa1" id="mobnoa" type="text" value="" required="required" onblur="phonenumber('mobnoa');" /><br>
				</div><span id="add" >+</span>
				<script>$("#add").click(function(){document.getElementById("mobnoa2").style.display="block";}); </script>-->
				<div id="emailx2"class="formdiv"><label>E-mail</label><br>
				<input name="emailx1" id="emailx" type="text" required="required"  onblur="return checkEmail('emailx','c');"/><span class="flash"></span><br>
				</div>
				<div class="formdiv"><label>Specification</label><br>
				<input name="spc" type="text" value=""   /><br>
				</div>
				<div class="formdiv"><label>Address</label><br>
				<input name="add" type="text" value="" required="required"  /><br>
				</div>
				<!--<div class="formdiv" id="cumane2"><label>User Name</label><br>
				<input name="cumane1"id="cumane" type="text" value="" required="required" onblur="checkname('cumane');"/><br>
				</div>-->
				<div class="formdiv"><label>Password</label><br>
				<input name="pass" type="password" value="" required="required" /><br>
				</div>
			</fieldset>
			<button id="logb" type="submit" class="form-submit-button form-submit-button-light"> Register    </button>
			</form>	
			</li>
		</ul>
		</div>
		</div>
		<div class="footer"><br/><h1>Copy Write Receved</h1></div>
		</body>
</html>