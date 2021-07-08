<?php include"include/database.php"; include"information_user.php"; include"siteinfo.php";
if($login == 999){
?>
<!DOCTYPE html>
<html>
    <head>
	    <title> الرسائل | <?php echo $title_; ?></title>
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
$selectSMSbb = mysqli_query($connectDB,"SELECT * FROM message WHERE user2 = '$id_user' AND status = '1' ");
function ago($tm,$rcs = 0){
	$cur_tm = time(); $dif = $cur_tm-$tm;
	$pds = array('second','minute','hour','day','week','month','year','decade');
	$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--);if($v < 0) $v = 0;
    $_tm = $cur_tm-($dif%$lngh[$v]);

    $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s",$no,$pds[$v]);
	if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm)> 0)) $x .= time_ago($_tm);
	return $x;
}

?>






<style>
.messagat{margin:auto;width:50%;background:#fff;box-shadow:0px 0px 10px #ccc;margin-top:40px;margin-bottom:40px;padding:5px;}
.messagat #title{font-size:14px;color:#77acf1;font-weight:bold;cursor:pointer;}
.messagat .sms{margin-bottom:5px;border:1px solid #f7f7f7;}
.messagat .sms:hover{border:1px solid #ccc;}
.messagat .sms .sender{display:flex;align-items:center;background:#f7f7f7;padding:3px;}
.messagat .sms .sender img{width:35px;height:35px;border-radius:50%;border:1px solid #ccc;margin-left:3px;}
.messagat .sms .sender p{color:#404040;}
.messagat .sms .sender #name{margin-left:8px;}
.messagat .sms .sender #name:hover{text-decoration:underline;}
.messagat .sms .sender #numb{font-size:12px;color:#77acf1;}
.messagat .sms .text{background:#f7f7f7;padding:3px;border-top:1px solid #ccc;}
.messagat .sms .text p{font-size:14px;color:#404040;}

 textarea{max-width:96.5%;min-width:96.5%;min-height:60px;padding:5px;outline:none;border:1px solid #ccc;background:#fff;cursor:pointer;}
 button{padding:0px 5px;outline:none;margin:5px 0px;border:1px solid #000099;background:#000099;cursor:pointer;font-weight:bold;color:#fff;}

@media only screen and (max-width: 768px) {
	.messagat{width:95%;}
}
</style>

<div class="messagat">
    
<?php
$c = htmlentities($_GET['c']);
$select_VDFG = mysqli_query($connectDB,"SELECT * FROM message WHERE id2 = '$c' ");
if(mysqli_num_rows($select_VDFG) > 0){
	
	$fetch_ = mysqli_fetch_assoc($select_VDFG);
	
	
	                $user1 = $fetch_['user1'];
					$selectUSER = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$user1' ");
					$us__er = mysqli_fetch_assoc($selectUSER);
	
	echo'
	<div class="sms">
	    <div class="sender">
		    
		    <img src="'.$us__er['avatar'].'" />
			<a href="profile.php?id='.$us__er['id'].'" style="text-decoration:none;"><p id="name">'.$us__er['fname'].' '.$us__er['lname'].'</p></a>
			
			<p id="numb">منذ '.ago($fetch_['time']).'</p>
		</div>
		<div class="text">
		    <p>'.$fetch_['message'].'</p>
		</div>
	</div>
	';
	
	
	
	//updat 
	$UPDATE_status = mysqli_query($connectDB,"UPDATE message SET `status` = '0' WHERE id2 = '$c' ");
	
	
	    echo' <br/>
	        <form id="form_message">
		        <textarea name="sms" id="text_area_" placeholder="رد"></textarea>
		        <button name="but" type="submit" id="sub_mit_" >إرسال</button>
		        <span id="sms__"></span>
		    </form>
	    ';
		
		
}else{ header("Location: index.php"); }
?>
	
<script>
$(document).ready(function(){
	//##########################
	        $("#form_message").submit(function(){
			    var serialize = new FormData($("#form_message")[0]);
				var user = <?php echo $user1; ?>;
				
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
    
	
	
	
	
	
	
</div>














<div style="clear:both;"></div><br/><br/><br/>


<!--JAVASCRIPT FILES-->
<script src="style/main.js"></script>
</body>
</html>
<?php
}else{ header("Location: index.php"); }
?>