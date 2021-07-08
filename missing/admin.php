<?php include"include/database.php"; include"information_user.php"; include"siteinfo.php";
if($login == 999){
if($ulv == 3){
?>
<!DOCTYPE html>
<html>
    <head>
	    <title><?php echo $title_; ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style/admin.css" />
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
		    <img src="<?php echo $logo_; ?>" alt="logo missing" onclick="window.location.href='index.php'" />
		</div>
		
	</div>
</header>
<?php
include"include/dropdown.php";
?>






<div class="container__BHFGD">
    <a href="admin.php" class="title">لوحة التحكم</a>
	
	<div class="DIV__HTDGEF">
	    
		<div class="links">
		    <a href="admin.php"><div class="div"><p>الرئيسية</p></div></a>
			<a href="admin.php?type=categories"><div class="div"><p>الأقسام</p></div></a>
			<a href="admin.php?type=users"><div class="div"><p>الأعضاء</p></div></a>
			<a href="admin.php?type=visits"><div class="div"><p>الزيارات</p></div></a>
			<a href="admin.php?type=settings"><div class="div"><p>الإعدادات</p></div></a>
			
		</div>
		
		
		
		<div class="content">
		    <?php
			$type = htmlentities($_GET['type']);
			if(isset($type)){
				
				switch($type){
					
					case("settings"):
					    include"control/settings.php";
					break;
					case("categories"):
					    include"control/categories.php";
					break;
					case("users"):
					    include"control/users.php";
					break;
					case("visits"):
					    include"control/visits.php";
					break;
					
				}
				
			}
			?>
		</div>
		
		
		
	</div>
	
</div>









<div style="clear:both;"></div><br/><br/><br/>


<!--JAVASCRIPT FILES-->
<script src="style/main.js"></script>
</body>
</html>
<?php
}else{ header("Location: index.php"); }
}else{ header("Location: index.php"); }
?>