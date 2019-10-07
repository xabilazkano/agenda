<?php
session_start(); //inicia sesion
if(!isset($_SESSION["agenda"])){ //si la variable de sesion agenda no esta creada crea un array y guarda en otra variable el nombre recibido del index
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
			if(isset($_POST["izena"])){ //si hemos enviado información escribe el último nombre
				echo "value=".$_POST['izena'];
			}
			?>><br><br>
			Email: <input type="email" name="email"<?php
			if(isset($_POST["email"])){//si hemos enviado información escribe el último email
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
					$izena=strtolower($_POST["izena"]);//guardamos en variables el nombre y el email
					$email=strtolower($_POST["email"]);
					$agenda=$_SESSION["agenda"]; //cargamos el array en una variable
					if($_POST["izena"]!=""){

						if(!array_key_exists($izena,$agenda)){//comprueba si el contacto existe
							if($_POST["email"]!=""){//comprueba que el email no está vacio
								$agenda[$izena]=$email;//añade el nuevo contacto
								foreach ($agenda as $key => $value) { //imprime la agenda
									echo "<br>Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";

								}

							}
							else{
								echo "No has introducido ningun correo";
							}
						}
						else{
							if($email!=""){//si el contacto existe actualizamos el email
								$agenda[$izena]=$email;
								foreach ($agenda as $key => $value) {//imprime la agenda
									echo "<br>Nombre: ".$key."<br>";
									echo "Correo: ".$value."<br>";
								}
							}
							else{
								unset($agenda[$izena]); //si el contacto existe y no se ha introducido ningun email se elimina el contacto
								foreach ($agenda as $key => $value) {//imprime la agenda
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
				$_SESSION["agenda"]=$agenda;//volvemos a cargar la agenda en la variable de sesion
				?>
			</p>
		</aside>
	</center>
</body>
</html>