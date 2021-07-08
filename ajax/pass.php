<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){



$real_pass = strip_tags($_POST['real_pass']);
$new_pass = strip_tags($_POST['new_pass']);
$new_pass_again = strip_tags($_POST['new_pass_again']);


$real_pass_md = md5($real_pass);
$new_pass_md  = md5($new_pass);

if(empty($real_pass) OR empty($new_pass) OR empty($new_pass_again)){
	echo'بعض الحقول فارغة!';
}else{
	
	
	$check_pass = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$id_user' AND pass = '$real_pass_md' ");
	if(mysqli_num_rows($check_pass) > 0){
		
		
		if(strlen($new_pass) <= 6){
		    echo'كلمة السر الجديدة يجب أن تكون أكبر من 6 أرقام أو أحرف';
	    }elseif($new_pass != $new_pass_again){
			echo'كلمتا السر غير متطابقتان!';
		}else{
			
			    //Updat_pass
				$update_pass_user = mysqli_query($connectDB,"UPDATE users SET `pass` = '$new_pass_md' WHERE id = '$id_user' ");
				if($update_pass_user){ echo'<span style="color:green;">تم تحديث البيانات بنجاح</span>'; }else{ echo'حدثت مشكلة غير متوقعة'; }
				
		}
		
		
	}else{ echo'كلمة السر الحالية خاطئة!'; }
	
}






}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
?>