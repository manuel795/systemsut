<?php
//session_start(); // Iniciar o reanudar la sesión

include('../conexion/conexionbd.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>   
<?php
// Función para desencriptar el ID
function decrypt_id($encrypted_id, $secret_key, $secret_iv)
{
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($encrypted_id), $encrypt_method, $key, 0, $iv);
    return $output;
}

// Claves de encriptación
$secret_key = "secretaria";
$secret_iv = "educacion";

// Desencriptar el ID del usuario recibido desde la URL
$encrypted_id = $_GET['ID_user']; // Asegúrate de que este sea el nombre correcto del parámetro en la URL
$idUser = decrypt_id($encrypted_id, $secret_key, $secret_iv);

// Aquí puedes continuar con tu lógica de autenticación o restablecimiento de contraseña
// Por ejemplo, puedes usar $idUser para obtener los detalles del usuario de la base de datos
// y permitirle restablecer su contraseña
?>


<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">

                        <?php if (isset($_SESSION['erroPassword'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['erroPassword']; ?>
                            </div>
                        <?php
                            unset($_SESSION['erroPassword']); // Limpiar el mensaje de error
                        }
                        ?>
                        <?php if (isset($_SESSION['Inicio_Fallido'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['Inicio_Fallido']; ?>
                            </div>
                        <?php
                            unset($_SESSION['Inicio_Fallido']); // Limpiar el mensaje de error
                        }
                        ?>
                        <?php if (isset($_SESSION['regisExitoso'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_SESSION['regisExitoso']; ?>
                            </div>
                        <?php
                            unset($_SESSION['regisExitoso']); // Limpiar el mensaje de error
                        }
                        ?>
                        <!-- Logo -->
                        <div class="app-brand justify-content-center text-center">
                            <a href="index.php" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="public/img/logoseduclogin.png" alt="logo" style="width: 90%;" class="mx-auto">
                                </span>
                            </a>
                        </div>

                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenido! 👋</h4>
                        <p class="mb-4">Restablece tu contraseña</p>
                        <form action="resetpassCode.php" id="formAuthentication" class="mb-3 user" method="POST">
                            <input type="hidden" value="<?php echo $idUser; ?>" name="IDuser">
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="passwordRepeat">Repetir Contraseña</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="passwordRepeat" class="form-control" name="passwordRepeat" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="passwordRepeat" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <!-- Div para mostrar mensaje de error -->
                                <div id="error-message" class="alert alert-danger" style="display: none;">Las contraseñas no coinciden</div>
                                <!-- Fin del div para mensaje de error -->
                                <button class="btn btn-primary d-grid w-100" type="submit">Actualizar Contraseña</button>
                            </div>
                        </form>

                        <script>
                            $(document).ready(function() {
                                $('#formAuthentication').on('submit', function(event) {
                                    var password = $('#password').val();
                                    var passwordRepeat = $('#passwordRepeat').val();

                                    if (password !== passwordRepeat) {
                                        event.preventDefault();
                                        $('#error-message').show();
                                    } else {
                                        $('#error-message').hide();
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    </body>
</html>
