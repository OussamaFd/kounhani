<?php
include"include/database.php";
include"information_user.php";
include"siteinfo.php";
?>
<!DOCTYPE html>
<html>
    <head>
	    <title><?php echo $title_; ?></title>
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

$cate = intval($_GET['i']);
$selectm = mysqli_query($connectDB,"SELECT * FROM post WHERE category = '$cate' ");
$hoolm = mysqli_fetch_assoc($selectm);

		                $selectmn = $hoolm['category'];
					    $selecT_catevn = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$selectmn' ");
						$fitvn = mysqli_fetch_assoc($selecT_catevn);
		
?>







<div class="container_NHDRSFW" style="background:#fff;">
    <div class="container_976479">
        <p id="title"> <span style="color:#77acf1;"><?php echo mysqli_num_rows($selectm); ?></span> مقالات حسب قسم <span style="color:#77acf1;"><?php echo $fitvn['title']; ?></span> </p> <hr style="border-top:1px solid #fff;margin:5px 0px;"/>
		
		
		
		
		<?php			  
		//Select 
		$select = mysqli_query($connectDB,"SELECT * FROM post WHERE category = '$cate' ORDER BY id DESC ");
		if(mysqli_num_rows($select)){
		while($hool = mysqli_fetch_assoc($select)){
			            $cat_id = $hool['city'];
					    $selecT_cate = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$cat_id' ");
						$fit = mysqli_fetch_assoc($selecT_cate);
						
						$cat_idv = $hool['category'];
					    $selecT_catev = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$cat_idv' ");
						$fitv = mysqli_fetch_assoc($selecT_catev);
						
						$cat_idvb = $hool['user'];
					    $selecT_catevb = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$cat_idvb' ");
						$fitvb = mysqli_fetch_assoc($selecT_catevb);
		
		echo'
		<div class="post">
		    <div class="image">
			    <a href="post.php?p='.$hool['id'].'"><img src="'.$hool['image'].'" alt="'.$hool['title'].'" /></a>
				<p id="time">'.$hool['date_'].'</p>
				<p id="city">'.$fit['title'].'</p>
			</div>
			<div class="text">
				<div class="title">
				    <a href="post.php?p='.$hool['id'].'" style="text-decoration:none;color:#000;"><p>'.$hool['title'].'</p></a>
				</div>
				<div class="some_information">
				    <a href="cate.php?i='.$fitv['id'].'" style="text-decoration:none;"><p>'.$fitv['title'].'</p></a>
					<a href="profile.php?id='.$fitvb['id'].'" style="text-decoration:none;"><p>'.$fitvb['fname'].' '.$fitvb['lname'].'</p></a>
				</div>
			</div>
		</div>
		';
		}
		}else{
			
			echo'<p style="text-align:center;font-weight:bold;font-size:25px;color:#ccc;">لا يوجد أي مقال في هذا التصنيف حاليا</p>';
			
		}
		?>
		
    </div>
</div>











<!--JAVASCRIPT FILES-->
<script src="style/main.js"></script>
</body>
</html>