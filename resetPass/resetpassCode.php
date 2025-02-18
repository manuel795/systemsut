<?php 
require_once('../../login/conexion/conex.php');


$id = $_POST['IDuser'];
$new_password = $_POST['password'];


$query = "UPDATE usuarios SET password = ? WHERE id = ?";
$stmt = $conn -> prepare($query);
$stmt -> bind_param("si", $new_password, $id);
$result = $stmt -> execute();

if ($result) {
    $_SESSION['regisExitoso'] = "La contraseña se ha actualizado correctamente.";
} else {
    $_SESSION['Inicio_Fallido'] = "Error al actualizar la contraseña.";
}

header("Location: ../../../index");
exit();

echo $_SESSION['Inicio_Fallido'];