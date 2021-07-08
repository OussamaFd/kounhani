<style>
.div_catego{}
.div_catego #title{text-align:center;color:#77acf1;font-weight:bold;}

.div_catego .new_category{}
.div_catego .new_category #title_{font-size:14px;}
.div_catego .new_category .add_new{display:flex;justify-content:space-between;}

.div_catego .new_category .add_new button,input,select{width:200px;padding:2px 5px;cursor:pointer;background:#f7f7f7;border:1px solid #ccc;outline:none;}

.div_catego .new_category .add_new button{background:#000099;border:1px solid #000099;color:#fff;font-weight:bold;}
.div_catego .new_category .add_new button:hover{background:#000066;border:1px solid #000066;}

.catego{display:flex;justify-content:space-between;}
.catego .city{width:200px;padding:3px;}
.catego .other{width:200px;padding:3px;}
.catego .div_cat{display:flex;justify-content:space-between;border-bottom:1px solid #ccc;margin-bottom:3px;}
.catego .div_cat p{font-size:14px;cursor:context-menu;}
.catego .div_cat button{background:#fff;border:1px solid #fff;cursor:pointer;}
.catego .div_cat button:hover{text-decoration:underline;}
</style>

<div class="div_catego"><p id="title">الأقسام</p><br/>
    
	<form id="fprm_add_new_catego">
	<div class="new_category"><p id="title_">إضافة قسم جديد</p>
	    <div class="add_new">
		    <button type="submit" id="sub__mit">إضافة</button>
			<input name="title" type="text" placeholder="إسم التصنيف هنا" id="input__B" />
			<select name="hb">
			    <option value="0"> </option>
				<option value="1">المدن</option>
			</select>
		</div>
	</div>
	</form>
<script>
$(document).ready(function(){
	$("#fprm_add_new_catego").submit(function(){
		var serialize = new FormData($("#fprm_add_new_catego")[0]);
		
		$.ajax({
			type:'POST',
			url:'ajax/new_cat.php',
			data:serialize,
			contentType: false,
            processData: false,
			beforeSend: function(){
				$("#sub__mit").css({"cursor":"wait"});
			},
			success: function(data){
				    if(data == 1){
                        // Remove row from HTML Table
                        $("#input__B").css({"border":"1px solid green"});
                    }else if(data == 2){
						$("#input__B").css({"border":"1px solid green"});
						$("#input__B").val("");
					}else{
                        $("#input__B").css({"border":"1px solid red"});
                    }
			    $("#sub__mit").css({"cursor":"pointer"});
			},
			error: function(){
				alert("Error:");
				$("#sub__mit").css({"cursor":"pointer"});
			}
		});
		
		return false;
	});
});
</script>





<hr style="border-top:1px solid #ccc;margin-top:10px;"/><br/><br/>


<div class="catego">
    
	<div class="other">
	    <?php
		$select_cate = mysqli_query($connectDB,"SELECT * FROM categories WHERE hb = '0' ORDER BY id DESC ");
		while($amigo = mysqli_fetch_assoc($select_cate)){
		echo'
		    <div class="div_cat"><p>'.$amigo['title'].'</p><button class="but_V_tton_d_" data-id="'.$amigo['id'].'">حذف</button></div>
		';
		}
		?>
	</div>
	
	
	<div class="city">
		<?php
		$select_cat = mysqli_query($connectDB,"SELECT * FROM categories WHERE hb = '1' ORDER BY id DESC ");
		while($amig = mysqli_fetch_assoc($select_cat)){
		echo'
		    <div class="div_cat"><p>'.$amig['title'].'</p><button class="but_V_tton_d_" data-id="'.$amig['id'].'">حذف</button></div>
		';
		}
		?>
	</div>
	
</div>

<script>
$(document).ready(function(){
	
    $('.but_V_tton_d_').click(function(){
        var el = this;
        
        var id = $(this).data('id');
        
            // AJAX Request
            $.ajax({
                url: 'ajax/delete_cat.php',
                type: 'POST',
                data: { id_cat:id },
                success: function(response){
					
                    if(response == 1){
                        // Remove row from HTML Table
                        $(el).closest('.div_cat').css('border',' 1px solid #ccc');
                        $(el).closest('.div_cat').fadeOut(500,function(){
                            $(this).remove();
                        });
                    }else{
                        alert('Error:');
                    } 
                },
				error: function(){
					alert("Error: ");
				}
            });
    });
});
</script>



</div>
















