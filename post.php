<?php include"include/database.php"; include"information_user.php"; include"siteinfo.php";

$id_bof = intval($_GET['p']);
$select_post = mysqli_query($connectDB,"SELECT * FROM post WHERE id = '$id_bof' ");
if(mysqli_num_rows($select_post) > 0){

$hh = mysqli_fetch_assoc($select_post);

$cat_idvbd = $hh['user'];
$selecT_catevbd = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$cat_idvbd' ");
$fitvbd = mysqli_fetch_assoc($selecT_catevbd);

$cat_idvv = $hh['category'];
$selecT_catevv = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$cat_idvv' ");
$fitvv = mysqli_fetch_assoc($selecT_catevv);

$cat_idvvl = $hh['city'];
$selecT_catevvl = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$cat_idvvl' ");
$fitvvl = mysqli_fetch_assoc($selecT_catevvl);
?>
<!DOCTYPE html>
<html>
    <head>
	    <title><?php echo $hh['title'].' | '.$title_; ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link rel="icon" type="image/x-icon" href="<?php echo $logo_; ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"/>
		<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <meta name="description" content="<?php echo $hh['title']; ?>" />
        <meta name="keywords" content="<?php echo $hh['description']; ?>" />
        <meta name="author" content="<?php echo $fitvbd['fname'].' '.$fitvbd['lname']; ?>" />
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
		<?php
		if($login == 999){ ?>
			<button title="إضافة خبر جديد"><i class="fas fa-plus" onclick="window.location.href='new.php'"></i></button><?php
		}
		?>
		    
		    <img src="<?php echo $logo_; ?>" alt="logo missing" onclick="window.location.href='index.php'" />
		</div>
		
	</div>
</header>

<?php
//include
include"include/dropdown.php";
if($login != 999){ include"include/before_login.php"; }
?>




<style>
.cont____BFDGV{margin:auto;width:50%;background:#f7f7f7;border:1px solid #f3f3f3;margin-top:30px;margin-bottom:100px;}
.cont____BFDGV .image{width:100%;margin-bottom:2px;}
.cont____BFDGV .image img{width:100%;max-height:500px;}
.cont____BFDGV .links{}
.cont____BFDGV .links ul li{list-style:none;padding-left:20px;display:inline-block;}
.cont____BFDGV .links ul li a{text-decoration:none;color:#737373;font-size:13px;}
.cont____BFDGV .links ul li span{cursor:context-menu;color:#737373;font-size:13px;font-weight:bold;}
.cont____BFDGV .title{border-bottom:1px solid #ccc;margin-bottom:3px;}
.cont____BFDGV .title p{cursor:context-menu;font-size:15px;color:#77acf1;}
.cont____BFDGV .description{padding:5px;}
.cont____BFDGV .description p{cursor:context-menu;}

.cont____BFDGV .contact{padding:5px;}
.cont____BFDGV .contact a{text-decoration:none;color:#77acf1;font-size:13px;font-weight:bold;cursor:pointer;}
.cont____BFDGV .contact a:hover{color:#404040;}

.cont____BFDGV .contact textarea{max-width:98.5%;min-width:98.5%;min-height:60px;padding:5px;outline:none;border:1px solid #ccc;background:#fff;cursor:pointer;}
.cont____BFDGV .contact button{padding:0px 5px;outline:none;margin:5px 0px;border:1px solid #000099;background:#000099;cursor:pointer;font-weight:bold;color:#fff;}
.cont____BFDGV .contact #form_message{display:none;}

#sms__{color:#ff6666;font-size:13px;cursor:context-menu;}

@media only screen and (max-width: 768px) {
	.cont____BFDGV{width:95%;}
}

@media only screen and (max-width: 600px) {
	.cont____BFDGV p{font-size:12px;}
	.cont____BFDGV .links ul li{padding-left:5px;}
}
</style>

<div class="cont____BFDGV">
    
	<div class="links">
	    <ul>
		    <li><span>الكاتب :</span>  <a href="profile.php?id=<?php echo $fitvbd['id']; ?>"><?php echo $fitvbd['fname'].' '.$fitvbd['lname']; ?></a></li>
			<li><span>التصنيف :</span> <a><?php echo $fitvv['title']; ?></a></li>
			<li><span>التاريخ :</span> <a><?php echo $hh['date_']; ?></a></li>
			<li><span>المدينة :</span> <a><?php echo $fitvvl['title']; ?></a></li>
		</ul>
	</div>
	
	<div class="image"><img src="<?php echo $hh['image']; ?>" alt="<?php echo $hh['title']; ?>" /></div>
	
	<div class="title">
	    <p><?php echo $hh['title']; ?></p>
	</div>
	
	<div class="description">
	    <p><?php echo $hh['description']; ?></p>
	</div>
	
	<div class="contact">
	    <a id="aa">راسلني</a>
		<form id="form_message">
		<textarea name="sms" id="text_area_"></textarea>
		<button name="but" type="submit" id="sub_mit_" />إرسال</button>
		<span id="sms__"></span>
		</form>
	</div>
	
</div>
<script>
$(document).ready(function(){
	$("#aa").click(function(){
		$("#form_message").show(200);
	});
	//##########################
	        $("#form_message").submit(function(){
			    var serialize = new FormData($("#form_message")[0]);
				var user = <?php echo $cat_idvbd; ?>;
				
				$.ajax({
					type:'POST',
					url:'ajax/message.php?bb='+user,
					data:serialize,
					contentType: false,
        		    processData: false,
					beforeSend: function(){
						$("#sub_mit_").css({"cursor":"wait"});
					},
					success: function(data){
						$("#sms__").html(data);
					    $("#sub_mit_").css({"cursor":"pointer"});
					},
					error: function(){
					    $("#sub_mit_").css({"cursor":"pointer"});
					    $("#message").html("<meta http-equiv='refresh' content='0' />");
				    }
					
				});
				
				return false;
			});
});
</script>













<!--JAVASCRIPT FILES-->
<script src="style/main.js"></script>
</body>
</html>
<?php }else{ header("Location: index.php"); } ?>