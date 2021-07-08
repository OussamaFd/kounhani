<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){
if($ulv == 3){




$id_cat = 0;
if(isset($_POST['id_cat'])){
   $id_cat = mysqli_real_escape_string($connectDB,$_POST['id_cat']);
}

if($id_cat > 0){

	// Check record exists
	$checkRecord = mysqli_query($connectDB,"SELECT * FROM categories WHERE id=".$id_cat);
	$totalrows = mysqli_num_rows($checkRecord);

	if($totalrows > 0){
		// Delete record
		$query = "DELETE FROM categories WHERE id=".$id_cat;
		mysqli_query($connectDB,$query);
		echo 1;
	}else{
        echo 0;
    }
}







}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
?>