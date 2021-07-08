<?php include"../include/database.php"; include"../information_user.php";


$select_noti = mysqli_query($connectDB,"SELECT * FROM message WHERE user2 = '$id_user' AND status = '1' ");



if(mysqli_num_rows($select_noti) > 0){
	echo'<span style="color:red;">'.mysqli_num_rows($select_noti).'</span>
	<script>
        document.getElementById("avatar__user_").style.border = "1px solid red";
    </script>
	';
}else{
	echo'<span style="color:#404040;">'.mysqli_num_rows($select_noti).'</span>
	<script>
        document.getElementById("avatar__user_").style.border = "1px solid #ccc";
    </script>
	';
}


?>