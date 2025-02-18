<?php
include("../../conexion/conexionbd.php");


$nombre= $_REQUEST['nombre'];
$telefono= $_REQUEST['telefono'];
$correo = $_REQUEST['correo'];
$user = $_REQUEST['user'];
$pass1 = $_REQUEST['pass'];
//$pass2 = $_REQUEST['password'];
$curp= $_REQUEST['curp'];
$estado= $_REQUEST['estado'];
$privilegios = $_REQUEST['privilegio'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO usuarios (curp,nombre_completo,telefono,correo,user,pass,imagen_perfil,estado,privilegio) 
        VALUES ('$curp','$nombre','$telefono', '$correo', '$user','$pass1','','$estado','$privilegios')";

if ($conn->query($sql) === TRUE) { 
    echo "Datos insertados exitosamente"; 
} else { 
    echo "Error: " . $sql . "<br>" . $conn->error; 
}
// Cerrar la conexión

$conn->close();
?>
