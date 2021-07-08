//Login
$(document).ready(function(){
	$("#form_login").submit(function(){
		
		var email_id = $("#email_id").val();
		var pass__id = $("#pass__id").val();
		var sms_login = $("#sms_login").val();
		var serialize = $("#form_login").serialize();
		
		if(email_id == ""){
			$("#email_id").css({"border":"1px solid #ffb3b3"});
		}else if(pass__id == ""){
			$("#pass__id").css({"border":"1px solid #ffb3b3"});
		}else{
			
			
			// Send DATA
			$.ajax({
				type:'POST',
				url:'include/register.php',
				data:serialize,
				beforeSend: function(){
					$("#butt__to_log").css({"cursor":"wait"});
				},
				success: function(data){
					$("#sms_login").html(data);
				$("#butt__to_log").css({"cursor":"pointer"});
				},
				error: function(){
					$("#butt__to_log").css({"cursor":"pointer"});
					$("#sms_login").html("<meta http-equiv='refresh' content='0' />");
				}
			});
			

		}
		
		
		
		
		return false;
	});
});