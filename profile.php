<?php include"include/database.php"; include"information_user.php"; include"siteinfo.php";

$who = intval($_GET['id']);
$select_info = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$who' ");
if(mysqli_num_rows($select_info) > 0){

$tit = mysqli_fetch_assoc($select_info);
$fname__ = $tit['fname'];
$lname__ = $tit['lname'];
$email__ = $tit['email'];
$date_register__ = $tit['date_register'];
$avatar__ = $tit['avatar'];
?>
<!DOCTYPE html>
<html>
    <head>
	    <title><?php echo $fname__.' '.$lname__.' | '.$title_; ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="style/admin.css" />
		<link rel="icon" type="image/x-icon" href="<?php echo $logo_; ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"/>
		<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <meta name="description" content="<?php echo $description_; ?>" />
        <meta name="keywords" content="<?php echo $keywords_; ?>" />
        <meta name="author" content="<?php echo $fname__.' '.$lname__; ?>" />
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

<style>
.info textarea{max-width:98.5%;min-width:98.5%;min-height:60px;padding:5px;outline:none;border:1px solid #ccc;background:#fff;cursor:pointer;}
.info button{padding:0px 5px;outline:none;margin:5px 0px;border:1px solid #000099;background:#000099;cursor:pointer;font-weight:bold;color:#fff;}
.info #form_message{display:none;}
</style>
<div class="cont__FYTDW">
    <div class="Content_NHDTY">
	    
		<div class="info">
		    <table width="100%" border="0">
			    <tr>
				    <td><p><?php echo $fname__; ?> <br/><?php echo $lname__; ?></p></p></td>
					<td align="left"><img src="<?php echo $avatar__; ?>" alt="<?php echo $fname__.' '.$lname__; ?>" /></td>
				</tr>
				<tr>
					<td><p><?php echo $email__; ?></p></td>
					<td align="left"><p><?php echo $date_register__; ?></p></td>
				</tr>
				<tr>
					<td><p id="button_mess">راسلني</p></td>
					<td align="left"></td>
				</tr>
			</table>
			<form id="form_message">
		        <textarea name="sms" id="text_area_"></textarea>
		        <button name="but" type="submit" id="sub_mit_" />إرسال</button>
		        <span id="sms__"></span>
		    </form>
		</div>
<script>
$(document).ready(function(){
	$("#button_mess").click(function(){
		$("#form_message").show(200);
	});
	//##########################
	        $("#form_message").submit(function(){
			    var serialize = new FormData($("#form_message")[0]);
				var user = <?php echo $who; ?>;
				
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
		
		
		<div class="posts">
		    <p id="title">آخر المساهمات</p><br/>
			
		<?php
		
		//Select 
		$select = mysqli_query($connectDB,"SELECT * FROM post WHERE user = '$who' ORDER BY id DESC");
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
				    <p>'.$fitv['title'].'</p>
					<p>'.$fitvb['fname'].' '.$fitvb['lname'].'</p>
				</div>
			</div>
		</div>
		';
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
?>