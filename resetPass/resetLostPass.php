<?php
//session_start(); // Iniciar o reanudar la sesión

include('./conexion/conexionbd.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico del formulario
    $correo = $_POST['correo'];

    // Consulta SQL para verificar si el correo electrónico existe en la base de datos
    $sql = "SELECT curp FROM usuarios WHERE correo = ?";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("s", $correo);
    $stmt -> execute();
    $result = $stmt -> get_result();

    // Verificar si se encontró el correo electrónico en la base de datos
    if ($result -> num_rows > 0) {
        // El correo electrónico existe, obtenemos el ID del usuario
        $row = $result -> fetch_assoc();
        $id_usuario = $row['curp'];
        $server_host = $_SERVER['HTTP_HOST'];
        // Construir la URL con el ID del usuario
        //$url = "https://$server_host/funciones/correo/index.php?ID_user=$id_usuario";
        $url = "./resetPass/resetpass.php?ID_user=$id_usuario";

        // Realizar una solicitud GET al archivo correo/index.php con el ID del usuario
        $response = file_get_contents($url);

        // Verificar si la solicitud se realizó correctamente
        if ($response !== false) {
            // La solicitud se realizó correctamente, puedes continuar con el código aquí
            $_SESSION['notificacion_positiva'] = "La solicitud se realizó correctamente.";
        } else {
            // La solicitud no se pudo realizar
            $_SESSION['notificacion_negativa'] = "Error: La solicitud no se pudo realizar.";
        }
        // header ("Location: ../../../index");


        // Puedes verificar la respuesta si lo deseas
        // Por ejemplo, si necesitas manejar errores o realizar alguna acción basada en la respuesta

        // Aquí podrías añadir código adicional para manejar la respuesta si es necesario

        // Ahora puedes redirigir al usuario a donde sea necesario
        $_SESSION['notificacion_positiva'] = "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
        header("Location: ../index");
        exit();
    } else {
        // El correo electrónico no existe en la base de datos
        $_SESSION['notificacion_negativa'] = "El correo electrónico proporcionado no está registrado.";
        header("Location: ../index");
        exit();
    }
} else {
    // Si el formulario no se envió correctamente, redirigir a la página de formulario de restablecimiento de contraseña
    header("Location: ../index");
    exit();
}
