<html>
<head>
    <meta charset="UTF-8">
    <title>RSIAC - Red Solvam de Identificación de Animales de Compañía</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<header class="header" id="inicio">
    <div class="es cabecera">
        <img style="" class="img-perrogato" src="img/perrogato.jpg" alt="">
    </div>



    <div style="border: #3e8e41 1px; align-content: center; text-align: center; font-size: 30px">
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
        echo "Te faltan datos, vuelve a introducirlos <br> <form action='RegistrarMascota.php' method='get'> <input type='submit' value='Registro'> </form> ";
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
<input type='submit' value='Consulta'>
</form>
</div>
</header>
</body>
</html>
