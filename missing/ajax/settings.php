<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){
if($ulv == 3){
	
	
$title       = strip_tags($_POST['title']);
$description = strip_tags($_POST['description']);
$keywords    = strip_tags($_POST['keywords']);
$copyright   = strip_tags($_POST['copyright']);
$email       = strip_tags($_POST['email']);
$number      = strip_tags($_POST['number']);
$facebook    = htmlentities($_POST['facebook']);
$instagram   = htmlentities($_POST['instagram']);
$youtube     = htmlentities($_POST['youtube']);



if(!empty($title) AND !empty($description) AND !empty($keywords) AND !empty($copyright) AND !empty($email) AND !empty($number) AND !empty($facebook) AND !empty($instagram) AND !empty($youtube)){
	
	
	if(!empty($_FILES['logo']['name'])){
		
		
		$image = $_FILES['logo'];
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
							
						            
						        //UPDATE DB
								$UPDATE_DB = mysqli_query($connectDB,"UPDATE settings SET
								                        `title`       = '$title',
														`description` = '$description',
														`keywords`    = '$keywords',
														`copyright`   = '$copyright',
														`email`       = '$email',
														`number`      = '$number',
														`facebook`    = '$facebook',
														`instagram`   = '$instagram',
														`youtube`     = '$youtube',
														`logo`        = '$image_db'
														");
								if($UPDATE_DB){ echo'<span style="color:green;">تم تحديث البيانات بنجاح</span>'; }else{ echo'حدثت مشكلة غير متوقعة'; }
								
						    
						}else{echo' عدرا حدث خطأأثناء نقل الصورة إلى الملف';}
					}else{echo' حجم الصورة كبير جدا <br /> يجب أن لا يتعدى 2 MB';}
				}else{echo' عدرا حدث خطأ غير متوقع أثناء رفع الصورة ';}
			}else{ echo'قم باختيار صورة تكون بننسيق  png , jpg , jpeg'; }
			
		
	}else{ 
                                //UPDATE DB
								$UPDATE_DB = mysqli_query($connectDB,"UPDATE settings SET
								                        `title`       = '$title',
														`description` = '$description',
														`keywords`    = '$keywords',
														`copyright`   = '$copyright',
														`email`       = '$email',
														`number`      = '$number',
														`facebook`    = '$facebook',
														`instagram`   = '$instagram',
														`youtube`     = '$youtube'
														");
								if($UPDATE_DB){ echo'<span style="color:green;">تم تحديث البيانات بنجاح</span>'; }else{ echo'حدثت مشكلة غير متوقعة'; }
	}
	
	
}else{ echo'بعض الحقول فارغة!'; }







}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
}else{ echo "<meta http-equiv='refresh' content='0 url=index.php' />"; }
?>