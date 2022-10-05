<?php
$servername = "localhost";
$database = "olimpiadas";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("No conectado: " . mysqli_connect_error());
}
 
#echo "Conectado.";

$cliente = $_POST['cliente'];
   $fecha = $_POST['fecha'];

  $sql = "INSERT INTO `turnos` (`nombre_cliente`, `fecha`) VALUES ('$cliente', '$fecha');";
  if (mysqli_query($conn, $sql)) {
      echo "Se agregó correctamente" . "<br>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("location:turnos.php")

?>
