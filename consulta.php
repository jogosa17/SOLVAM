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
$existe=0; //las explico más tarde
$aux=""; //las explico más tarde
$connection = mysqli_connect($servername, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully<br>";

// buscamos en la BD el valor persona asociado al valor gato GUS u otro gato
$connection->select_db($database);
$name = $_GET['nombredueño'];//Sintaxis TIPICA PHP
$sql = "SELECT dueño FROM MASCOTA WHERE nombre='$name'";//Sintaxis tipica MySQL
$result= mysqli_query($connection, $sql); //lo mismo que hacíamos con el $connection->query($sql) pero con sintaxis sqli


/* Buscamos en la DB el dueño de ese gato pero ojo si el gato NO existe no entra en el siguiente while porque ese $result=0
 Es complejo explicar sin pizarra ese while,y ese $row, baste decir que si la query resultó correcta, en ese $row se almacena el campo 'persona' aunque esté vacío,
 ahora se entiende que si el gato no existe, ese $row sera siempre un elemento nulo (OJO, nulo no significa VACIO por lo que no entra en el while)
 dicho de otro modo: si entra en el while sólo pasa una vez por el, porque siempre hay un campo 'persona' aunque sea vacío*/

while ($row = mysqli_fetch_assoc($result)){
$aux=$row['dueño'];//podríamos prescindir de esa var $aux, es por mayor claridad y comodidad
if($aux!=""){
echo " DUEÑO ".$aux;} //Ojo a esta sintaxis
$existe++;//Pongo esa variable a 1 para indicar que he pasado por el while, es decir, el gato existe
}

/* ya nos ha visualizado el dueño
 pueden suceder 3 cosas: que el gato exista con dueño, que exista sin dueño y que no exista
 uso la variable auxiliar existe para verificar si el perro existe porque
 caso de que no exista no entra en el while y no aumenta esa variable*/

//echo $existe;//para visualizar el valor de esa variable si necesario
if($existe==0){
echo "<br> NO HAY MASCOTA REGISTRADA CON EL NOMBRE DE ".$name."<br>¿DESEA REGISTRARLO?<br>EN ESE CASO ACUDA A<br><A HREF='XXX.php'> La ventana de registro</A><br>CASO DE NO QUERER REGISTRALO<br> <A HREF='indexconsulta.php'>Abandone la aplicación</A><br>";} //OJO a como se inserta HTML dentro de PHP

// contemplamos ahora el caso de que exista gato sin dueño: ESTE ASPECTO ES UN EXTRA SI LO COMPLETAIS DE ALGÚN MODO (vuestra imaginación...)

if($aux=="" && $existe!=0){
echo "<br> NO HAY dueño REGISTRADO para el gato ".$name;}// Ojo a la sintaxis

// contemplamos ahora el caso de que exista gato con dueño para visualizar telefono

if($aux!="" && $existe!=0){
$sql = "SELECT telefono FROM dueño WHERE nombre='$aux'";
$result= mysqli_query($connection, $sql);//MISMA explicación que para la anterior consulta
while ($row = mysqli_fetch_assoc($result)){
$aux2=$row['telefono'];
if($aux2!=""){
echo " EL TELEFONO ES ".$row['telefono'];}
}
}
?>
<br>
<form action='indexconsulta.html' method='get'>
<input type='submit' value='Volver al inicio'>
</form>
</body>
</html>