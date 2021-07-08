
<div class="container_NHDRSFW">
    <div class="container_976479">
        <p id="title">هذا النص يمكن أن يستبدل</p> <hr style="border-top:1px solid #fff;margin:5px 0px;"/>
		
		
		
		<?php
		
		//Select 
		$select = mysqli_query($connectDB,"SELECT * FROM post ORDER BY id DESC ");
		while($hool = mysqli_fetch_assoc($select)){
			            $cat_id = $hool['city'];
					    $selecT_cate = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$cat_id' ");
						$fit = mysqli_fetch_assoc($selecT_cate);
						
						$cat_idv = $hool['category'];
					    $selecT_catev = mysqli_query($connectDB,"SELECT * FROM categories WHERE id = '$cat_idv' ");
						$fitv = mysqli_fetch_assoc($selecT_catev);
						
						$cat_idvb = $hool['user'];
					    $selecT_catevb = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$cat_idvb' ");
						$fitvb = mysqli_fetch_assoc($selecT_catevb);
					  
		echo'
		<div class="post">
		    <div class="image">
			    <a href="post.php?p='.$hool['id'].'"><img src="'.$hool['image'].'" alt="'.$hool['title'].'" /></a>
				<p id="time">'.$hool['date_'].'</p>
				<p id="city">'.$fit['title'].'</p>
			</div>
			<div class="text">
				<div class="title">
				    <a href="post.php?p='.$hool['id'].'" style="text-decoration:none;color:#000;"><p>'.$hool['title'].'</p></a>
				</div>
				<div class="some_information">
				    <p>'.$fitv['title'].'</p>
					<p>'.$fitvb['fname'].' '.$fitvb['lname'].'</p>
				</div>
			</div>
		</div>
		';
		}
		?>
		
    </div>
</div>