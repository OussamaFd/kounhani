<div class="container_GTRECXKS">
<form id="form_searchU" action="search.php" method="POST" >
    <div class="div_search_bar">
	    
	    <button name="button_VF" type="submit">بحث</button>
		<input name="box" type="text" placeholder="إبحث في الموقع" id="width" />
		
	</div>
</form>
</div>
<script>
$(document).ready(function(){
	$("#form_searchU").submit(function(){
		var box = $("#width").val();
		if(box == ""){
			$("#width").css({"border":"1px solid red"});
			return false;
		}
		
	});
});
</script>