<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){
	
	
$finame = $_POST['finame'];
$laname = $_POST['laname'];
$email = $_POST['email'];

if(empty($finame) OR empty($laname) OR empty($email)){
	echo'بعض الحقول فارغة!';
    }elseif(!ctype_alnum($finame)){
		echo'قم بإدخال إسم صحيح بأحرف إنجليزية';
	}elseif(strlen($finame) <= 2 OR strlen($finame) >= 20){
		echo'الإسم غير متواجد';
	}elseif(!ctype_alnum($laname)){
		echo'قم بإدخال الإسم العائلي بأحرف إنجليزية';
	}elseif(strlen($laname) <= 2 OR strlen($laname) >= 20){
		echo'النسب غير متواجد';
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo'قم بإدخال بريد إلكنروني صحيح';
	}else{
	    
		
			
			
			if(empty($_FILES['avatar']['name'])){
				
				//Updat_info
				$update_info_user = mysqli_query($connectDB,"UPDATE users SET
				                                `fname` = '$finame',
												`lname` = '$laname',
												`email` = '$email'
												WHERE id = '$id_user'
												");
				if($update_info_user){ echo'<span style="color:green;">تم تحديث البيانات بنجاح</span>'; }else{ echo'حدثت مشكلة غير متوقعة'; }
				
			}else{
				
				
			$image = $_FILES['avatar'];
			$image_name  = $image['name'];
			$image_tmp   = $image['tmp_name'];
			$image_size  = $image['size'];
			$image_error = $image['error'];
			$image_exe = explode('.' , $image_name);
			$image_exe = strtolower(end($image_exe));
			$allowd = array('png','jpg','jpeg');
			if(in_array($image_exe , $allowd )){
				if($image_error === 0){
					if($image_size <= 3000000){
						$new_name = uniqid(true) . '.' . $image_exe;        
						$image_dir = '../image/avatar/' . $new_name;
					    $image_db = 'image/avatar/' . $new_name;
						if(move_uploaded_file($image_tmp , $image_dir)){
							
						            
						        //Updat_info
				$update_info_user = mysqli_query($connectDB,"UPDATE users SET
				                                `fname` = '$finame',
												`lname` = '$laname',
												`email` = '$email',
												`avatar` = '$image_db'
												WHERE id = '$id_user'
												");
				if($update_info_user){ echo'<span style="color:green;">تم تحديث البيانات بنجاح</span>'; }else{ echo'حدثت مشكلة غير متوقعة'; }
								
						    
						}else{echo' عدرا حدث خطأأثناء نقل الصورة إلى الملف';}
					}else{echo' حجم الصورة كبير جدا <br /> يجب أن لا يتعدى 2 MB';}
				}else{echo' عدرا حدث خطأ غير متوقع أثناء رفع الصورة ';}
			}else{ echo'قم باختيار صورة تكون بننسيق  png , jpg , jpeg'; }
			
			
			}
			
			
		
		
	}
	
}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
?>