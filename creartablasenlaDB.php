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
$sql="CREATE TABLE MASCOTA (nombre VARCHAR(20),raza VARCHAR(20), dueño VARCHAR(20))"; //Sintaxis tipica MySQL
if ($connection->query($sql)===TRUE){
    echo "Tabla Mascota creada";
} else{
    echo "Error al crear la Tabla Gatos";
}
// CrearTablaPersonas
$connection->select_db($database);
$sql="CREATE TABLE DUEÑO (nombre VARCHAR(20), telefono INT)";
if ($connection->query($sql)===TRUE){
    echo "Tabla Personas creada";
} else{
    echo "Error al crear la Tabla Personas";
}
?>