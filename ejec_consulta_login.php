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

$user= $_POST["user"];
$pass= $_POST["pass"];

$sql="SELECT * FROM `admin` WHERE user_adm = '$user' and pass_adm = '$pass'";
$result=mysqli_query($conn, $sql);

 $filas=mysqli_num_rows($result);
 	if($filas>0) {
 		header("location:agregar-obra.php");
 	}
 	else 
 		header("location:login-error.html");
?>