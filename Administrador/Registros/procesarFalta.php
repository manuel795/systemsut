<?php
include("../../conexion/conexionbd.php");


$curp= $_REQUEST['curp'];
$fecha = $_REQUEST['fecha'];
$motivo = $_REQUEST['motivo'];
$justificacion = $_REQUEST['justificacion'];
//$pass2 = $_REQUEST['password'];
        $timestamp = strtotime($fecha);
		$fecha1=strftime("%Y-%m-%d", $timestamp);

$estado= $_REQUEST['estado'];


// Preparar y ejecutar la consulta
$sql = "INSERT INTO faltas (id_faltas,fecha,motivo,justificacion,estado,curp) 
        VALUES ('', '$fecha1','$motivo','$justificacion','$estado','$curp')";

if ($conn->query($sql) === TRUE) { 
    echo "Datos insertados exitosamente"; 
} else { 
    echo "Error: " . $sql . "<br>" . $conn->error; 
}
// Cerrar la conexión

$conn->close();
?>
