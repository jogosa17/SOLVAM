<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="MASCOTAS";
// SIEMPRE "abro" la conexion ya que necesito un valor para esa variable
$connection = new mysqli($servername, $username, $password, $database);
// Chequeo de la misma
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// CrearTablaGatos
$connection->select_db($database); //Seleccion de la BD donde vamos a trabajar porque luego haremos una query sobre esa DB
$sql="DROP TABLE Mascota"; //Sintaxis tipica MySQL
if ($connection->query($sql)===TRUE){
    echo "Tabla Mascota eliminada";
} else{
    echo "Error al eliminar la Tabla Gatos";
}
// CrearTablaPersonas
$sql="DROP TABLE Dueño";
if ($connection->query($sql)===TRUE){
    echo "Tabla Dueño eliminada";
} else{
    echo "Error al eliminar la Tabla Dueño";
}
?>
