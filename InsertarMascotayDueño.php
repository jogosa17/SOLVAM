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

//Obtener datos desde el formulario del HTML
$mascota = $_GET['mascota'];
$raza = $_GET['raza'];
$propietario = $_GET['propietario'];
$telefono = $_GET['tel'];

$existe=0; //las explico más tarde
$aux=""; //las explico más tarde

$connection = mysqli_connect($servername, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    if (($mascota==NULL OR $raza==NULL OR $propietario==NULL OR $telefono==NULL)){
        echo "Te faltan datos, vuelve a introducirlos <br> <form action='RegistrarMascota.php' method='get'> <input type='submit' value='volver'> </form> ";
    }
    else{
        $connection->select_db($database);
        // Insertar mascota
        $sql = "INSERT INTO Mascota (nombre, raza ,propietario) VALUES ('".$mascota."','".$raza."','".$propietario."');";
        $result= mysqli_query($connection, $sql); //lo mismo que hacíamos con el $connection->query($sql) pero con sintaxis sqli
        echo " Se ha insertado ".$mascota." correctamente! <br>";

        //Insertar Propietario
        $sql = "INSERT INTO Propietario (propietario, telefono) VALUES('".$propietario."','".$telefono."');";
        $result= mysqli_query($connection, $sql); //lo mismo que hacíamos con el $connection->query($sql) pero con sintaxis sqli
        echo " Se ha insertado ".$propietario." correctamente! <br>";
    }

}
?>
<br>
<form action='indexconsulta.html' method='get'>
<input type='submit' value='Volver al inicio'>
</form>
</body>
</html>