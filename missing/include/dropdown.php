
<!--____DROP DOWN____-->
<div class="container">
    
	<div class="drop_down_more_info">
	    
		
		<div class="links">
		
		
		<?php
		$select_catenb = mysqli_query($connectDB,"SELECT * FROM categories WHERE hb = '0' ORDER BY id ASC");
		while($tootnb = mysqli_fetch_assoc($select_catenb)){
			echo'<a href="cate.php?i='.$tootnb['id'].'"><div class="div"><p>'.$tootnb['title'].'</p></div></a>';
		}
		?>
		
		</div>
		<p id="copyright">كل الحقوق محفوظة © 2021</p>
	</div>
	
	
	<?php if($login == 999){ ?>
	<div class="drop_down_LOGIN_info">
		<?php if($ulv == 3){ echo'<a href="admin.php"><div class="div"><p>لوحة التحكم</p></div></a>'; } ?>
		<a href="orders.php"><div class="div"><p>الرسائل (<span id="num_">12</span>)</p></div></a>
		<a href="profile.php?id=<?php echo $id_user; ?>"><div class="div"><p><?php echo $firstname.' '.$lastname; ?></p></div></a>
		<a href="account.php"><div class="div"><p>حسابي</p></div></a>
		<a href="include/logout.php"><div class="div"><p>تسجيل الخروج</p></div></a>
	</div>
	<?php } ?>
	
	
</div>


<script>
$(document).ready(function(){
	setInterval(function() {
        $("#num_").load("ajax/noti.php");
    });
});
</script>


