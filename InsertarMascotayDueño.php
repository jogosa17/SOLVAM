<html>
<head>
<title>Buscador mascotas</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="MASCOTAS";
$mascota = $_GET['mascota'];
$persona = $_GET['nombre'];
$raza = $_GET['raza'];
$telefono = $_GET['tel'];
$existe=0; //las explico más tarde
$aux=""; //las explico más tarde
$connection = mysqli_connect($servername, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    if (($mascota==NULL OR $persona==NULL OR $telefono==NULL)){
        echo "Te faltan datos, vuelve a introducirlos"<br><form action='consulta.php' method='get'><input type='submit' value='volver'></form>
    }
    else{
        $sql = "INSERT INTO 'mascotas' ('nombre','dueño') VALUES('".$mascota."','".$persona."');";
    }
//echo "Connected successfully<br>";

// buscamos en la BD el valor persona asociado al valor gato GUS u otro gato
$connection->select_db($database);
$name = $_GET['nombredueño'];//Sintaxis TIPICA PHP
$sql = "SELECT dueño FROM MASCOTA WHERE nombre='$name'";//Sintaxis tipica MySQL
$result= mysqli_query($connection, $sql); //lo mismo que hacíamos con el $connection->query($sql) pero con sintaxis sqli

}
?>
<br>
<form action='indexconsulta.html' method='get'>
<input type='submit' value='Volver al inicio'>
</form>
</body>
</html>