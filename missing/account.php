<?php include"include/database.php"; include"information_user.php"; include"siteinfo.php";


if($login == 999){

?>
<!DOCTYPE html>
<html>
    <head>
	    <title><?php echo $firstname.' '.$lastname.' | '.$title_; ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style/admin.css" />
		<link rel="icon" type="image/x-icon" href="<?php echo $logo_; ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"/>
		<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <meta name="description" content="<?php echo $description_; ?>" />
        <meta name="keywords" content="<?php echo $keywords_; ?>" />
        <meta name="author" content="<?php echo $firstname.' '.$lastname; ?>" />
	</head>
<body>


<header>
    <div class="header">
	    
		<?php
		if($login == 999){
		echo'
			<!--______USER INFO____-->
			
			<div class="user_info">
			    <a id="ptn" class="btn_drop_down"><i class="fas fa-align-justify"></i></a>
			    <img class="btn_LOGIN_info" src="'.$avatar.'" alt="'.$firstname.' '.$lastname.'" id="avatar__user_" />
				<p class="btn_LOGIN_info">'.$firstname.' '.$lastname.'</p>
			</div>
		';
		}else{
		echo'
			<!--______LINKS TO LOGIN____-->
			<div class="links">
			    <ul>
				    <li><a id="ptn" class="btn_drop_down"><i class="fas fa-align-justify"></i></a></li>
					<li><a id="log_1" ><i class="fas fa-sign-in-alt"></i> دخول </a></li>
					<li><a id="log_2"><i class="fas fa-user-plus"></i> حساب جديد </a></li>
				</ul>
			</div>
		';
		}
		?>
		
		<!--______LOGO SITE____-->
		<div class="logo">
		    <img src="<?php echo $logo_; ?>" alt="logo missing" onclick="window.location.href='index.php'" />
		</div>
		
	</div>
</header>
<?php
include"include/dropdown.php";
?>
<div style="clear:both;"></div><br/><br/><br/>


<style>
.div_info_user{width:50%;background:#fff;margin:auto;padding:10px;}
.div_info_user #title{text-align:center;color:#77acf1;font-weight:bold;}
.div_info_user table tr td p{font-weight:;font-size:13px;}
.div_info_user table tr td input{width:90%;padding:0px 5px;outline:none;}

.div_info_user .img_BD{width:95px;height:95px;position:relative;}
.div_info_user .img_BD img{width:90px;height:90px;border:1px solid #ccc;border-radius:50%;}
.div_info_user .img_BD #label{position:absolute;top:0px;left:0px;background:rgba(0,0,0,0.3);border:1px solid #ccc;padding:5px;color:#fff;cursor:pointer;border-radius:50%;font-family:normal;}
.div_info_user .img_BD:hover #label{background:rgba(0,0,0,0.8);}

.div_info_user table tr td button{border:1px solid #000099;padding:0px 25px;cursor:pointer;background:#000099;font-weight:bold;color:#fff;}
.div_info_user table tr td button:hover{border:1px solid #000066;background:#000066;}
.div_info_user table tr td #message_{color:red;font-size:13px;}

.div_info_user table tr td #message_pass{color:red;font-size:13px;}
#butt_pass{color:#ccc;font-weight:bold;cursor:pointer;}
#butt_pass:hover{text-decoration:underline;}
.form_pass{display:none;}

@media only screen and (max-width: 768px) {
	.div_info_user{width:95%;}
}
@media only screen and (max-width: 600px) {
	
}
</style>
<script>
$(document).ready(function(){
	
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}


$("#butt_pass").click(function(){
	$(".form_pass").show(200);
});

});
</script>

<div class="div_info_user"><p id="title">تعديل البيانات</p><hr/><br/>
    <form id="form_edit_info_user" enctype="multipart/form-data">
	<table width="100%" border="0" cellspacing="5px">
	    <tr>
		    <td><p>الصورة الرمزية</p></td>
			<td>
			    <div class="img_BD">
			        <img  id="blah" src="<?php echo $avatar; ?>" />
					
					<input name="avatar" accept="image/*" type='file' id="imgInp" hidden />
					<label for="imgInp" id="label"><i class="fas fa-image"></i></label>
			    </div>
			</td>
		</tr>
		<tr>
		    <td><p>الإسم الشخصي</p></td>
			<td><input name="finame" type="text" placeholder="الإسم الشخصي" value="<?php echo $firstname; ?>" /></td>
		</tr>
		<tr>
		    <td><p>الإسم العائلي</p></td>
			<td><input name="laname" type="text" placeholder="الإسم العائلي" value="<?php echo $lastname; ?>" /></td>
		</tr>
		<tr>
		    <td><p>البريد الإلكتروني</p></td>
			<td><input name="email" type="text" placeholder="البريد الإلكتروني" value="<?php echo $email; ?>" /></td>
		</tr>
		<tr>
		    <td colspan="2"><button id="button_save_info" type="submit">حفظ البيانات</button> <span id="message_"></span> </td>
		</tr>
		
		<tr><td colspan="2"><br/></td></tr>
		<tr><td colspan="2" align="center"><p id="butt_pass">تعيين كلمة السر جديدة</p></td></tr>
		
	</table>
	</form>
	
	
	
	
	<form id="form_edit_pass" class="form_pass">
	<table width="100%" border="0" cellspacing="5px">
		<tr>
		    <td><p>كلمة السر الحالية</p></td>
			<td><input name="real_pass" type="password" placeholder="كلمة السر الحالية" /></td>
		</tr>
		<tr>
		    <td><p>كلمة السر الجديدة</p></td>
			<td><input name="new_pass" type="password" placeholder="كلمة السر الجديدة" /></td>
		</tr>
		<tr>
		    <td><p>إعادة كلمة السر الجديدة</p></td>
			<td><input name="new_pass_again" type="password" placeholder="إعادة كلمة السر الجديدة" /></td>
		</tr>
		<tr>
		    <td colspan="2"><button id="button_save_pass" type="submit">حفظ كلمة السر</button> <span id="message_pass"></span> </td>
		</tr>
		
	</table>
	</form>
	
</div>
<script>
$(document).ready(function(){
	$("#form_edit_info_user").submit(function(){
		var serialize = new FormData($("#form_edit_info_user")[0]);
		
		$.ajax({
			type:'POST',
			url:'ajax/userinfo.php',
			data:serialize,
			contentType: false,
            processData: false,
			beforeSend: function(){
				$("#button_save_info").css({"cursor":"wait"});
			},
			success: function(data){
				$("#message_").html(data);
			$("#button_save_info").css({"cursor":"pointer"});
			},
			error: function(){
				alert("Error:");
			}
		});
		
		return false;
	});
});
</script>


<script>
$(document).ready(function(){
	$("#form_edit_pass").submit(function(){
		var serialize = new FormData($("#form_edit_pass")[0]);
		
		$.ajax({
			type:'POST',
			url:'ajax/pass.php',
			data:serialize,
			contentType: false,
            processData: false,
			beforeSend: function(){
				$("#button_save_pass").css({"cursor":"wait"});
			},
			success: function(data){
				$("#message_pass").html(data);
			$("#button_save_pass").css({"cursor":"pointer"});
			},
			error: function(){
				alert("Error:");
			}
		});
		
		return false;
	});
});
</script>




<div style="clear:both;"></div><br/><br/><br/>
<!--JAVASCRIPT FILES-->
<script src="style/main.js"></script>
</body>
</html>
<?php
}else{ header("Location: index.php"); }
?>