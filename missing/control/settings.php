<style>
.settings{}
.settings #title{text-align:center;color:#77acf1;font-weight:bold;}
.settings .div_input{width:100%;margin-top:5px;}
.settings .div_input input{width:95%;padding:0px 5px;outline:none;}
.settings .div_input textarea{max-width:95%;min-width:95%;min-height:80px;padding:0px 5px;outline:none;}
.settings .div_input p{font-size:13px;font-weight:bold;}

.settings .div_input input[type=file]{border:1px solid #404040;cursor:pointer;}
.settings .div_input input[type=submit]{width:100px;color:#fff;font-weight:bold;background:#000099;border:1px solid #000099;cursor:pointer;}

#message{color:#ffb3b3;font-size:13px;}
</style>
<?php
$select_settings = mysqli_query($connectDB,"SELECT * FROM settings");
$fetch_sett = mysqli_fetch_assoc($select_settings);
?>
<div class="settings">
    <p id="title">إعدادات الموقع</p>
	<form id="form_edit_settings" enctype="multipart/form-data">
	<div class="div_input"><p>العنوان</p>
	    <input name="title" type="text" placeholder="empty" value="<?php echo $fetch_sett['title']; ?>" />
	</div>
	
	<div class="div_input"><p>الوصف</p>
	    <textarea name="description" placeholder="empty" ><?php echo $fetch_sett['description']; ?></textarea>
	</div>
	
	<div class="div_input"><p>كلمات مفتاحية</p>
	    <textarea name="keywords" placeholder="empty" ><?php echo $fetch_sett['keywords']; ?></textarea>
	</div>
	
	<div class="div_input"><p>حقوق النشر</p>
	    <input name="copyright" type="text" placeholder="empty" value="<?php echo $fetch_sett['copyright']; ?>" />
	</div>
	
	<div class="div_input"><p>الشعار</p>
	    <input name="logo" type="file" accept="image/png, image/jpeg, image/jpg" />
	</div>
	
	<br/><p id="title">بيانات الإتصال</p><hr/><!--#######-->
	
	<div class="div_input"><p>البريد الإلكتروني</p>
	    <input name="email" type="text" placeholder="empty" value="<?php echo $fetch_sett['email']; ?>" />
	</div>
	
	<div class="div_input"><p>رقم الهاتف</p>
	    <input name="number" type="text" placeholder="empty" value="<?php echo $fetch_sett['number']; ?>" />
	</div>
	
	<div class="div_input"><p>فيسبوك</p>
	    <input name="facebook" type="text" placeholder="empty" value="<?php echo $fetch_sett['facebook']; ?>" />
	</div>
	
	<div class="div_input"><p>إنسطغرام</p>
	    <input name="instagram" type="text" placeholder="empty" value="<?php echo $fetch_sett['instagram']; ?>" />
	</div>
	
	<div class="div_input"><p>يوتيوب</p>
	    <input name="youtube" type="text" placeholder="empty" value="<?php echo $fetch_sett['youtube']; ?>" />
	</div>
	
	<div class="div_input"><br/>
	    <input name="button__I" id="button__I" type="submit" value="حفظ البيانات" /> <span id="message"></span>
	</div>
	</form>
	<script>
	    $(document).ready(function(){
			$("#form_edit_settings").submit(function(){
			var serialize = new FormData($("#form_edit_settings")[0]);
				
				$.ajax({
					type:'POST',
					url:'ajax/settings.php',
					data:serialize,
					contentType: false,
        		    processData: false,
					beforeSend: function(){
						$("#button__I").css({"cursor":"wait"});
					},
					success: function(data){
						$("#message").html(data);
					    $("#button__I").css({"cursor":"pointer"});
					},
					error: function(){
					    $("#button__I").css({"cursor":"pointer"});
					    $("#message").html("<meta http-equiv='refresh' content='0' />");
				    }
					
				});
				
				return false;
			});
		});
	</script>
	
	
</div>