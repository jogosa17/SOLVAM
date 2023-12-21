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
        <h1>¡Ayúdame a volver a casa!</h1>
        <img style="" class="img-perrogato" src="img/perrogato.jpg" alt="">
    </div>
    <div class="en cabecera">
        <h1>Help me get back home!</h1>

        <img style="" class="img-perrogato" src="img/perrogato.jpg" alt="">
    </div>
    <div class="fr cabecera">
        <h1>Aide-moi à rentrer à la maison !</h1>

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
</div>



<img style="" class="hamburguer" src="img/huella.png" alt="" onclick="openNav()">
<nav id="myMenu" class="menu-navegacion">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="es">
        <a href="#inicio">Inicio</a>
        <a href="#subtitulo">¿Qué es RSIAC?</a>
        <a href="#enlaces-interes">Enlaces de interés</a>
        <a href="#footer">Contacto</a>
    </div>

    <div class="en">
        <a href="#inicio">Menu</a>
        <a href="#subtitulo">What is RSIAC?</a>
        <a href="#enlaces-interes">Links of interest</a>
        <a href="#footer">Contact</a>
    </div>
    <div class="fr">
        <a href="#inicio">Accueil</a>
        <a href="#subtitulo">Qu’est-ce que le RSIAC?</a>
        <a href="#enlaces-interes">Liens d'intérêt</a>
        <a href="#footer">Contact</a>
    </div>

    <div class="contenedor-idioma">
        <img class="img-idioma" onclick="changeLenguaje('es')" src="img/esp_band.png" alt="idioma español">
        <img class="img-idioma" onclick="changeLenguaje('en')" src="img/eng_band.png" alt="idioma inglés">
        <img class="img-idioma" onclick="changeLenguaje('fr')" src="img/fr_band.png" alt="idioma francés">
    </div>
</nav>
</header>

<footer id="footer">
    <div class="footer-content">
        <p>
            <img id="icomap" src="img/iconomapa.png" alt=""/>
            <a id="textmap" href="https://www.google.es/maps/@39.418032,-0.3966606,3a,75y,3.49h,81.78t/data=!3m7!1e1!3m5!1sSjtISJmMsre01MlJwoHt7A!2e0!5s20230201T000000!7i16384!8i8192?entry=ttu">C/ Celia Antón Romeu, 6 46910 - Benetússer, Valencia</a>
        </p>
        <div>
            <a href="https://www.facebook.com/jorge.gonzalezsanchezdelablanca.7/" class="social-media-icon">
                <i class='bx bxl-facebook'></i>
            </a>
            <a href="https://twitter.com/Jogosa94" class="social-media-icon">
                <i class='bx bxl-twitter'></i>
            </a>
            <a href="https://www.instagram.com/jogosa17/" class="social-media-icon">
                <i class='bx bxl-instagram' ></i>
            </a>
            <a href="tel:+34960170415" class="social-media-icon">
                <i class='bx bx-phone-call'></i>
            </a>
            <a href="mailto:jorge.gonzalez@solvam.es" class="social-media-icon">
                <i class='bx bx-envelope' ></i>
            </a>
        </div>
    </div>
</footer>
</body>
<script src="js/menu.js"></script>
<script src="js/lightbox.js"></script>
</html>
