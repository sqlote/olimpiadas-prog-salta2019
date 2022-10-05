<?
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

$nombreobra=$_POST["nombre"];
$descripcion= $_POST["desc_obra"];
$foto = $_FILES["foto"];
$foto_url = $_POST["foto_url"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>	Museo Intuitivo </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/bootsrap.min.css">

</head>
<center>
<div >
<h4 class="display-4"> <?php echo $nombreobra; ?> </h4>
<h6>Pintura:</h6>

<img src=" <?php echo $foto_url; ?>"> <br> <br>

<p class="container bg-success py-5 text-white"> <?php echo $descripcion; ?> </p>




<!-- <iframe src="//commons.wikimedia.org/wiki/File:Es-La_Gioconda-article.ogg?embedplayer=yes" > -->

</center>