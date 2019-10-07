<?php
session_start();
if(!isset($_SESSION["agenda"])){
	$_SESSION["agenda"]= array();
}
?>
<html>
<head>
	<title>AGENDA</title>
</head>
<body>
	<center>
		<h1>Introduce tus datos</h1>
		<form method="Post" action="agenda.php">
			Nombre: <input type="text" name="izena"<?php
			if(isset($_POST["izena"])){
				echo "value=".$_POST['izena'];
			}
			?>><br><br>
			Email: <input type="text" name="email"<?php
			if(isset($_POST["email"])){
				echo "value=".$_POST['email'];
			}
			?>
			><br><br>
			<input type="submit" name="bidali" value="Enviar">
		</form>
		<aside>
			<h2>Agenda</h2>
			<p  id="informacion" style="border: 1px solid black;height: 200px;width: 300px;">
				
				<?php
				
				
					
					if($_POST["bidali"]){
						$agenda=$_SESSION["agenda"];
						if(trim($_POST["izena"])!=""){
							if(!array_key_exists($_POST["izena"],$agenda)){
								$agenda[$_POST["izena"]]=$_POST["email"];
								foreach ($agenda as $key => $value) {
									echo "<br>Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";
								}
							}
							else{
								if(trim($_POST["email"])!=""){
									$agenda[$_POST["izena"]]=$_POST["email"];
									foreach ($agenda as $key => $value) {
										echo "<br>Nombre: ".$key."<br>";
										echo "Correo: ".$value."<br>";
									}
								}
								else{
									echo "No has introducido ningun correo";
								}
							}
						}
						else{
							echo "No has introducido el nombre";
						}	
					}
					$_SESSION["agenda"]=$agenda;
				?>
			</p>
		</aside>
	</center>
</body>
</html>