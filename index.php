<?php 
include("db.php");
if(isset($_REQUEST['upload'])){
	$imageName=$_FILES['user_files']['name'];
	//print_r($imageName);
	$imagetempname=$_FILES["user_files"]["tmp_name"];
	//print_r($imagetempname);
	$checkcount=count($imageName);
	if($checkcount>1){
		$image=implode(',',$imageName);
	}else{
		$imagesplit=$_FILES['user_files']["name"];
		$image=$imagesplit[0];
	}
	//image folder name
	$path = "image/";
	
	//insert image query
	//echo " insert into Image (imageName) value('$image')";exit();
	$insertQuery=mysql_query(" insert into Image (imageName) value('$image')")or die(mysql_error());
	
	foreach($_FILES['user_files']["name"] as $key =>$value){
	//echo $key;
	//print_r($_FILES["user_files"]["tmp_name"][$key]);echo"<br />";
	
		move_uploaded_file($_FILES["user_files"]["tmp_name"][$key],$path.basename($value));
	}
}	
?>
<script type="text/javascript" language="javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".add").click(function() {
			$('<div style="padding-top:10px;"><input class="files" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" style="color:red;">Remove</span></div>').appendTo(".contents");
		});
		$('.contents').on('click', '.rem', function() {
			$(this).parent("div").remove();
		});

	});
</script>
	<form method="post" action="" enctype="multipart/form-data">
	<fieldset>
	<h3 class="panel-title">Upload Multiple Image</h3>
	</div>
	
		<table cellpadding="0" cellspacing="0" border="0">
			<tr style="padding:5px;">
				<td ><input class="files" name="user_files[]" type="file" ></td>
				<td><span><a href="javascript:void(0);" class="add" >Add More</a></span></td>
			</tr>
			<tr >
				
			</tr>
		</table>
	
		<div class="contents"></div>
		<div class="height10"></div><br />
		<input type="submit" name="upload" value="Upload" style="background-color:#CCCCCC; color:#000000; padding:5px 10px; border-radius:10px;">
	</fieldset>
	</form>