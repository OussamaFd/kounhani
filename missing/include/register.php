<?php session_start(); include"database.php";


$email_to_log = strip_tags($_POST['email_to_log']);
$pass__to_log = strip_tags($_POST['pass__to_log']);

$passMD5 = md5($pass__to_log);


	if(empty($email_to_log) OR empty($pass__to_log)){
		echo'بعض الحقول فارغة!';
	}elseif(!filter_var($email_to_log,FILTER_VALIDATE_EMAIL)){
		echo'البريد الإلكنروني غير صحيح';
	}else{
	
		
		$select_db_to_log = mysqli_query($connectDB,"SELECT * FROM users WHERE email = '$email_to_log' AND pass = '$passMD5' ");
		if(mysqli_num_rows($select_db_to_log) == 0){
			echo'البيانات خاطئة!';
		}else{
			
			
			$fetch_ = mysqli_fetch_assoc($select_db_to_log);
			$_SESSION['id_user'] = $fetch_['id'];
			$_SESSION['login'] = '999';
			
			echo'<span style="color:green;">تم تسجيل الدخول بنجاح</span> 
			    <script>
			        document.getElementById("firstname").value="";
					document.getElementById("lastname").value="";
					document.getElementById("email").value="";
					document.getElementById("pass").value="";
			    </script>
			<meta http-equiv="refresh" content="1" />	
			';
			
		}
		
		
	
	}


?>