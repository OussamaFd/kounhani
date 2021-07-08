<?php include"database.php";

$firstname = strip_tags($_POST['firstname']);
$lastname = strip_tags($_POST['lastname']);
$email = strip_tags($_POST['email']);
$pass = strip_tags($_POST['pass']);

$password = md5($pass);
$date_register = date("Y/m/d");

	if(empty($firstname) OR empty($lastname) OR empty($email) OR empty($pass)){
		echo'بعض الحقول فارغة!';
	}elseif(!ctype_alnum($firstname)){
		echo'قم بإدخال إسم صحيح بأحرف إنجليزية';
	}elseif(strlen($firstname) <= 2 OR strlen($firstname) >= 20){
		echo'الإسم غير متواجد';
	}elseif(!ctype_alnum($lastname)){
		echo'قم بإدخال الإسم العائلي بأحرف إنجليزية';
	}elseif(strlen($lastname) <= 2 OR strlen($lastname) >= 20){
		echo'النسب غير متواجد';
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo'قم بإدخال بريد إلكنروني صحيح';
	}elseif(strlen($pass) <= 6){
		echo'كلمة السر يجب أن تكون أكبر من 6 أرقام أو أحرف';
	}else{
		
		
		//check if email allready add
		$select_email = mysqli_query($connectDB,"SELECT * FROM users WHERE email = '$email' ");
		if(mysqli_num_rows($select_email) > 0){
			echo'البريد الإلكتروني مسجل من قبل';
		}else{
			
			//insert_db_user
			$inser_db = mysqli_query($connectDB,"INSERT INTO users 
			                        (fname,lname,email,pass,date_register,active,ulv,avatar)
									VALUES
									('$firstname','$lastname','$email','$password','$date_register','0','0','image/avatar/avatar.png')
									");
			if($inser_db){ echo'<span style="color:green;">تم تسجيل عضويتك بنجاح <br/> قم بتسجيل الدخول</span> 
			    <script>
			        document.getElementById("firstname").value="";
					document.getElementById("lastname").value="";
					document.getElementById("email").value="";
					document.getElementById("pass").value="";
			    </script>';
			}else{ echo'حدثت مشكلة غير متوقعة'; }
		}
		
	}
	
	
?>