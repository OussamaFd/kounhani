<?php include"../include/database.php"; include"../information_user.php";
if($login == 999){

$random = function($a, $b) {
    return(
        substr(str_shuffle(('\\`)/|'.
        password_hash(mt_rand(0,999999),
        PASSWORD_DEFAULT).'!*^&~(')),
        $a, $b)
    );
};
$code = ($random(0,5));

$id_bb = intval($_GET['bb']);
$sms = strip_tags($_POST['sms']);





	
	
	$insert_into = mysqli_query($connectDB,"INSERT INTO message
                           (id2,user1,user2,message,status,time)
						   VALUES
						   ('$code','$id_user','$id_bb','$sms','1','".time()."')
						   ");
if($insert_into){ echo'<span style="color:green;">تم إرسال الرسالة بنجاح</span>
                <script>
				    document.getElementById("text_area_").value="";
				</script>
				'; }else{ echo'حدثت مشكلة غير متوقعة!'; }
	
	













}else{ echo "قبل إرسال أي رسالة يجب أن تقوم بتسجيل الدخول"; }
?>