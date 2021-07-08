<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){
if($ulv == 3){





$title = strip_tags($_POST['title']);
$hb    = strip_tags($_POST['hb']);



if(!empty($title)){
	
	//insert_catego
	$insert_into = mysqli_query($connectDB,"INSERT INTO categories 
	                            (hb,title)
								VALUES
								('$hb','$title')
								");
	if($insert_into){ echo 2; }else{ echo 0; }
	
}else{
	echo 0;
}










}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
?>