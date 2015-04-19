<?php
require_once('mySQL.php');

class advertic{
private $obj;
public function __construct() {}
private function total() {
		//SESSION_START();
		$obj=mySQL::getObj();
		$comp_id=$_SESSION['id'];
 		$result = $obj->makeQuery("select count(ad_id) AS total FROM advertice where comp_id='$comp_id'");
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row['total'];
	}
function getTabel($a=0){
			$obj=mySQL::getObj();
			$a=$a*10;
			$b=$a+10;
			$id=$_SESSION['id'];
			$querya="select * from `advertice` where comp_id='$id' LIMIT $a , $b";
			$resulta=$obj->makeQuery($querya);
			$table="";
			if($resulta->num_rows!=0){
			$table='<div id="tbl_div"><table width="90%" cellspacing="0" cellpadding="2" align="center" border="0" id="data_tbl">
			<thead>
			  <tr>
			    <th width="10%">Jop Title</th>
			    <th width="10%">Category</th>
			    <th width="10%">Age</th>
			    <th width="10%">Education</th>
				<th width="10%">Degree</th>
				<th width="10%">Experince</th>
				<th width="10%">Salary</th>
				<th width="10%">specification</th>
				<th width="10%">Action</th>
			  </tr>
			 </thead>
			 <tbody>';$cls=0;
			 foreach ($resulta as $value) {
			$bg = ($cls = !$cls) ? '#ECEEF4' : '#FFFFFF';
			$table .='<tr id="adv_'.$value['ad_id'].'" style="background:'.$bg.'">
			    <td><span class="name">'.$value['jop_name'].' </span></td>
			    <td><span class="Category">'.$value['Category'].'</span></td>
			    <td><span class="age">'.$value['age'].'</span></td>
			    <td><span class="education">'.$value['education'].'</span></td>
				<td><span class="degree">'.$value['degree'].'</span></td>
				<td><span class="experince">'.$value['experince'].'</span></td>
				<td><span class="salary">'.$value['salary'].'</span></td>
				<td><span class="specification">'.$value['specification'].'</span></td>
				<td align="center">
					<img src="edit.png" class="updrow" title="Update"/>&nbsp;
					<img src="delete.png" class="delrow" title="Delete"/>
				</td>
			  </tr>';
		}
		$table .='</tbody></table></div>';
			}
			return $table;
			}
		function ceiling($number, $significance = 1)
		{
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
		}
		public function paginate() {
		$totaln=$this->total();
		if($totaln<=10)return "";
		else {
		echo '<br><br><div class="navi"><a href="javascript:void(0)" class="prev button">Prev</a>';
		$pagenum=$this->ceiling(($totaln/10),1);
		echo "<a href='javascript:void(0)' onclick='pagin(0)'class='pagin current' id='pagin_0'>0</a>";
		for($i=1;$i<$pagenum;$i++){
		echo "<a href='javascript:void(0)'  onclick='pagin(".$i.")'class='pagin' id='pagin_".$i."'>".$i."</a>";
		}
		echo '<a href="javascript:void(0)" class="next button">Next</a></div>';
		}
		}
}
?>