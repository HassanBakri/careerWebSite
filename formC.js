function viewapp()
{
document.getElementById("comreg").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("rform").style.display="none";
document.getElementById("ads").style.display="none";
document.getElementById("apps").style.display="block";
}
function viewads()
{
document.getElementById("comreg").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("rform").style.display="none";
document.getElementById("apps").style.display="none";
document.getElementById("ads").style.display="block";
}
function viewcom()
{
document.getElementById("rform").style.display="none";
document.getElementById("apps").style.display="none";
document.getElementById("ads").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("comreg").style.display="block";
}
function edinfo()
{
document.getElementById("rform").style.display="none";
document.getElementById("comreg").style.display="none";
document.getElementById("apps").style.display="none";
document.getElementById("ads").style.display="none";
document.getElementById("compreg").style.display="block";
}
function viewr()
{
document.getElementById("comreg").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("apps").style.display="none";
document.getElementById("ads").style.display="none";
document.getElementById("rform").style.display="block";
}
/*var toggle=true;
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
}*/
function companychecklogin(){
//var x =localStorage.getItem("isCompany");
	//if(x=="false"){
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	/*document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'*/
	//}
}
function printerr()
{
document.getElementById('light1').style.display='block';
	document.getElementById('fade1').style.display='block';
	setTimeout(function(){document.getElementById('light1').style.display='none';document.getElementById('fade1').style.display='none'},1000);
}

function validates()
{
var x=document.forms["sloginform"];
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;
if (!filter.test(x.elements[0].value)) { printerr();return false;}
else{
var pfilter= /^([a-zA-Z0-9ْا-ي])+$/;
if (!pfilter.test(x.elements[1].value)) { printerr();return false;}
else return true;
}
}
function validate()
{
var x=document.forms["loginform1"];
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;
if (!filter.test(x.elements[0].value)) { printerr();return false;}
else{
var pfilter= /^([a-zA-Z0-9ْا-ي])+$/;
if (!pfilter.test(x.elements[1].value)) { printerr();return false;}
else return true;
}
}

//alert(document.forms["loginform"]["Username"].value);
//return false;

function phonenumber(idn)  
	{  
	  var phoneRegex = new RegExp( /^09\d{8}$/);
	  var phoneNum = document.getElementById(idn).value;
	  if(!(phoneRegex.test(phoneNum))) {
		document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
		document.getElementById(idn).focus();return false;
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
 }else{document.getElementById(idn+"2").style.backgroundColor="#FFFFFF";return  checkava(email.value , type,idn);}
 }
function companylogout(){localStorage.setItem("isCompany",false);}
function checkname(idn) {

    var email = document.getElementById(idn);
    var filter =  /^([a-zA-Z0-9\s])+$/;

    if (!filter.test(email.value)) {
	document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
    document.getElementById(idn).select();return false;
    return false;
 }else{document.getElementById(idn+"2").style.backgroundColor="#FFFFFF";return true;}
 }
 function checkage(idn) {

    var age = document.getElementById(idn);
    var filter =  /^([0-9])+$/;

    if (!filter.test(age.value)) {
	document.getElementById(idn.concat("3")).innerHTML="Must be Positive Number"
	document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
    document.getElementById(idn).select();return false;
    return false;
 }else{document.getElementById(idn+"2").style.backgroundColor="#FFFFFF";
 document.getElementById(idn.concat("3")).innerHTML="";
 return true;}
 }
 function validateme()
 {
 if(document.getElementById('cat').value==0){	document.getElementById("err1").innerHTML="Make Selection here ";return false;}
 if(document.getElementById('edu').value==0){	document.getElementById("err2").innerHTML="Make Selection here ";return false;}
 else{return true;	}
 }
 function validateme1()
 {
 if(document.getElementById('cat1').value==0){	document.getElementById("err11").innerHTML="Make Selection here ";return false;}
 if(document.getElementById('edu1').value==0){	document.getElementById("err21").innerHTML="Make Selection here ";return false;}
 else{ updateadv();	return false;}
 }
function companylogout(){localStorage.setItem("isCompany",false);}

//alert(document.forms["loginform"]["Username"].value);
//return false;
