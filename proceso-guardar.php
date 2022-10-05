<!DOCTYPE HTML>
	<!DOCTYPE html>
	<html>
	<head>
		<title> Envio de Datos a la BD</title>
	</head>
	
<?php
$servername = "localhost";
$database = "olimpiadas";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Se conecto Correctamente" . "<br>";
 
   $nombre = $_POST['nombre'];
   $desc_obra = $_POST['desc_obra'];
   $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
   $sql = "INSERT INTO obra(nombre_obra, desc_obra, foto_obra VALUES ('$nombre','$desc_obra','$foto')";
   $result= $conn->query($sql);

   if ($result) {
   	echo "Imagen insertada";
   }
  else{
   	echo "Imagen no insertada";
}
   ?>