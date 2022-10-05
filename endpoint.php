<?php

    // archivo endpoint.php guardado en el server de mysql
    // te conectas y asignas a $link la conexión esa
$servername = "localhost";
$database = "cuello";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      $ar_salida = array();
}
 
echo "Se conecto piola" . " <br>";
    $query = "SELECT id_obra,nombre_obra,desc_obra,fec_hasta_obra,fec_desde_obra,foto_obra FROM obras  WHERE fec_hasta_obra >= DATE() AND fec_desde_obra <= DATE()";

    $resultado = mysqli_query($link,$query);

    if (mysql_affected_rows($link)>0){
        $ar_salida['datos']=array();
        $cantidad = 0;
        while ($fila = mysql_fetch_array($resultado)){
                $cantidad++;
                $ar_salida['datos'][] = [
                    "id"=>$fila['id_obra'],
                    "nombre"=>$fila['nombre_obra'],
                    "desc"=>$fila['desc_obra'],
                    "desde"=>$fila['fec_desde_obra'],
                    "hasta"=>$fila['fec_hasta_obra'],
                    "foto"=>$fila['foto_obra'],
                ];
            };
            $ar_salida['cantidad'] = $cantidad;
    }else{
        $ar_salida = ["cantidad"=>0];
    };
    return $ar_salida;

?>