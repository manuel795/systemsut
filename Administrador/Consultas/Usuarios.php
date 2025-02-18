<?php
include("../../conexion/conexionbd.php");
// get_data.php
header("Content-Type: application/json");


// Consulta SQL
$sql = "SELECT id_user, nombre_completo,telefono,correo, user, pass,estado,privilegio,curp FROM usuarios"; // Reemplaza 'usuarios' con tu tabla
$result = $conn->query($sql);

// Array para guardar los resultados
$data = [];

// Verifica si hay resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Devuelve los datos en formato JSON
echo json_encode($data);

$conn->close();
?>
