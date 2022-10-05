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
 
 //var_dump($_FILES["file"]);
    
    $directorio = "img/";
    $archivo = $directorio . basename($_FILES["foto"]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    // valida que es imagen
    $veriSiImagen = getimagesize($_FILES["foto"]["tmp_name"]);
    //var_dump($size);
    if($veriSiImagen != false){
        //validando tamaño del archivo
        $size = $_FILES["foto"]["size"];
        if($size > 500000){
            echo "El archivo tiene que ser menor a 500kb";
        }else{
            //validar tipo de imagen
            if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                // se validó el archivo correctamente
                if(move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo)){
                    echo "El archivo se subió correctamente";
                }else{
                    echo "Hubo un error en la subida del archivo";
                }
            }else{
                echo "Solo se admiten archivos jpg/jpeg";
            }
        }
    }else{
        echo "El documento no es una imagen";
    }


$nombre = $_POST['nombre'];
   $desc_obra = $_POST['desc_obra'];
   $fotosql = $directorio . basename($_FILES["foto"]["name"]);
   $sql = "INSERT INTO obra(nombre_obra, desc_obra, foto_obra VALUES ('$nombre','$desc_obra','$fotosql')";
   $result= $conn->query($sql);


header("location:agregar-obra-session.php")
   ?>