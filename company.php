<!--<?php 
include_once('userSession.php');
$ss=userSession::getObj();
if(!isset($_SESSION['username']))$_SESSION['username']="";
$live=$ss->checkSLogin();
?>-->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="verticalaccordion.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
		<link rel="stylesheet" type="text/css" href="css/msdropdown/flags.css" />
		<link href="1/js-image-slider.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link type="text/css" rel="stylesheet" href="registerC.css" >
		<link rel="stylesheet" type="text/css" href="button.css"/>
		<script src="jquery-1.10.1.min.js" type="text/javascript"></script>
		<script src="script.js" type="text/javascript"></script>
		<!--<script src="jquery-1.8.2.min.js"></script >-->
		<script src="formC.js" type="text/javascript"></script>
		<script src="1/js-image-slider.js" type="text/javascript"></script>
		<script src="js/msdropdown/jquery.dd.min.js"></script>
		<script type="text/javascript" src="js/jquery.balloon.js"></script>
			<script>
			$(document).ready(function() {
			$("#countries").msDropdown();
			$("#cat").msDropdown();
			$("#edu").msDropdown();
			$("#cat1").msDropdown();
			$("#edu1").msDropdown();
			$("#hur").msDropdown();
			$("#mnt").msDropdown();
			});
			function checkava(username,type,idn){
			$('#flash').fadeIn(400).html('<img src="loading.gif"/> ');
			var initE="<?php echo $_SESSION['username']; ?>";
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
 					  if(type=='c') $("#"+idn).val(initE);
					  returnval= false;
               }
          }
      });
	  return returnval;
}
			</script>
	</head>
	<body>
	<div id="light" class="white_content"><h1>You Must Login Firstly</h1><ul>
				<li><form  method="post" name="loginform1" id="log1" action="userSession.php" onsubmit="return validate();" >
				User Name<br>
				<input name="username" type="text" placeholder="User Name" required="required"  /><br>
				Password<br>
				<input name="password" type="password" placeholder="Password" required="required"/><br/><br/>
				<button id="logb" type="submit" class="form-submit-button-light"> login    </button>
				</form>	</li>
			</ul></div>
	<div id="fade" class="black_overlay"></div>
	<script>
	<?php  echo $live ?'localStorage.setItem("isCompany","true");':'document.getElementById("light").style.display="block";document.getElementById("fade").style.display="block";';?></script>
	<div id="light1" class="white_content">Wrong User Name /Password </div>
	<div id="fade1" class="black_overlay"></div>
	<div id="sliderFrame">
        <div id="slider">
            <img src="images/l1.png" alt="" />
            <img src="images/l2.png" alt="" />
            <img src="images/l3.png" alt="" />
        </div>
    </div>
	<div >
	<ul id="menu">
		<li><a href="company.php">Company</a></li>
		<li id="regmng"><a href="#"onclick="viewr();">Register As Seeker</a></li>
		<li><a href="home.php">Home</a></li>
		<li id="seekerlogin"><a href="">Seeker Login</a>	
		<ul>
		<form  method="post" name="sloginform" id="log1" action="login.php" onsubmit="return validates();">
		User Name<br>
		<input name="username" type="text" placeholder="UserName" required="required"  /><br>
		Password<br>
		<input name="password" type="password" placeholder="Password" required="required"  /><br/>
		<button id="logb" type="submit" class="form-submit-button-light"> login    </button>
		</form>
		</ul>
		</li>
	</ul>
	</div>
	<div class="leftcol" id="catog">
		<div id="leftcol1">
		<ul>
		<li><a href="#" onclick="viewapp();"><img class="icon" src="mail.png" height="30" width="30" />View Applications</a></li>
		<li><a href="#" onclick="viewads();"><img class="icon" src="stack.png" height="30" width="30" />View Advertisements</a></li>
		<li><a href="#" onclick="viewcom();"><img class="icon" src="document.png" height="30" width="30" />Add Advertisement</a></li>
		<li><a href="#" onclick="edinfo()"><img class="icon" src="compose.png" height="30" width="30" />Edit Informations</a></li>
		<li><a href="delmyacc.php" onclick="return confirm('Your Account Will Deleted');"><img class="icon" src="x.png" height="30" width="30" />Delete My Account</a></li>
		<li><a href="logout.php" onClick="localStorage.clear();" ><img class="icon" src="door9.png" height="30" width="30" />Log Out</a></li>
		</div>
	</div>
		<div class="centerspace">
			<div id="rform">
			<ul>
			<li>
			<form  method="post" name="seekerform" id="log1" onsubmit="return validatess();"action="Registerseeker.php">
			<fieldset>
			<h1 id="pls">Please Fill Out  The Fourm in Order to Rigester</h1><hr>
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
					<input name="em1" id="em" type="text" value="" required="required" onblur="return checkEmail('em','a');" /><br>
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
		<div id="apps">
			<div class="verticalaccordion">
			<ul>
			
			<?php
			$id=$_SESSION['id'];
			$querya="select ad_id ,jop_name from `advertice` where comp_id='$id'";
			$resulta=$ss->makeQuery($querya);$i=0;
			while($row=mysqli_fetch_array($resulta,MYSQLI_ASSOC)){
						$queryb='select * from applications where jop_id='.$row['ad_id'].' and `state`="pending"';
						$resultb=$ss->makeQuery($queryb);
						if($resultb->num_rows==0)continue;
				echo "<li class='jopcat'>";
					echo "<h3 name=".$row['jop_name'].">".$row['jop_name']."</h3>";
					echo "<div id=".$row['jop_name'].">";
						echo'<table width="81%"cellspacing="0" cellpadding="2" align="center" border="0" id="data_tbl">
						<thead>
						  <tr>
							<th width="15%">Applicant Name</th>
							<th width="10%">Accept</th>
							<th width="10%">Reject</th>
						  </tr>
						</thead>
						<tbody>';
						
						while($row1=mysqli_fetch_array($resultb,MYSQLI_ASSOC)){
						//app_id   seeker_id   comp_id  jop_id  state   date  javascript:void(0);
						$seekerData='select `name` from seekers where id='.$row1['seeker_id'].'';
						$seekerData=$ss->makeQuery($seekerData);
						$seekerData=mysqli_fetch_array($seekerData,MYSQLI_ASSOC);
						echo '<tr id="app_'.$row1['app_id'].'"><td><span class="seeker" id="id_'.$row1['seeker_id'].'" title="Profile" >'.$seekerData['name'].'</span></td>';
						echo'<td class="accept">Accept <img src="accept.png" width="22" height="22" /></td>';
						echo'<td class="reject">Reject</td></tr>';
						}
						echo '</tbody></table>';
						echo '</div>';
				echo '</li>';
				}
			?>
			</ul>
			<script>
			var cont,name,x,t=true;
			$("h3").click(function(){
			x=name=$(this).attr('name');
			x=$("#"+x).height();
			x=x+60;
			($(this).parent().height()==40)?$(this).parent().height(x):$(this).parent().height("40px");
			cont=$(this).parent();$("#"+name).toggle(800);
			});	
			var app_id;
			var curr;
			$('.accept').click(function (){	
			app_id=$(this).parent().attr('id').replace(/app_/,'');
			curr=$(this);
			if(document.getElementById('f_'+app_id)==null){
			var x="<form name='f_"+app_id+"'id='f_"+app_id+"'><fieldset><input  name='id' type='hidden' value='"+app_id+"' /><label>Address</label>&nbsp<input name='add' type='text'/><br/><label>Date</label>&nbsp&nbsp&nbsp&nbsp<input name='date' type='date'/><br/><label>Time</label>&nbsp&nbsp&nbsp&nbsp<select name='hur' id='hur' style='width:40px;'><option value='01'>1</option><option value='02'>2</option><option value='03'>3</option><option value='04'>4</option><option value='05'>5</option><option value='06'>6</option><option value='07'>7</option><option value='08'>8</option><option value='09'>9</option><option value='10'>10</option><option value=011'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>09</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option></select><select name='mnt' id='mnt' style='width:40px;'><span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp</span><option value='00'>00</option><option value='15'>15</option><option value='30'>30</option><option value='45'>45</option></select><br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a  href='javascript:void(0);' class='button' ";
			x+="onclick='validForm("+app_id+");'>Accept</a><input  value='Reset' type='reset' class='button'></fieldset></form>";
			$("#"+name).append(x);
			cont.height(cont.height()+180);//$(this).removeClass('accept');
			$(this).html('<img src="loading.gif" alt="loading..." width="25" height="25" />');t=false;
			}
			else{
			$("#"+"f_"+app_id).remove();cont.height(cont.height()-180);
			$(this).html('Accept <img src="accept.png" width="22" height="22" />');
			t=true;			}
			});
			function validForm(name){//id add date hur mnt
			var x=name;
			name="f_"+name;
			var f=document.forms[name];
			var dataString='id='+f.elements[1].value+'&add='+f.elements[2].value+'&date='+f.elements[3].value+'&hur='+f.elements[4].value+'&mnt='+f.elements[5].value;
			$.ajax({
			type: "GET",
			url: "acceptjop.php",
			data: dataString,
			cache: false,
			 success: function(result){
               if(result==1){
                    f.remove();  // If you dont wana hide the form than only reset using jquery
					$("#app_"+x).hide();
                    // $("#responseMessage").html('Thank you <br/>');
               }else{
                     //$("#responseMessage").html(data);
					 alert("Opps , Try later");
               }
               }});
			}
			$(".reject").click(function (){
				var app_id=$(this).parent().attr('id').replace(/app_/,'');
				//var conf=confirm("Delete The Application");
				//if(conf==false)return;
				var dataString="id="+app_id;
				$.ajax({
				type: "POST",
				url: "rejectJop.php",
				data: dataString,
				cache: false,
				success: function(result){
				if(result=='ok'){
				$("#app_"+app_id).slideUp(1000);}
				}});
				});
			$('.seeker').click(function() {
			var id=$(this).attr('id').replace(/id_/,'');
			$.ajax({
				type: "GET",
				cache: false
				});
			$(this).balloon({ 
			position:"right",
			//contents:'<img src="loading.gif" alt="loading..." width="25" height="25" />',
			url: "getseeker.php/?id="+id,
			ajaxComplete: function(res, sts, xhr) { }
			});
		  $(this).showBalloon();
		  $('.seeker').mousemove(function() {});
			$('.seeker').mouseover(function() {});
			$('.seeker').mouseout(function() {});
			$('.seeker').mouseenter(function() {});
			$('.seeker').mouseleave(function() {});});
			$('.seeker').mousemove(function() {});
			$('.seeker').mouseover(function() {});
			$('.seeker').mouseout(function() {});
			$('.seeker').mouseenter(function() {});
			$('.seeker').mouseleave(function() {});
			</script>
			</div>
		</div>
		<div id="ads">
		<?php	
			//include_once('ad_list.php');
		//	function getTabel($a=0,$b=10){
			//$id=$_SESSION['id'];
			//$querya="select * from `advertice` where comp_id='$id' LIMIT '$a' , '$b'";
			//$resulta=$ss->makeQuery($querya);
			require_once('advertic.php');
			$obj =new advertic;
			echo $obj->getTabel(0);
			echo $obj->paginate();
			
		//	}
		?>	<div id="upTemp">
			<ul>
			<li>
			<form  method="post" name="postnewjop" id="logxx"  onsubmit="return validateme1();">
			<h1>Modifying Jop</h1><hr>
			<div class="block">
			<fieldset><br>
				<legend class="cap">Jop Information</legend>
				<div class="formdiv" id="jnme2"><label>Jop Name</label><br>
				<input name="name" id="jnme"type="text" value="" required="required" onblur="checkname('jnme');" /><br>
				</div>
				<div class="formdiv">
				<label>Category<span id="err11"></span></label>
				<select id="cat1" name="cat1" style="width:180px;">
				<option selected="selected" value="0">Select Category</option>  
				<option value="ART">Artisan</option>
				<option value="DI">Diary</option>
				<option value="EDU">Education</option>  
				<option value="ENG">Engineer</option>
				<option value="IND">Industrial</option>
				<option value="Mgmnt">Management</option>  
				<option value="MED">Medical</option>  
				</select>
				</div>
			<div class="formdiv">
			<label >Education<span id="err21"></span></label>
			<select id="edu1" name="edu1" style="width:180px;">
				<option selected="selected" value="0">Education Type</option>
				<option value="Secondary">Secondary</option>  
				<option value="Under Graduate">Under Graduate</option>  
				<option value="Graduate">Graduate</option>  
				<option value="Phd">Phd</option>  
				<option value="none">none</option>  
				</select>
			</div>
			<div class="formdiv"><label>Degree</label><br>
				<input name="degree" id="degree" type="text"   /><br>
				</div>
			<div class="formdiv" id="agee2"><label>Age</label><br>
				<input name="age" id="agee" type="text"  onblur="checkage('agee');" /><br><span id="agee3"></span>
				</div>
			<div class="formdiv" id="expp2"><label>Experince (in years)</label><br>
				<input name="exp"id="expp" type="text"  onblur="checkage('expp');" /><span id="expp3"></span><br>
				</div>
			<div class="formdiv"><label>Initial Salary</label><br>
				<input name="Salary" id="salary" type="text"   /><br>
				<br><br>Specification</div><br>
			<div >
			<textarea name="spc" id="spcc" placeholder="Add more information about Your Job hrer" style="height: 80px;width:420px;"></textarea>
				</div>
			</fieldset>
			</div>
			<button id="logb" type="submit" class="form-submit-button-light"> Update    </button>
			</form>	
			</li>
			</ul>
			</div>
		</div>
		<div id="comreg">
			<ul>
			<li>
			<form  method="post" name="postnewjop" id="log1" action="postnewjop.php" onsubmit="return validateme();">
			<h1>Adding New Jop</h1><hr>
			<div class="block">
			<fieldset><br>
				<legend class="cap">Jop Information</legend>
				<div class="formdiv" id="jname2"><label>Jop Name</label><br>
				<input name="name" id="jname"type="text" value="" required="required" onblur="checkname('jname');" /><br>
				</div>
				<div class="formdiv">
				<label>Category<span id="err1"></span></label>
				<select id="cat" name="cat" style="width:180px;">
				<option selected="selected" value="0">Select Category</option>  
				<option value="ART">Artisan</option>
				<option value="DI">Diary</option>
				<option value="EDU">Education</option>  
				<option value="ENG">Engineer</option>
				<option value="IND">Industrial</option>
				<option value="Mgmnt">Management</option>  
				<option value="MED">Medical</option>  
				</select>
				</div>
			<div class="formdiv">
			<label >Education<span id="err2"></span></label>
			<select id="edu" name="edu" style="width:180px;">
				<option selected="selected" value="0">Education Type</option>
				<option value="Secondary">Secondary</option>  
				<option value="Under Graduate">Under Graduate</option>  
				<option value="Graduate">Graduate</option>  
				<option value="Phd">Phd</option>  
				<option value="none">none</option>  
				</select>
			</div>
			<div class="formdiv"><label>Degree</label><br>
				<input name="degree" type="text"   /><br>
				</div>
			<div class="formdiv" id="age2"><label>Age</label><br>
				<input name="age" id="age" type="text"  onblur="checkage('age');" /><br><span id="age3"></span>
				</div>
			<div class="formdiv" id="exp2"><label>Experince (in years)</label><br>
				<input name="exp"id="exp" type="text"  onblur="checkage('exp');" /><span id="exp3"></span><br>
				</div>
			<div class="formdiv"><label>Initial Salary</label><br>
				<input name="Salary" type="text"   /><br>
				<br><br>Specification</div><br>
			<div >
			<textarea name="spc" id="spc" placeholder="Add more information about Your Job hrer" style="height: 80px;width:420px;"></textarea>
				</div>
			</fieldset>
			</div>
			<button id="logb" type="submit" class="form-submit-button-light"> Add    </button>
			</form>	
			</li>
			</ul>
		</div>
		<div id="compreg">
		<ul><li>
			<form  method="post" action="updatecomp.php" id="log1">
			<fieldset><?php $info=$ss->getData();?>
				<legend class="cap">Company Information </legend><hr><br>
				<div class="formdiv" id="cname2"><label>Company Name</label><br>
				<input name="cname1" id="cname" onblur="checkname('cname');" type="text" value="<?php echo $info[1];?>" required="required"   /><br>
				</div>
				<div class="formdiv" id="mobno2"><label>Phone</label><br>
				<input name="mobno1" id="mobno" type="text" value="<?php echo $info[2];?>" required="required" onblur="phonenumber('mobno');" /><br>
				</div>
				<div id="email2"class="formdiv"><label>E-mail</label><br>
				<input name="email1" id="email" type="text" value="<?php echo $info[3];?>" required="required"  onblur="return checkEmail('email','c');"/><br>
				</div>
				<div class="formdiv"><label>Specification</label><br>
				<input name="spc" type="text" value="<?php echo $info[4];?>"   /><br>
				</div>
				<div class="formdiv"><label>Address</label><br>
				<input name="add" type="text" value="<?php echo $info[5];?>" required="required"  /><br>
				</div>
				<div class="formdiv"><label>Password</label><br>
				<input name="pass" type="password" value="" required="required" /><br>
				</div>
			</fieldset>
			<button id="logb" type="submit" class="form-submit-button form-submit-button-light"> Update    </button>
			</form>	
			</li>
		</ul>
		</div>
		</div></div></div>
		<div class="footer"><br/><h1>Copy Write Receved</h1></div>
		
	</body>
</html>