<?php
// Podriamos haber hecho en un SOLO script crear la tabla e insertar los datos, SIN NINGUN PROBLEMA
$servername = "localhost";
$username = "root";
$password = "";
$database="MASCOTAS";
// Idem siempre
$connection = new mysqli($servername, $username, $password, $database);
// Chequeo como siempre
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// CrearRegistrosPruebaenTablaGatos
$connection->select_db($database); //seleccion de la DB
$sql = "INSERT INTO Mascota VALUES ('Gus','Gato','Carlos')"; //Sintaxis tipica MySQL
if ($connection->query($sql)===TRUE){
    echo "registro 1 creado";
} else{
    echo "Error al crear el registro";
}
// CrearRegistrosPruebaenTablaPersonas
$connection->select_db($database);
$sql = "INSERT INTO Propietario VALUES ('Carlos','612345678')";
if ($connection->query($sql)===TRUE){
    echo "registro 2 creado";
} else{
    echo "Error al crear el registro";
}
?>
