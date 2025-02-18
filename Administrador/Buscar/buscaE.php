<?php
include("../../conexion/conexionbd.php");
//incluimos el archivo para la conexion
//traemos la variable del formulario (ajax)
//header("Content-Type: application/json");

if (isset($_POST['clave'])) {
    $curp = $_POST['clave'];

    $sql = "SELECT correo, nombre_completo FROM usuarios WHERE curp = '".$curp."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Retornar resultados como JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(null);
    }

    $conn->close();
}
?>
