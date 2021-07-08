<style>
.div_NHYPSK{}
.div_NHYPSK #title{text-align:center;color:#77acf1;font-weight:bold;}

.count_visits{width:117px;height:100px;margin:5px;position:relative;display:inline-block;box-shadow:0px 0px 5px #ccc;cursor:pointer;transition:.5s;}
.count_visits:hover{box-shadow:0px 0px 10px #ccc;transition:.5s;}

.count_visits p{font-size:13px;font-weight:bold;color:#fff;}
.count_visits #title_{position:absolute;top:0px;left:50%;transform:translate(-50%);}
.count_visits #number{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);}

</style>
<?php
$today = date('Y/m/d');
$yesterday = date("Y/m/d", mktime(0, 0, 0, date("m") , date("d")+7,date("Y")));
$insert_VS = mysqli_query($connectDB,"SELECT * FROM visits");
$today_    = mysqli_query($connectDB,"SELECT * FROM visits WHERE date = '$today' ");
$this_weak = mysqli_query($connectDB,"SELECT * FROM visits WHERE date < '$yesterday' ");
$google    = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(url USING utf8) LIKE '%google%')");
$youtube   = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(url USING utf8) LIKE '%youtube%')");
$instagram = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(url USING utf8) LIKE '%instagram%')");
$twitter   = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(url USING utf8) LIKE '%twitter%')");
$facebook  = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(url USING utf8) LIKE '%facebook%')");
$morocco   = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(country USING utf8) LIKE '%morocco%')");
$US        = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(country USING utf8) LIKE '%US%')");
$france    = mysqli_query($connectDB,"SELECT * FROM visits WHERE  (CONVERT(country USING utf8) LIKE '%france%')");

?>
<div class="div_NHYPSK">
    <p id="title">الزيارات (<?php echo mysqli_num_rows($insert_VS); ?>+)</p><br/><hr/>
	
	<div class="count_visits" style="background:#ff4c59;"><p id="title_">اليوم</p>    <p id="number"><?php echo mysqli_num_rows($today_); ?></p></div>
	<div class="count_visits" style="background:#000099;"><p id="title_">آخر أسبوع</p><p id="number"><?php echo mysqli_num_rows($this_weak); ?></p></div>
	<div class="count_visits" style="background:#9a3d78;"><p id="title_">فيسبوك</p>   <p id="number"><?php echo mysqli_num_rows($facebook); ?></p></div>
	<div class="count_visits" style="background:#31ca68;"><p id="title_">توستر</p>    <p id="number"><?php echo mysqli_num_rows($twitter); ?></p></div>
	<div class="count_visits" style="background:#3aa4ff;"><p id="title_">إنسطغرام</p> <p id="number"><?php echo mysqli_num_rows($instagram); ?></p></div>
	<div class="count_visits" style="background:#8871ff;"><p id="title_">يوتيوب</p>   <p id="number"><?php echo mysqli_num_rows($youtube); ?></p></div>
	<div class="count_visits" style="background:#fc942d;"><p id="title_">جوجل</p>     <p id="number"><?php echo mysqli_num_rows($google); ?></p></div>
	<div class="count_visits" style="background:#fc2da7;"><p id="title_">المغرب</p>   <p id="number"><?php echo mysqli_num_rows($morocco); ?></p></div>
	<div class="count_visits" style="background:#000099;"><p id="title_">أمريكا</p>   <p id="number"><?php echo mysqli_num_rows($US); ?></p></div>
	<div class="count_visits" style="background:#9a3d78;"><p id="title_">فرنسا</p>    <p id="number"><?php echo mysqli_num_rows($france); ?></p></div>
	
</div>