<?php session_start(); 
$id_user = $_SESSION['id_user'];
$login = $_SESSION['login'];

$information_user = mysqli_query($connectDB,"SELECT * FROM users WHERE id = '$id_user' ");
$fetch_user = mysqli_fetch_object($information_user);

$id_user   = $fetch_user->id;
$firstname = $fetch_user->fname;
$lastname  = $fetch_user->lname;
$email     = $fetch_user->email;
$active    = $fetch_user->active;
$ulv       = $fetch_user->ulv;
$avatar    = $fetch_user->avatar;


?>