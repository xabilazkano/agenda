<?php
session_start();
if(!isset($_SESSION["agenda"])){
	$_SESSION["agenda"]= array();
	$_SESSION["name"]=$_POST["nombre"];
}
?>
<html>
<head>
	<title>AGENDA</title>
</head>
<body>
	<center>
		<h1>AGENDA DE <?php echo strtoupper($_SESSION["name"]) ?></h1>
		<form method="Post" action="agenda.php">
			Nombre: <input type="text" name="izena"<?php
			if(isset($_POST["izena"])){
				echo "value=".$_POST['izena'];
			}
			?>><br><br>
			Email: <input type="email" name="email"<?php
			if(isset($_POST["email"])){
				echo "value=".$_POST['email'];
			}
			?>
			><br><br>
			<input type="submit" name="bidali" value="Enviar">
		</form>
		<aside>
			<h2>Agenda</h2>
			<p  id="informacion">
				
				<?php
				if($_POST["bidali"]){
					$izena=strtolower($_POST["izena"]);
					$email=strtolower($_POST["email"]);
					$agenda=$_SESSION["agenda"];
					if($_POST["izena"]!=""){

						if(!array_key_exists($izena,$agenda)){
							if($_POST["email"]!=""){
								$agenda[$izena]=$email;
								foreach ($agenda as $key => $value) {
									echo "<br>Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";

								}

							}
							else{
								echo "No has introducido ningun correo";
							}
						}
						else{
							if($email!=""){
								$agenda[$izena]=$email;
								foreach ($agenda as $key => $value) {
									echo "<br>Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";
								}
							}
							else{
								unset($agenda[$izena]);
								foreach ($agenda as $key => $value) {
									echo "<br>Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";
								}
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