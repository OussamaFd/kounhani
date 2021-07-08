<?php  include "../include/database.php";

$idX = 0;
if(isset($_POST['idX'])){
   $idX = mysqli_real_escape_string($connectDB,$_POST['idX']);
}

if($idX > 0){

	// Check record exists
	$checkRecord = mysqli_query($connectDB,"SELECT * FROM users WHERE id=".$idX);
	$totalrows = mysqli_num_rows($checkRecord);

	if($totalrows > 0){
		// Delete record
		$query = "DELETE FROM users WHERE id=".$idX;
		mysqli_query($connectDB,$query);
		echo 1;
	}else{
        echo 0;
    }
}


?>