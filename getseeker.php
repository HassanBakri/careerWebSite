<?php
require_once('mySQL.php');
SESSION_START();
$obj=mySQL::getObj();
$id=$_GET['id'];
$seekerData="select * from seekers where id='$id'";
$seekerData1="select user_email from seekerlogin where user_id='$id'";
$seekerData2="select * from experience where s_id='$id'";
		$seekerData=$obj->makeQuery($seekerData);
		$seekerData=mysqli_fetch_array($seekerData,MYSQLI_ASSOC);
		$seekerData1=$obj->makeQuery($seekerData1);
		$seekerData1=mysqli_fetch_array($seekerData1,MYSQLI_ASSOC);
		$seekerData2=$obj->makeQuery($seekerData2);
		//$seekerData2=mysqli_fetch_array($seekerData2,MYSQLI_ASSOC);
//address  birthdate  collage   computer  date degree  gender  id  Language  name  nationality  phone  phone2   spc university 
		$result="<ul><li>Name           :".$seekerData['name']."</li>
				     <li>Email          :".$seekerData1['user_email']."</li>
					 <li>Birth Date     :".$seekerData['birthdate']."</li>
					 <li>Gender         :".$seekerData['gender']."</li>
					 <li>Nationality    :".$seekerData['nationality']."<img  class='flag ".$seekerData['nationality']."' style='float:center' /></li>
					 <li>phone          :".$seekerData['phone']."</li>
					 <li>phone2         :".$seekerData['phone2']."</li>
					 <li>Address        :".$seekerData['address']."</li>
					 
					 <li>University     :".$seekerData['university']."</li>
					 <li>Collage        :".$seekerData['collage']."</li>
					 <li>Specification  :".$seekerData['spc']."</li>
					 <li>Degree         :".$seekerData['degree']."</li>
					 <li>Date           :".$seekerData['date']."</li>
					 <li>Language       :".$seekerData['Language']."</li>
					 <li>Computer       :".$seekerData['computer']."</li>";
					 $result.="</ul>";
					 //  work_place du position 
					 $expnum=$seekerData2->num_rows;
					if(!($expnum==0)) $result.='<table width="60%"cellspacing="0" cellpadding="2" align="left" border="0" id="data_tbl">
						<thead style="background:linear-gradient(to bottom, rgb(230, 87, 213) 22%,rgb(247, 97, 210) 73%)">
						  <tr>
							<th width="15%">Work Place</th>
							<th width="15%">Duration</th>
							<th width="15%">Position</th>
						  </tr>
						</thead>
						<tbody>';
					 while(		$seekerDataexp=mysqli_fetch_array($seekerData2,MYSQLI_ASSOC))
					 {
					 $result.="<tr><td>".$seekerDataexp['work_place']."</td><td>".$seekerDataexp['du']."</td><td>".$seekerDataexp['position']."</td></tr>";
					 }
					 if(!($expnum==0))$result.= '</tbody></table>';
					 echo $result;
		
?>