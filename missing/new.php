<?php include"include/database.php"; include"information_user.php"; include"siteinfo.php";
if($login == 999){
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>إضافة خبر جديد |<?php echo $title_; ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link rel="icon" type="image/x-icon" href="<?php echo $logo_; ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"/>
		<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <meta name="description" content="<?php echo $description_; ?>" />
        <meta name="keywords" content="<?php echo $keywords_; ?>" />
        <meta name="author" content="" />
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
		    <button title="إضافة خبر جديد"><i class="fas fa-plus" onclick="window.location.href='new.php'"></i></button>
		    <img src="<?php echo $logo_; ?>" alt="logo missing" onclick="window.location.href='index.php'" />
		</div>
		
	</div>
</header>
<?php
include"include/dropdown.php";
?>
<div style="clear:both;"></div><br/><br/><br/>



<style>
.cont__ainer{width:50%;margin:auto;background:#fff;box-shadow:0px 0px 10px #ccc;padding:5px;padding-bottom:15px;}
.cont__ainer #title{font-weight:bold;font-size:14px;cursor:context-menu;}
.cont__ainer #id1{padding:5px;outline:none;margin:10px 0px;border:1px solid #ccc;background:#f7f7f7;cursor:pointer;}
.cont__ainer input{width:98.5%;}
.cont__ainer select{width:100%;}
.cont__ainer textarea{max-width:98.5%;min-width:98.5%;min-height:60px;}

.cont__ainer #label{padding:10px;margin:10px 0px;border:1px solid #ccc;background:#f7f7f7;cursor:pointer;border-radius:50%;font-family:normal;}
.cont__ainer #img{max-width:99.5%;min-width:99.5%;max-height:500px;margin:10px 0px;border:1px solid #ccc;background:#f7f7f7;cursor:pointer;}
.cont__ainer button{padding:0px 5px;outline:none;margin:10px 0px;border:1px solid #000099;background:#000099;cursor:pointer;font-weight:bold;color:#fff;}
.cont__ainer #mess__V{font-weight:normal;font-size:14px;cursor:context-menu;color:#ff8080;}

@media only screen and (max-width: 768px) {
	.cont__ainer{width:95%;}
	.cont__ainer input{width:96.5%;}
    .cont__ainer select{width:99%;}
    .cont__ainer textarea{max-width:96.5%;min-width:96.5%;min-height:60px;}
}

@media only screen and (max-width: 600px) {
	
}
</style>
<script>
$(document).ready(function(){
	
file_V.onchange = evt => {
  const [file] = file_V.files
  if (file) {
    img.src = URL.createObjectURL(file)
  }
}

});
</script>
<div class="cont__ainer"><p id="title">إضافة خبر جديد</p><hr/><br/>
    
	<form id="new_post">
	<div class="div">
	    <input id="id1" name="title" type="text" placeholder="العنوان" />
		
		<select id="id1" name="category">
		    <option value="0">التصنيف</option>
			<?php
			$select_city1 = mysqli_query($connectDB,"SELECT * FROM categories WHERE hb = '0' ");
			while($foo1 = mysqli_fetch_assoc($select_city1)){
			    echo'<option value="'.$foo1['id'].'">'.$foo1['title'].'</option>';
			}
			?>
		</select>
		
		<select id="id1" name="city">
		    <option value="0">المدينة</option>
			<?php
			$select_city = mysqli_query($connectDB,"SELECT * FROM categories WHERE hb = '1' ");
			while($foo = mysqli_fetch_assoc($select_city)){
			    echo'<option value="'.$foo['id'].'">'.$foo['title'].'</option>';
			}
			?>
		</select>
		
		<textarea name="description" id="id1" placeholder="الوصف"></textarea>
		
		<input id="file_V" name="image" type="file" hidden accept="image/*" />
		<label for="file_V" id="label"><i class="fas fa-image"></i></label>
		<img src="" id="img" />
		
		<button name="" type="submit" id="submit_button">أضف الخبر</button>
		<span id="mess__V"></span>
	</div>
	</form>
	
</div>
<script>
$(document).ready(function(){
	$("#new_post").submit(function(){
		var serialize = new FormData($("#new_post")[0]);
		
		$.ajax({
			type:'POST',
			url:'ajax/new_post.php',
			data:serialize,
			contentType: false,
            processData: false,
			beforeSend: function(){
				$("#submit_button").css({"cursor":"wait"});
			},
			success: function(data){
				$("#mess__V").html(data);
			$("#submit_button").css({"cursor":"pointer"});
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