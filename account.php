<?php 
require_once('mySession.php');
$obj=mySession::getObj();
if(!isset($_SESSION['username']))$_SESSION['username']="";
$live=$obj->checkSLogin();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet"type="text/css" href="registerA.css" >
		<link rel="stylesheet" type="text/css" href="button.css"/>
		<link rel="stylesheet" type="text/css" href="1/js-image-slider.css"/>
		<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
		<link rel="stylesheet" type="text/css" href="css/msdropdown/flags.css" />
		<script src="formA.js" type="text/javascript"></script>
		<script src="jquery-1.8.2.min.js"></script >
		<script src="js/msdropdown/jquery.dd.min.js"></script>
		<script src="1/js-image-slider.js" type="text/javascript"></script>
		<script>
		$(document).ready(function() {
		$("#countries").msDropdown();
		});
		function deleteBox(id){
		if (confirm("Are you sure you want to delete this Application ?"))
		{
		  var dataString ='id='+id;
		  $("#flash_"+id).show();
		  $("#flash_"+id).fadeIn(400).html('<img src="images/loading.gif" /> ');
		  $.ajax({
		  type: "POST",
		  url: "deleteAppli.php",
		  data: dataString,
		  cache: false,
		  success: function(result){
			   if(result){
				$("#flash_"+id).hide();
				// if data delete successfully
				if(result=='success'){
				 //Check random no, for animated type of effect
				 var randNum=Math.floor((Math.random()*100)+1);
				 if(randNum % 2==0){
					// Delete with slide up effect
					$("#list_"+id).slideUp(1000);
				 }else{
					// Just hide data
					$("#list_"+id).hide(500);
				 }
				 }else{
					 var errorMessage=result.substring(position+2);
					 alert(errorMessage);
					}}}
				  });
				}}
		function checkava(username,type,idn){
			$('#flash').fadeIn(400).html('<img src="loading.gif"/> ');
			var dataString = 'username='+username;
			var initE="<?php echo $_SESSION['username']; ?>";
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
					  if(type=='a') $("#"+idn).val(initE);
					  returnval= false;
               }
          }
      });
	  return returnval;
}
		</script>
	
		</head>
	<body onload="">
		<div id="sliderFrame">
			<div id="slider">
			<img src="images/l1.png" alt="" />
			<img src="images/l2.png" alt="" />
			<img src="images/l3.png" alt="" />
			</div>
		</div>
		<div id="light" class="white_content"><h1>You Must Login Firstly</h1><ul>
				<li><form  method="post" name="loginform1" id="log1" action="login.php" onsubmit="return companylogin();" >
				User Name<br>
				<input name="username" type="text" placeholder="User Name" required="required"  /><br>
				Password<br>
				<input name="password" type="password" placeholder="Password" required="required"/><br/><br/>
				<button id="logb" type="submit" class="form-submit-button-light"> login    </button>
				</form>	</li>
			</ul></div>
		<div id="fade" class="black_overlay"></div>
		<script><?php echo ($live)?"":"document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';";?></script>
		<div >
			<ul id="menu">
			<li id="regmng" onclick="viewcom(false);"><a href="account.php">Account</a></li>
			<li><a href="home.php">Home</a></li>
			<li><a href="#" onclick="viewcom(true);">Companies Service</a></li>
			<li id="logina1"><a href="logout.php" onclick="localStorage.setItem('isCompany',false);logout();"><img class="icon"src="logout-icon.png"/>Logout</a></li>
			</ul>
		</div>
		<div class="leftcol" >
			<div id="leftcol1">
			<ul>
			<li><a href="#" onclick="vapp()"><img class="icon"src="vapp.png"/>View Applications</a></li>
			<li><a href="#" onclick="modinf()"><img class="icon"src="userwrite.png"/>Edit Informations</a></li>
			<li><a href="sdelacc.php" onclick="return confirm('Your Account Will Deleted \n and Yor data will be wiped');"><img class="icon"src="delacc1.png"/>Delete Account</a></li>
			</ul>
			</div>
			<div id="leftcol2">
			<ul>
			<li><a href="#" onclick="viewelm(true);">Login As Company </a></li>
			<li><a href="#" onclick="viewelm(false);">Register As Company</a></li>
			</ul>
			</div>
		</div>
		<div class="centerspace">
		<div id="compsrvs">
			You are  Welcome in Our Site , We Well Guarantee To You That We Doing Our Best To Delver To You The Applicants That You Looking For
			in Time and On Specification That Want , If This is First Time You Visit Th Site You Have To Register Firstly Or We Have Honor 
			By Your Joining Us and Share Your Experince  
			<ul>
			<li><form  method="post" name="loginform" id="log1" action="userSession.php" onsubmit="return companylogin();">
			<label>User Name</label><br>
			<input name="uname" type="text" placeholder="UserName" required="required"  /><br>
			<label>Password</label><br>
			<input name="passw" type="password" placeholder="Password" required="required"  />
			<button id="logb" type="submit" class="form-submit-button-light"> login    </button>
			</form>	</li>
			</ul>
		</div>
		<div id="compreg">
			<ul><li>
			<form  method="post" name="addcomp" id="log1" action="compreg.php">
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
				<div id="email2"class="formdiv"><label>E-mail</label><br>
				<input name="email1" id="email" type="text" required="required"  onblur="return checkEmail('email','c');"/><span class="flash"></span><br>
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
			<button id="logb" type="submit" class="form-submit-button-light"> Register    </button>
			</form>	
			</li>
			</ul>
		</div>
		<div id="apps">
		
		<?php 
		if(isset($_SESSION['Sid']))$id=$_SESSION['Sid'];
		else die();
		$query="select * from applications where seeker_id='$id'";
		mysqli_query($obj->getConObj(),"SET NAMES 'utf8'");
		$data=mysqli_query($obj->getConObj(),$query);
		if(!($data->num_rows==0))echo '<table width="81%"cellspacing="0" cellpadding="2" align="center" border="0" id="data_tbl">
			<thead>
			  <tr>
			    <th width="10%">Jop Title</th>
			    <th width="8%">State</th>
				<th width="12%">Interview Date</th>
				<th width="12%">Interview Location</th>
				<th width="8%">Delete</th>
			  </tr>
			 </thead>
			 <tbody>';
			$cls=0;
		while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC)){
			$bg = ($cls = !$cls) ? '#ECEEF4' : '#FFFFFF';
			$jid=$row['jop_id'];
			$jop_name="select jop_name from advertice where ad_id='$jid'";
			$jop_name=$obj->makeQuery($jop_name);
			$jop_name=mysqli_fetch_array($jop_name,MYSQLI_ASSOC);
			echo '<tr id="list_'.$row['app_id'].'" style="background:'.$bg.'>
				  <td class="name"></td>
				  <td>'.$jop_name['jop_name'].'</td>
				  <td class="name">'.$row['state'].'</td>
				  <td class="name">'.$row['date'].'</td>
				  <td class="name">'.$row['int_addres'].'</td>
				  <td><span class="flash" id="flash_'.$row['app_id'].'"></span>
					  <span class="delete"><a href="javascript:void()">
					  <img alt="Delete" title="Delete" width="20" src="images/delete.jpg"
					  onclick=deleteBox("'.$row['app_id'].'") border="0"></a></span></td></tr>';
			}
		if(!($data->num_rows==0))echo '</tbody></table>';
		if($data->num_rows==0) echo '<div class="list"> Till now You Did not Apply Any Jop. </div>';
		?>
		</div>
		<div id="pdata">
			<ul>
			<li>
			<form  method="post" name="seekerform" id="log1" onsubmit="return validatess();"action="updateSeeker.php">
			<fieldset>
			<h1 id="pls">Please Change only that fields That You Wont to Change and Rewrite/Change The Password</h1><hr>
			<div class="block">
			<?php 
			$id=$_SESSION['Sid'];
			$query1="select * from seekerlogin where user_id ='$id'";
			$query2="select * from seekers where id='$id'";
			$query3="select * from experience where s_id='$id'";
			$result1=$obj->makeQuery($query1);
			$result2=$obj->makeQuery($query2);
			$result3=$obj->makeQuery($query3);
			$expcount = $result3->num_rows;
			$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
			$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
			//row3 maybe more than one row so it need loop as coming later
			?>
			<fieldset><legend class="cap">Basic Information</legend>
				<div class="formdiv" id="uname2" ><label>Name</label><br>
				<input name="uname1" id="uname" type="text" value="<?php echo $row2['name'];?>" required="required"  onblur="checkname('uname');"/><br>
				</div>
				<div class="formdiv" id="rr" >Date Of Birth:<br>
				<input name="bdate" id="barthdate"type="date" value="<?php echo $row2['birthdate'];?>"/>
				</div>
				<div class="formdiv" id="gender"><label>Gender</label><br>
				<input name="sex" type="radio" value="male"<?php echo ($row2['gender']=="male")?'checked="checked"':'';?>" /><label>Male</label>
				<input name="sex" type="radio" value="female"<?php echo ($row2['gender']=="female")?'checked="checked"':''; ?>" /><label>Female</label>
				</div>
				<div class="formdiv" id="nat2"><label>Nationalty</label><br>
				<select name="countries" id="countries" style="width:200px;">
  <?php echo '<option value='.$row2['nationality'].' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ad" data-title="" selected="selected"></option>';?>
  <option value='ad' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag ad" data-title="Andorra" >Andorra</option>
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
  <option value='sd' data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag sd" data-title="Sudan" >Sudan</option>
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
				<input name="address" type="text" value="<?php echo $row2['address']?>" required="required"  /><br>
				</div>
				<div class="formdiv" id="mobno2"><label>Mobile No</label><br>
				<input name="mobno1" id="mobno" type="text" value="<?php echo $row2['phone']?>" required="required" onblur="phonenumber('mobno');" /><br>
				</div>
				<?php $ph2=$row2['phone2'];?>
				<?php echo ($row2['phone2']==null or $row2['phone2'] =="")?'<br><div id="phone">+Add Mobile No  </div><script>$("#phone").click(function(){document.getElementById("mobnox2").style.display="block";$("#phone").remove();});</script>
				<div class="formdiv" id="mobnox2" style="display:none;"><label>Mobile No II</label><br>
				<input name="mobnox1" id="mobnox" type="text" value="" onblur="phonenumber("mobnox");" /><br></div>':'<div class="formdiv" id="mobnox2"><label>Mobile No II</label><br>
				<input name="mobnox1" id="mobnox" type="text" value="'.$ph2.'" onblur="phonenumber("mobnox");" /><br></div>';?>
				
			</fieldset>
			</div>
			<div class="block">
			<fieldset>
			<div class="formdiv" id="em2"><label>E-mail</label><br>
				<input name="em1" id="em" type="text" value="<?php echo $row1['user_email'];?>" required="required" onblur="return checkEmail('em','a');" /><span class="flash" ></span><br>
			</div>
			<div class="formdiv"><label>Password</label><br>
			<input type="password" value="<?php echo $row1['password'];?>" name="pass"/>
			</div>	
			</fieldset>
			</div>
			<div class="block">
			<fieldset><legend class="cap">Education</legend>
				<div class="formdiv"><label>University</label><br>
				<input name="unive" type="text" value="<?php echo $row2['university'];?>" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Collage</label><br>
				<input name="colg" type="text" value="<?php echo $row2['collage'];?>" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Specification</label><br>
				<input name="spcf" type="text" value="<?php echo $row2['spc'];?>"   /><br>
				</div>
				<div class="formdiv"><label>Degree</label><br>
				<input name="degX1" type="text" value="<?php echo $row2['degree'];?>" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Date</label>
				<input name="mdate" type="date" value="<?php echo $row2['date'];?>" required="required"  /><br>
				</div>
			</fieldset>
			</div>
			<div class="block">
			<fieldset><legend class="cap">Skills</legend>
				<div class="formdiv"><label>Language</label><br>
				<input name="lang" type="text" value="<?php echo $row2['Language'];?>"  /><br>
				</div>
				<div class="formdiv"><label>Computer Skills</label><br>
				<input name="comp" type="text" value="<?php echo $row2['computer'];?>"  /><br>
				</div>
				</fieldset>
			</div>
			<?php #echo $expcount;
			for($i=0;$expcount>$i;$i++){//  
			$row=mysqli_fetch_array($result3,MYSQLI_ASSOC);
			echo '<div class="block">
			<fieldset><legend class="cap">Experience No '.($i+1).'</legend>
				<div class="formdiv"><label>Work place</label><br>
				<input name="wp'.$i.'" type="text" value="'.$row['work_place'].'"   /><br>
				</div>
				<div class="formdiv"><label>Duration</label><br>
				<input name="du'.$i.'" type="text" value="'.$row['du'].'"   /><br>
				</div>
				<div class="formdiv"><label>Position</label><br>
				<input name="pos'.$i.'" type="text" value="'.$row['position'].'"   /><br>
				</div><span class="removeVar" id="exp_'.$row['experience_id'].'">Remove Experience</span>
			</fieldset>
			</div>';
			$_SESSION['experience_id'.$i]=$row['experience_id'];
			}

			?><span class="addVar">Add New Experiences</span><script>
			var displayCount=<?php echo $expcount-1;?>;	
			$('.addVar').click( function(){
			$(this).parent().append('<div class="block"><fieldset><legend class="cap">Experience No '+(++displayCount+1)+'</legend><br><div class="formdiv"><label>Work place</label><br><input name="wp'+(displayCount)+'" type="text"/><br></div><div class="formdiv"><label>Duration</label><br><input name="du'+(displayCount)+'" type="text"   /><br></div><div class="formdiv"><label>Position</label><br><input name="pos'+(displayCount)+'" type="text"/><br></div><span class="removeVar" id=>Remove Variable</span></fieldset></div>');
			});
			$('fieldset').on('click', '.removeVar', function(){
			//	experience_id   s_id    work_place   du  position    
			id=$(this).attr('id').replace(/exp_/,'')
			dataString='id='+id
		if(id>0)
	      $.ajax({
		  type: "POST",
		  url: "deleteexp.php",
		  data: dataString,
		  cache: false,
		  success: function(result){
			   if(result){
				//$("#exp_"+id).parent().hide();
				// if data delete successfully
				if(result=='success'){
					$("#exp_"+id).parent().remove();displayCount--;				 
				}else{
					 //var errorMessage=result.substring(position+2);
					// alert("try agin");
					$("#exp_"+id).append(result);
					}}
					}
				  });
			 else $(this).parent().remove();displayCount--;
			});
			</script>
			</fieldset>
			<button id="logb1" type="submit" class="form-submit-button form-submit-button-light"> UPDATE   </button>
			</form>
			</li>
			</ul>
		</div>
		</div>
		<div class="footer"><br/><h1>Copy Write Receved</h1></div>
	</body>
</html>