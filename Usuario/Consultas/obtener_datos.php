<?php
include("../../conexion/conexionbd.php");
//$curp=$_REQUEST["user"];
// Verificar conexión

// Obtener la variable enviada desde JavaScript
$edad =$_REQUEST['curp'];
$cadena="SIN VALIDAR";

// Consulta SQL para obtener los datos filtrados por edad
//$sql = "SELECT curp,nombre_completo,correo,telefono FROM usuarios WHERE curp = ?";
//Consulta SQL para las faltas de los usuarios..
$sql="SELECT faltas.curp, 
           usuarios.curp, 
           usuarios.nombre_completo, 
           usuarios.telefono,
           usuarios.correo,
           faltas.estado,
           faltas.fecha,
           faltas.motivo
FROM faltas,usuarios 
WHERE faltas.curp= ? and faltas.curp=usuarios.curp and faltas.estado='SIN VALIDAR'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $edad); // "i" indica que es un entero
$stmt->execute();
$result = $stmt->get_result();

// Convertir los resultados a un array asociativo
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar la conexión
$stmt->close();
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>