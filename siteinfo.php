<?php include"include/database.php";

$select_informations = mysqli_query($connectDB,"SELECT * FROM settings ");
$fetch_V = mysqli_fetch_assoc($select_informations);

$title_       = $fetch_V['title'];
$description_ = $fetch_V['description'];
$keywords_    = $fetch_V['keywords'];
$copyright_   = $fetch_V['copyright'];
$email_       = $fetch_V['email'];
$number_      = $fetch_V['number'];
$facebook_    = $fetch_V['facebook'];
$instagram_   = $fetch_V['instagram'];
$youtube_     = $fetch_V['youtube'];
$logo_        = $fetch_V['logo'];

?>