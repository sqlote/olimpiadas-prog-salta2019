<?php 
  session_start();
  $sesion= $_SESSION['user'];

 # echo "Bienvenido $sesion";

  if($sesion == null || $sesion = '') {
    echo "Sesion perdida.";
    die();
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- tags del meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css del bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/bootsrap.min.css">

    <title>Agregar una Obra nueva</title>
  </head>
  <body>
 <!--   <h1 class="display-4"> Bienvenido: <?php echo $sesion ?> </h1> -->
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

 
?>

 <div class="container bg-success py-5 text-white" >
 	<h1 class="display-4 ">Ingrese una nueva obra </h1>
 	<p class="lead">Elija una obra de su galeria y coloque su nombre y una descripcion.</p>
    <form action="proceso-guardar2.php" method="post" enctype="multipart/form-data">
      <input name="nombre" type="text" placeholder="Nombre de la Obra">
           <input name="desc_obra" type="text" placeholder="Descripcion de la obra">
           <input  name="foto" type="file"> 
      <input class="btn btn-light" type="submit" value="Enviar">
      </form>
 </div>

 			<div class="container" ><a href="index.php">Menú principal</a></div>
      <div class="container" ><a href="turnos.php">Programar Visita guiada</a></div>

<?php
#$sql1 = "SELECT nombre_obra, desc_obra, foto_obra FROM obras";
#$result = mysqli_query($conn, $sql1);

#if (mysqli_num_rows($result) > 0) {
    // output data of each row
#    while($row = mysqli_fetch_assoc($result)) {
 #       echo "<center> 
  #      <div class='container'>
  #     <b> Nombre de la Obra:  </b>" . $row["nombre_obra"].  "// <b> Imagen:  </b> " . $row["foto_obra"]. " // <b>Descripcion:  </b>" . $row["desc_obra"].  "<br>";
 #   }
#} else {
#    echo "0 results";
#}

$imgs = dir('img');
while ($img = $imgs -> read())  {
  if (preg_match('/jpg/', $img)) {
        echo "<img src='$img'>" ;
    }
  }
?>