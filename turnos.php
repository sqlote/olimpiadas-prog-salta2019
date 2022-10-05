<?php
$servername = "localhost";
$database = "olimpiadas";
$username = "root";
$password = "";
// crear conec
$conn = mysqli_connect($servername, $username, $password, $database);
// comprueba de coneccion
if (!$conn) {
      die("No conectado: " . mysqli_connect_error());
}
 
#echo "Conectado.";
?>
<!DOCTYPE html>
<html>
<head>
	<title>	Visitas guiadas </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/bootsrap.min.css">

</head> 
<center>
	<div class="container bg-success py-5 text-white"> 
	<h1 class="display-4"> Gestion de turnos de visitas guiadas </h1> <br><br>

	<form action="carga_turnos.php" method="post">
		Nombre: <input name="cliente" type="text" placeholder="Nombre de Cliente"> <br><br>
 	Fecha: <input name="fecha" type="text" placeholder="DD/MM/AAAA"> <br><br>
 	<input class="btn btn-light" name="agregar" type="submit" value="Guardar">
 </center>
</div>
<a href="index.php"> Volver al menú </a>    

<?php
$sql = "SELECT `nombre_cliente`, `fecha` FROM `turnos`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // salida de datos
    while($row = mysqli_fetch_assoc($result)) {
        echo " <center> 
        <div class='container'>
        <b> Nombre del Cliente: </b>  " . $row["nombre_cliente"].  " <b>Fecha:</b> " . $row["fecha"]. "";
    }
} else {
    echo "0 results";
}
?>
