function viewr(divn)
{
document.getElementById("compreg").style.display="block";
document.getElementById("compsrvs").style.display="none";
document.getElementById("leftcol2").style.display="none";
document.getElementById("leftcol1").style.display="none";
document.getElementById("apps").style.display="none";
document.getElementById("pdata").style.display="none";
}
function viewcom(var0)
{
if(var0){
document.getElementById("leftcol1").style.display="none";
document.getElementById("leftcol2").style.display="block";
document.getElementById("compsrvs").style.display="block";
document.getElementById("compreg").style.display="none";
document.getElementById("apps").style.display="none";
document.getElementById("pdata").style.display="none";
}
else{
document.getElementById("leftcol2").style.display="none";
document.getElementById("compsrvs").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("leftcol1").style.display="block";
document.getElementById("apps").style.display="none";
document.getElementById("pdata").style.display="none";
}
}
function modinf(){
document.getElementById("leftcol2").style.display="none";
document.getElementById("compsrvs").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("leftcol1").style.display="block";
document.getElementById("apps").style.display="none";
document.getElementById("pdata").style.display="block";
}
function vapp(){
document.getElementById("leftcol2").style.display="none";
document.getElementById("compsrvs").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("leftcol1").style.display="block";
document.getElementById("apps").style.display="block";
document.getElementById("pdata").style.display="none";
}
var toggle=true;
function viewelm(toggle)
{
if(toggle){document.getElementById("compreg").style.display="none";
		document.getElementById("compsrvs").style.display="block";
		}
else{document.getElementById("compsrvs").style.display="none";
		document.getElementById("compreg").style.display="block";}
}
/*var i = 0;
var path = new Array();
 
// LIST OF IMAGES
path[0] = "l1.png";
path[1] = "l2.png";
path[2] = "l3.png";

function swapImage()
{
   document.slide.src = path[i];
   if(i < path.length - 1) i++; else i = 0;
   setTimeout("swapImage()",3000);
}

function validate()
{
var x=document.forms["loginform"];
if((x.elements[0].value=="hassan")&&(x.elements[1].value=="bakri"))
return true;
else if((x.elements[0].value=="mazin")&&(x.elements[1].value=="krar"))
return true;
else return false;*/

//alert(document.forms["loginform"]["Username"].value);
//return false;
//}
function phonenumber(idn)  
	{  
	  var phoneRegex = new RegExp( /^09\d{8}$/);
	  var phoneNum = document.getElementById(idn).value;
	  if(!(phoneRegex.test(phoneNum))) {
		document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
		document.getElementById(idn).select();return false;
	  } else {
		document.getElementById(idn.concat("2")).style.backgroundColor="#FFFFFF";return true
	  }
	}
function checkEmail(idn,type) {

    var email = document.getElementById(idn);
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;

    if (!filter.test(email.value)) {
	document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
    document.getElementById(idn).select();return false;
    return false;
 }else{document.getElementById(idn+"2").style.backgroundColor="#FFFFFF";return checkava(email.value , type,idn);}
 }
 function printerr()
{
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	setTimeout(function(){document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'},1000);
}
function logout()
{
localStorage.setItem("leggedin",false);localStorage.setItem("isCompany",false);
}

function companychecklogin(){
var x =localStorage.getItem("isCompany");
	if(x=="true"){
	document.getElementById("compsrvs").innerHTML='You Are Currently logged As Company ! <br> <a href="logout.php" onclick="companylogout();viewcom();">Logout</a>';
	document.getElementById("comph").innerHTML='<a href="company.php" >Company Home</a>'
	}
}
function companylogout(){localStorage.setItem("isCompany",false);}
function checkname(idn) {

    var email = document.getElementById(idn);
    var filter = /^([a-zA-Z0-9ا-ي])+$/;

    if (!filter.test(email.value)) {
	document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
    document.getElementById(idn).select();return false;
    return false;
 }else{document.getElementById(idn+"2").style.backgroundColor="#FFFFFF";return true;}
 }
  function validatess(){
 if(document.getElementById('barthdate').value==null ||document.getElementById('barthdate').value==""){document.getElementById('rr').style.backgroundColor="#FF7F50"; return false;}else{document.getElementById('rr').style.backgroundColor="#FFF";}
 if(!document.getElementsByName("sex")[0].checked && !document.getElementsByName("sex")[1].checked){document.getElementById('gender').style.backgroundColor="#FF7F50";return false;}else{document.getElementById('gender').style.backgroundColor="#FFF"; return true;}
  }