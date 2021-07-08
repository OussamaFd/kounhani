
// registerition
$(document).ready(function(){
    $("#form_register").submit(function(){
		
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var email = $("#email").val();
		var pass = $("#pass").val();
		var serialize = $("#form_register").serialize();
		
		
		if(firstname == ""){
			$("#firstname").css({"border":"1px solid #ffb3b3"});
		}else if(lastname == ""){
			$("#lastname").css({"border":"1px solid #ffb3b3"});
		}else if(email == ""){
			$("#email").css({"border":"1px solid #ffb3b3"});
		}else if(pass == ""){
			$("#pass").css({"border":"1px solid #ffb3b3"});
		}else{
			
			
			// Send DATA
			$.ajax({
				type:'POST',
				url:'include/login.php',
				data:serialize,
				beforeSend: function(){
					$("#btn_register").css({"cursor":"wait"});
				},
				success: function(data){
					$("#sms_register").html(data);
				$("#btn_register").css({"cursor":"pointer"});
				},
				error: function(){
					$("#btn_register").css({"cursor":"pointer"});
					$("#sms_register").html("<meta http-equiv='refresh' content='0' />");
				}
			});
			
		}

		return false;
	});
});













