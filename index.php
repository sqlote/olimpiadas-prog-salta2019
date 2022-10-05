<!DOCTYPE html>
<html>
<head>
	<title>	Museo Intuitivo </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/bootsrap.min.css">

</head>
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
?>
<center>
      	<div class="container">	
      
      	<h3 class="display-5"> Bienvenido al menu de gestion del museo Intuitivo Digital. </h3> <br><br> 
     
     </div>



      <div class="container">
     
      <!--	<div class="col-4"><a href="agregar-obra.php"> <img src="icon-gestion.jpg" float="left" width="200" height="200"> <h5 class="display-4"> Gestion de Obras </a></div> -->
      
      		<div ><a href="login-vali.php"> <img src="icon-login.png" float="left" width="100" height="100"> <h5 class="display-5"> Login Admins </a></div>
      		<!--		<div class="col-6"><a href="gallery.php"> <img src="icon-gallery.png" float="left" width="110" height="110"> <h5 class="display-5"> Galeria </a></div> -->
    
       </div>
        </center>
      		

      </div>
		</div>