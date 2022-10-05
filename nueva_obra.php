<!DOCTYPE html>


<head>

  <link href="css/style.css" rel="stylesheet">
  

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

?>

<br>


<!--        <h3> Ingresar una nueva obra </h3> <br>

        <div id="subir_obra">
        <form action="subir.php" method="post">
         <label> Nombre de la Obra: </label> <br>
         <br>
          <input name="nombre_obra" type="text" placeholder="Inserte Nombre de la obra" > <br>
          <br>
          <label>Descripcion de la Obra: </label><br>
          <br>

          <input name="desc_obra" type="text" placeholder="Inserte una descrpcion (Max. 60 Caract.)"> <br>
        <br> <ul class="submit"> <input name="enviar_obra" type="submit" value="Enviar"> </ul>  
        </form>
        </div> !-->
<?php
if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
    {
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);
        //echo "<BR>".$info[0]; //anchura
        //echo "<BR>".$info[1]; //altura
        //echo "<BR>".$info[2]; //1-GIF, 2-JPG, 3-PNG
        //echo "<BR>".$info[3]; //cadena de texto para el tag <img
 
        # Escapa caracteres especiales
        $imagenEscapes=$conn->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
 
        # Agregamos la imagen a la base de datos
        $sql="INSERT INTO `imagephp` (anchura,altura,tipo,imagen) VALUES (".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";
        $conn->query($sql);
 
        # definimos el identificador con que se ha guardado
        $id=$conn->insert_id;
 
        # Mostramos la imagen agregada
        echo "<div class='mensaje'>Imagen agregada con el id ".$id."</div>";
    }else{
        echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
    }
}
?>
 
<h2>Selecciona una imagen</h2>
<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
   
    <label> Nombre de la Obra: </label> <br>
 <br>
  <input name="nombre_obra" type="text" placeholder="Inserte Nombre de la obra" > <br>
  <br>
  <label>Descripcion de la Obra: </label><br>

  <br>

  <input name="desc_obra" type="text" placeholder="Inserte una descrpcion (Max. 60 Caract.)"> <br>
  <input name="userfile" type="file">
    <p><input type="submit" value="Guardar Imagen"> 
</form>
 
<h2>Listado de las imagenes añadidas a la base de datos</my>
<div class="listadoImagenes">
    <?php
    $result=$conn->query("SELECT * FROM imagephp ORDER BY id DESC");
    if($result)
    {
        while($row=$result->fetch_array(MYSQLI_ASSOC))
        {
            echo "<img src='imagen_mostrar.php?id=".$row["id"]."' width='".$row["anchura"]."' height='".$row["altura"]."'>";
        }
    }
    ?>
</div>
</body>
</html>
