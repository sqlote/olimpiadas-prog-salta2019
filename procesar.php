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
  # $resultado = $conn -> query($query);

 #$sql = "INSERT INTO `obras` (`nombre_obra`, `desc_obra`, 'foto_obra') VALUES ('$nombre', '$desc_obra', '$foto');";
  if (mysqli_query($conn, $sql)) {
      echo "Se agregó correctamente" . "<br>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>

 <a href="ejercicio.php"> Volver </a>

	<body>
	
	</body>
	</html>