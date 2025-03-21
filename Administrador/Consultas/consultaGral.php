<?php
include("../../conexion/conexionbd.php");
// get_data.php
header("Content-Type: application/json");

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

$sql = "SELECT * FROM usuarios ORDER BY nombre_completo DESC";
$result = $conn->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$conn->close();

echo json_encode($usuarios);
?>
