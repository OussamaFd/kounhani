<?php


$var1 = "#ff4c59";
$var2 = "#9a3d78";
$var3 = "#31ca68";
$var4 = "#3aa4ff";
$var5 = "#8871ff";
$var6 = "#fc942d";
$var7 = "#fc2da7";
$var8 = "#000099";


?>
<div class="categoryies_GHBFTD">
    <div class="categoryies">
        <p id="title">هذا النص يمكن أن يستبدل</p> <hr style="border-top:1px solid #f3f3f3;margin:5px 0px;"/>
		
		<?php
		$select_cate = mysqli_query($connectDB,"SELECT * FROM categories WHERE hb = '0' ORDER BY id ASC");
		while($toot = mysqli_fetch_assoc($select_cate)){
		?>
			<div class='category' id='category' style='background:#fff;' onclick="window.location.href='cate.php?i=<?php echo $toot['id'];?>'">    <p id='title' style='color:#3aa4ff;'><?php echo $toot['title'];?></p>   </div>
		<?php
		}
		?>
		
		
    </div>
</div>