<html>
  <head>
    <title>Proceso de insercion de nuevo vendedor</title>
  </head>
  <body>
    <h1>Guardando el nuevo vendedor...</h1>
  
<?php 

//incluimos la clase con la que trabajamos
require("./vendedores.php");


//recoger valores del form
$nombre = $_POST["nombre"];
$dni = $_POST["dni"];
$direccion = $_POST["direccion"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];



//hemos recogido datos del formulario... creamos objeto
$vendedorNuevo = new Vendedor($nombre,$dni,$direccion,$email,$telefono);



//Vamos a por la
$SQLInsertVendedor = $vendedorNuevo->getInsertVendedoresSQL();

echo "La sentencia SQL a ejecutar es: ".$SQLInsertVendedor."<br>";

$servername = "bbdd";
$username = "root";
$password = "secret";

try {
  $conn = new PDO("mysql:host=$servername;dbname=iaw_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}

try {
    //la function exec está programada en la clase PDO,
    // y he leido que lo que hace es ejecutar el SQL que tenga
    //el parámetro dentro de la mysql a la que estemos conectados
   $conn->exec($SQLInsertVendedor);
   echo "Inserci&oacute;n correcta";
} catch (PDOException $e) {
    echo "Insert failed: " . $e->getMessage();
    die();
}

//cerramos la conexión
$conn = null;


?>
<a href="./index.html">Volver a inicio</a>
</body>
</html>
