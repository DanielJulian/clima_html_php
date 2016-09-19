<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();


//Usuario y contraseña valida : peron , chabon
if(isset($_POST["user"]) && isset($_POST["password"]) ){
	if($_POST["user"] == "peron" && $_POST["password"] == "chabon"){
		$_SESSION["user"] = $_POST["user"];
		$_SESSION["password"] = $_POST["password"];
		header("location: http://localhost/clima/pagclima.php"); //Para  ir a la otra pagina web

	}else{
	   	echo '<script type="text/javascript">alert ("' . DatosIncorrectos . '")</script>';
		}

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
		<div id="info2" class="dancing-script">
			<?php 
				if(isset($_SESSION['user'])){
					echo "<p>Bienvenido: " . $_SESSION['user'] . "";
					echo "<p><a href='pagclima.php'>Buscar Clima</a></p>";
					echo "<p><a href='logoutclima.php'>Cerrar Sesion</a></p>";}
				else{
			?>
		</div>
		<div id="menu-title">
			<h1>Log in page</h1>
		</div>
		<form action="loginclima.php" method="POST">
			<div id="user">
				<input type="text" name="user" placeholder="Usuario" >
			</div>

			<div id="pw">
				<input type="password" name="password" placeholder="Contraseña" >
			</div>
			<div id="boton">
				<input type="submit" value="Ingresar">
			</div>
		</form>
		<?php  }?>
	</div>
</body>
</html>

