function viewads()
{
document.getElementById("rform").style.display="none";
document.getElementById("compsrvs").style.display="none";
document.getElementById("leftcol2").style.display="none";
document.getElementById("leftcol1").style.display="block";
document.getElementById("compreg").style.display="none";
document.getElementById("masadv").style.display="block";
}
function viewr()
{
document.getElementById("rform").style.display="block";
document.getElementById("compsrvs").style.display="none";
document.getElementById("leftcol2").style.display="none";
document.getElementById("leftcol1").style.display="none";
document.getElementById("compreg").style.display="none";
document.getElementById("masadv").style.display="none";
}
function viewcom()
{
document.getElementById("rform").style.display="none";
document.getElementById("leftcol1").style.display="none";
document.getElementById("compsrvs").style.display="block";
document.getElementById("leftcol2").style.display="block";
document.getElementById("masadv").style.display="none";
}
var toggle1;
function viewelm(toggle)
{
if(toggle){document.getElementById("compreg").style.display="none";
		document.getElementById("compsrvs").style.display="block";
		document.getElementById("masadv").style.display="none";
		}
else{document.getElementById("compsrvs").style.display="none";
		document.getElementById("compreg").style.display="block";
		document.getElementById("masadv").style.display="none";}
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
//window.onload=swapImage;

function validate()
{
//if((x.elements[0].value=="hassan")&&(x.elements[1].value=="bakri")){
//localStorage.setItem("leggedin","true");
//delgpage();
//return true;
var x=document.forms["loginform1"];
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;
if (!filter.test(x.elements[0].value)) { printerr();return false;}
else{
var pfilter= /^([a-zA-Z0-9ْا-ي])+$/;
if (!pfilter.test(x.elements[1].value)) { printerr();return false;}
else return true;
}
}
function validatec()
{
var x=document.forms["loginform"];
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;
if (!filter.test(x.elements[0].value)) { printerr();return false;}
else{
var pfilter= /^([a-zA-Z0-9ْا-ي])+$/;
if (!pfilter.test(x.elements[1].value)) { printerr();return false;}
else return true;
}
}

function printerr()
{
document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	setTimeout(function(){document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'},2000);
}
function notfy()
{
document.getElementById('light').innerHTML="All Done !, Best Wishes To You"
document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	setTimeout(function(){document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'},2000);
}


function logout()
{
localStorage.setItem("leggedin",false);
}
/*function companylogin()
{
var x=document.forms["cloginform1"];
if((x.elements[0].value=="ali")&&(x.elements[1].value=="ahmed")){
localStorage.setItem("isCompany","true");
delgpage();
return true;}
else if((x.elements[0].value=="hassan")&&(x.elements[1].value=="ali")){
localStorage.setItem("isCompany","true");
delgpage();
return true;
}
else {localStorage.setItem("isCompany","false");printerr();return false;}

//alert(document.forms["loginform"]["Username"].value);
//return false;
} */
function companychecklogin(){
var x =localStorage.getItem("isCompany");
	if(x=="true"){
	document.getElementById("compsrvs").innerHTML='You Are Currently logged As Company !';
	document.getElementById("comph").innerHTML='<a href="company.php" >Company Home</a>'
	}
}
function companylogout(){localStorage.setItem("isCompany",false);}

function checkEmail(idn ,type) {

    var email = document.getElementById(idn);
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/;

    if (!filter.test(email.value)) {
	document.getElementById(idn.concat("2")).style.backgroundColor="#FF7F50";
    document.getElementById(idn).select();return false;
    return false;
 }else{document.getElementById(idn+"2").style.backgroundColor="#FFFFFF";return checkava(email.value , type,idn);}
 }
 /*function checkAge(){
 var email = document.getElementById(idn);
 }*/
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

function hideshow(){
document.getElementById('light').style.display='none';
document.getElementById('fade').style.display='none'
}
function checkname(idn) {
    var email = document.getElementById(idn);
    var filter = /^([a-zA-Z0-9ْا-ي])+$/;
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
/*function gentable(){
//chrome --allow-file-access-from-files
xmlhttp= new XMLHttpRequest();
var xmlDoc = new DOMParser().parseFromString(xmlhttp.responseText,'text/xml');
//xmlDoc=xmlhttp.responseXML; 
document.innerHTML="<table border='0'>";
var x=xmlDoc.getElementsByTagName("show");
for (i=0;i<x.length;i++)
  { 
  document.getElementById("viewz").innerHTML="<tr>";
  document.getElementById("viewz").innerHTML=x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
  document.getElementById("viewz").innerHTML="</tr><tr>";alert(innerHTML=x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue);
  document.getElementById("viewz").innerHTML=x[i].getElementsByTagName("camp")[0].childNodes[0].nodeValue;
  document.getElementById("viewz").innerHTML="</tr><tr>";
  document.getElementById("viewz").innerHTML=x[i].getElementsByTagName("cat")[0].childNodes[0].nodeValue;
  document.getElementById("viewz").innerHTML="</tr><tr>";
  document.getElementById("viewz").innerHTMLx[i].getElementsByTagName("exp")[0].childNodes[0].nodeValue;
  document.getElementById("viewz").innerHTML="</tr>";
  }
document.getElementById("viewz").innerHTML="</table>";
xmlhttp.open("GET","file:///C:/jopoffer.xml",false);
xmlhttp.send();
}*/