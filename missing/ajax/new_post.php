<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){





$title  = strip_tags($_POST['title']);
$category = strip_tags($_POST['category']);
$city   = strip_tags($_POST['city']);
$description = strip_tags($_POST['description']);

$date_ = date('Y/m/d');



    if(empty($title)){
		echo'قم بإدخال العنوان';
	}elseif($category == 0){
		echo'قم باختيار التصنيف';
	}elseif($city == 0){
		echo'قم باختيار المدينة';
	}elseif(empty($description)){
		echo'قم بإدخال الوصف';
	}else{
		
		
		if(!empty($_FILES['image']['name'])){
			
			$image = $_FILES['image'];
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
						$image_dir = '../image/img/' . $new_name;
					    $image_db = 'image/img/' . $new_name;
						if(move_uploaded_file($image_tmp , $image_dir)){
							
						            
						        //UPDATE DB
								$insert_post = mysqli_query($connectDB,"INSERT INTO post
								                            (title,category,city,description,image,user,active,date_)
															VALUES
															('$title','$category','$city','$description','$image_db','$id_user','1','$date_')
															");
								if($insert_post){ echo'<span style="color:green;">تم حفظ البيانات بنجاح</span>'; }else{ echo'حدثت مشكلة غير متوقعة!'; }
								
						    
						}else{echo' عدرا حدث خطأأثناء نقل الصورة إلى الملف';}
					}else{echo' حجم الصورة كبير جدا <br /> يجب أن لا يتعدى 2 MB';}
				}else{echo' عدرا حدث خطأ غير متوقع أثناء رفع الصورة ';}
			}else{ echo'قم باختيار صورة تكون بننسيق  png , jpg , jpeg'; }
			
		}else{ echo'قم باختيار صورة'; }
		
		
		
	}








}else{ echo "قم بتسجيل الدخول أولاّ"; }
?>