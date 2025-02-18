<?php
session_start();
include("../conexion/conexionbd.php");
header('Content-Type: application/json');


// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta para verificar las credenciales
//$sql = "SELECT curp, nombre_completo, privilegio FROM usuarios WHERE correo = ? AND pass= SHA2(?, 256)";
$sql = "SELECT curp, nombre_completo, privilegio FROM usuarios WHERE correo = ? AND pass= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['curp'];
    $_SESSION['user_nombre'] = $row['nombre_completo'];
    $_SESSION['user_rol'] = $row['privilegio'];
    echo json_encode(["success" => true, "rol" => $row['privilegio']]);
} else {
    echo json_encode(["success" => false, "message" => "Credenciales incorrectas"]);
}

$stmt->close();
$conn->close();
?>
