<style>
.div_NHYPSKSD{}
.div_NHYPSKSD #title{text-align:center;color:#77acf1;font-weight:bold;}

.div_NHYPSKSD .title_table #p1{color:#77acf1;font-weight:bold;font-size:13px;cursor:context-menu;}
.div_NHYPSKSD .title_table #p2{color:#000;font-weight:normal;font-size:13px;cursor:context-menu;}
.div_NHYPSKSD .title_table img{width:25px;height:25px;border-radius:50%;border:1px solid #ccc;}
.div_NHYPSKSD .title_table .tr:hover button{display:block;}
.div_NHYPSKSD .title_table .tr button{background:#fff;border:1px solid #fff;color:#ffb3b3;cursor:pointer;font-size:18px;display:none;}
.div_NHYPSKSD .title_table .tr button:hover{color:#ff3333;}
</style>
<div class="div_NHYPSKSD">
    <p id="title">الأعضاء</p><br/>
	
	<table width="100%" border="0" class="title_table">
	    
	    <tr>
			<td align="center"><p id="p1">avatar</p></td>
			<td align="center"><p id="p1">Firstname</p></td>
			<td align="center"><p id="p1">Lastname</p></td>
			<td align="center"><p id="p1">Email</p></td>
			<td align="center"><p id="p1">Date register</p></td>
			<td align="center"><p id="p1">Setting</p></td>
		</tr>
		<tr><td colspan="6"><hr style="border-top:1px solid #ccc;"/><td></tr>
		
		<?php
		//insert users
		$insert_users = mysqli_query($connectDB,"SELECT * FROM users ORDER BY id DESC");
		while($toot = mysqli_fetch_assoc($insert_users)){
		echo'
		<tr class="tr">
			<td align="center"><img src="'.$toot['avatar'].'" /></td>
			<td align="center"><p id="p2">'.$toot['fname'].'</p></td>
			<td align="center"><p id="p2">'.$toot['lname'].'</p></td>
			<td align="center"><p id="p2">'.$toot['email'].'</p></td>
			<td align="center"><p id="p2">'.$toot['date_register'].'</p></td>
			<td align="center"><button class="bu_tt_on" data-id="'.$toot['id'].'"><i class="far fa-times-circle"></i></button></td>
		</tr>
		';
		}
		?>
	</table>
</div>
<script type='text/javascript'>
$(document).ready(function(){
    // Delete 
    $('.bu_tt_on').click(function(){
        var el = this;
        // Delete id
        var idv = $(this).data('id');
        
            // AJAX Request
            $.ajax({
                url: 'ajax/users.php',
                type: 'POST',
                data: { idX:idv },
                success: function(response){
                    if(response == 1){
                        // Remove row from HTML Table
                        $(el).closest('.tr').css('background','#e6e6ff');
                        $(el).closest('.tr').fadeOut(400,function(){
                            $(this).remove();
                        });
                    }else{
                        alert('Error : ');
                    }
                }
            });
    });
});
</script>