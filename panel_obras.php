<!DOCTYPE html>
<head>
	</head>


<body>	
<?php
$servername = "localhost";
$database = "olimpiadas";
$username = "root";
$password = "";
// Cse crea la coneccion
$conn = mysqli_connect($servername, $username, $password, $database);
// comprobamos coneccion
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Conectado" . " <br>";

$sql = "SELECT id_obra, nombre_obra, foto_obra FROM tabla1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "
 <form action='borrar.php' method='post'>
    
        ID de Obra: " . $row["id_obra"].  "//  Nombre de la Obra: " . $row["nombre_obra"]. " //  Vista Previa: " . $row["foto_obra"]. "<input type='hidden' name='Id' value='".$row["id_obra"]."'>"    . "<input type='submit' value='Borrar'>" . "</form> <br>";
    }
} else {
    echo "0 Resultados";
}
?>

 <a href="panel_obras.php"> Actualizar </a>

</body>