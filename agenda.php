<?php
session_start();
?>
<html>
<head>
	<title>AGENDA</title>
</head>
<body>
	<center>
		<h1>Introduce tus datos</h1>
		<form method="Post" action="agenda.php">
			Nombre: <input type="text" name="izena"><br><br>
			Email: <input type="text" name="email"><br><br>
			<input type="submit" name="bidali" value="Enviar">
		</form>
		<aside>
			<h2>Agenda</h2>
			<p  id="informacion" style="border: 1px solid black;height: 200px;width: 300px;">
				
				<?php
				if(!isset($_SESSION["agenda"])){
					$_SESSION["agenda"]= array();
				}
				else{
					$agenda=$_SESSION["agenda"];
					if($_POST["bidali"]){
						$agenda[$_POST["izena"]]=$_POST["email"];
						foreach ($agenda as $key => $value) {
							echo "<br>Nombre: ".$key."<br>";
							echo "Correo: ".$value."<br>";
						}
					}
					$_SESSION["agenda"]=$agenda;
				}
				
				?>
			</p>
		</aside>
	</center>
</body>
</html>