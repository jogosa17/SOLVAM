<?php
$servername = "localhost"; //el simbolo "$" siempre para indicar VARIABLES
$username = "root";
$password = "";
// Creamos la conexion con la DB
$connection = new mysqli($servername, $username, $password); //mysqli es la versión nueva de mysql POO
// Chequeamos la conexion por seguridad, caso de que no sea posible $connection=0 se acaba todo
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"; //echo es aparecer por pantalla
// CrearDB
$sql="CREATE DATABASE MASCOTAS"; //sentencia tipica SQL devuelve booleano
//$conn->query($sql) es una de las sintaxis para lanzar una query, hay otras
if ($connection->query($sql)===TRUE){ //query es =  a consulta
echo "Base de datos creada";
} else{
echo "Error al crear la DB";
}
?>