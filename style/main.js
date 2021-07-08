// Dropdown
$(document).ready(function(){
	$(".btn_drop_down").click(function(){
		$(".drop_down_more_info").slideToggle(200);
		$(".drop_down_LOGIN_info").hide();
	});
});
$(document).ready(function(){
	$(".btn_LOGIN_info").click(function(){
		$(".drop_down_LOGIN_info").slideToggle(200);
		$(".drop_down_more_info").hide();
	});
});


// For Login Form
$(document).ready(function(){
	$("#log_1").click(function(){
		$(".modal_form_login").show(200);
		$(".bg").show(200);
	});
	$("#btn_close").click(function(){
		$(".modal_form_login").hide(200);
		$(".bg").hide(200);
	});
});

// For register Form
$(document).ready(function(){
	$("#log_2").click(function(){
		$(".modal_form_login2").show(200);
		$(".bg2").show(200);
	});
	$("#btn_close2").click(function(){
		$(".modal_form_login2").hide(200);
		$(".bg2").hide(200);
	});
});














