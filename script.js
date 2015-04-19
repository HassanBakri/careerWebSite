var page;
$(document).on('click','.next', function(){
	 page=$(".current").text()+1;
	var x=$(".current").next();
	$(".current").removeClass('current');	
	x.addClass('current');
	var dataString="page="+page;
		$.ajax({
		type: "POST",
		url: "pageing.php",
		data: dataString,
		cache: false,
		success: function(result){
		$("#tbl_div").html(result);}
		});	
}) ;  
$(document).on('click','.prev', function(){
page=$(".current").text()-1;
var x=$(".current").prev();
$(".current").removeClass('current');
x.addClass('current');
	var dataString="page="+page;
		$.ajax({
		type: "POST",
		url: "pageing.php",
		data: dataString,
		cache: false,
		success: function(result){
		$("#tbl_div").html(result)
		}});});
 function pagin(x){
 page=x;
	$(".current").removeClass('current');
	$("#pagin_"+page).addClass('current');
	var dataString="page="+page;
		$.ajax({
		type: "POST",
		url: "pageing.php",
		data: dataString,
		cache: false,
		success: function(result){
		$("#tbl_div").html(result)
		}});
}
$(document).on('click','.delrow',function(e){
	var id;
		id = $(this).parent().parent().attr('id').replace(/adv_/,'');
	if(confirm('Do you really want to delete')) {
	var dataString="id="+id;
		$.ajax({
		type: "POST",
		url: "delete.php",
		data: dataString,
		cache: false,
		success: function(result){
		if(result=="success"){
		$("#adv_"+id).slideUp(1000);}
		}});	
	}
});
var tr_id ,id;
//Show input boxes in row when click on update icon
$(document).on('click','.updrow',function(){
	id = $(this).parent().parent().attr('id').replace(/adv_/,'');
	tr_id = $(this).parent().parent().attr('id');
	row=new Array($("#"+tr_id).text());
	row=row[0].toString();
	row=row.split('\n')
	$("#jnme").val(row[1].trim());
	$("#cat1").val(row[2].trim());
	$("#edu1").val(row[4].trim());
	$("#degree").val(row[5].trim());
	$("#agee").val(row[3].trim());
	$("#expp").val(row[6].trim());
	$("#salary").val(row[7].trim());
	$("#spcc").val(row[8].trim());
	$('#upTemp').show();
});
function  updateadv(){
	alert("xxx");
	var dataString="id="+id+"&name="+$("#jnme").val()+"&cat="+$("#cat1").val()+"&edu="+$("#edu1").val()+"&deg="+$("#degree").val()+"&age="+$("#agee").val()+"&exp="+$("#expp").val()+"&sal="+$("#salary").val()+"&spc="+$("#spcc").val();
		$.ajax({
		type: "POST",
		url: "update_adv.php",
		data: dataString,
		cache: false,
		success: function(result){
		if(result=="success"){
		$('#upTemp').slideUp(1000);
		pagin(page);
		}
		else $("#tbl_div").append(result);
		}});	
	}