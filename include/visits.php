<?php 
//INSERT visits to confirm IP

//$ip_ = $_SERVER['REMOTE_ADDR'];
//$url_ = $_SERVER['HTTP_REFERER'];
//$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip_);
//$countryName = $xml->geoplugin_countryName ;
$date_ = date('Y/m/d');



//######################################
$countryName = 'Morocco';
$ip_ = '970.948.624';
$url_ = 'https://www.google.com';
//######################################



$syst = "SELECT * FROM visits WHERE ip = '$ip_' ";
$insert_ = mysqli_query($connectDB,$syst);
if(mysqli_num_rows($insert_) == 0){
	//insert new visit
	$insert_new = mysqli_query($connectDB,"INSERT INTO visits(ip,country,url,date)VALUES('$ip_','$countryName','$url_','$date_')");
}
?>