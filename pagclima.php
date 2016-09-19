<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
include_once("callApi.php");
session_start();

//var_dump($_POST);
$resultado=[]; //Array donde voy a guardar los resultados de las busquedas
$id = "";


if(is_null($_SESSION["user"]) && is_null($_SESSION["password"]) ){
	header("location: http://localhost/clima/loginclima.php"); //Para  ir a la otra pagina web
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Clima</title>
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
		<div id="info" class="dancing-script">
			<p><?php echo "Bienvenido " . $_SESSION["user"];?></p>
			<p><?php echo "<a href='logoutclima.php'>Cerrar Sesion</a>";?></p>
		</div>
		<div class="titulo">
			<i class='glyphicon glyphicon-tint'></i>
			<i class='glyphicon glyphicon-tint'></i>
			<i class='glyphicon glyphicon-tint'></i>
			<i class='glyphicon glyphicon-flash'></i>
			<i class='glyphicon glyphicon-flash'></i>
			<i class='glyphicon glyphicon-flash'></i>
			<h1 id="titulo">Weather Page</h1>
		</div>
		<form action="pagclima.php" method="POST">
			<div id="id">
				<input type="number" name="id" placeholder="ID de la ciudad">
			</div>
			<div id="buscar">
				<input type="submit" value="Buscar">
			</div>
		</form>
		<div id="resultados">
			<textarea name="resultados" rows="10" cols="70" disabled placeholder="Aquí se mostrarán los resultados de su búsqueda"><?php
					if(isset($_POST["id"])){
						$id = $_POST["id"];
						$resultado= callAPI("GET","api.openweathermap.org/data/2.5/weather",array(
		    			"id"=> $_POST["id"],"APPID"=>"38442bf3df9d7fdb004b10ceba923c38"));
		    			//print_r(strlen($resultado));

						$pattern = '/"id":(.*?),/si';						 
						preg_match_all($pattern, $resultado, $result);

						//En este IF, veo la longitud del resultado del callAPI. Si la ID ingresada es invalida, la api devuelve un string de error con una longitud de 48. Caso contrario, devuelve un string muchisimo mas largo( y entramos al if).
						if(strlen($resultado)>50){ 		 
							echo "ID: " . $result[1][1] ."\n";

							$pattern = '/"name":"(.*?)",/si';						 
							preg_match_all($pattern, $resultado, $result);			 
							echo "Nombre: " . $result[1][0] ."\n" ;
							if(isset($_SESSION["memoria"])){
								$_SESSION["memoria"] = "Nombre: " . $result[1][0] . ". ID: " . $id . "\n" . $_SESSION["memoria"]  ;
							}else
							{$_SESSION["memoria"] = "Nombre: " . $result[1][0] . ". ID: " . $id . "\n"  ;}
							$pattern = '/"temp":(.*?),/si';						 
							preg_match_all($pattern, $resultado, $result);	
							echo "Temperatura: " . ($result[1][0] - 273) . "°C" . "\n";

							$pattern = '/"humidity":(.*?),/si';						 
							preg_match_all($pattern, $resultado, $result);	
							echo "Humedad: " . $result[1][0] . "%" . "\n";

						}else{
							echo "La ID ingresada no es valida";
						}
						


 


					}
				?></textarea>
		</div>
		<div id="busquedas">
			<textarea name="textarea" rows="10" cols="50" disabled placeholder="Aquí se mostrarán los resultados de sus antiguas búsquedas"><?php
				if(isset($_SESSION["memoria"])){
					print_r($_SESSION["memoria"]);
				}
				//print_r ($resultadosviejos);
			?></textarea>
		</div>
	</div>
</body>
</html>

