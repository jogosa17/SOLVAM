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
else{
    echo "Connected successfully";
}

// CrearTablaGatos
$connection->select_db($database); //Seleccion de la BD donde vamos a trabajar porque luego haremos una query sobre esa DB
$sql="CREATE TABLE Mascota (nombre VARCHAR(20), raza VARCHAR(20), propietario VARCHAR(20))"; //Sintaxis tipica MySQL
if ($connection->query($sql)===TRUE){
    echo "Tabla Mascota creada";
} else{
    echo "Error al crear la Tabla Mascota";
}
// CrearTablaPersonas
$connection->select_db($database);
$sql="CREATE TABLE Propietario (propietario VARCHAR(20), telefono INT)";
if ($connection->query($sql)===TRUE){
    echo "Tabla Propietario creada";
} else{
    echo "Error al crear la Tabla Propietario";
}
?>