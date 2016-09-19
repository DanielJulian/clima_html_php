<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if(isset($_SESSION['user'])){
	session_destroy();}
else{
	header("location: http://localhost/clima/loginclima.php");
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Log In Clima</title>
	<link rel="stylesheet" href="./css/estiloclima.css">
    <link href='./css/normalize.css' rel='stylesheet'>
    <link href='./css/bootstrap.css' rel='stylesheet'>
</head>
<body>
	<div class='video-container'>
      	<video autoplay height='768' loop poster='./videos/ftb/ftb.jpg' width='1366'>
        <source src='./videos/ftb/ftb.mp4' typ='video/mp4'>
        <source src='./videos/ftb/ftb.webm' typ='video/webm'>
      </video>
    </div>
	<div class='container'>
		<div id="menu-title" class="dancing-script">
			<h1>Has cerrado sesión</h1>
			<br /><a href="loginclima.php">Iniciar Sesion</a>
		</div>
	</div>
</body>
</html>