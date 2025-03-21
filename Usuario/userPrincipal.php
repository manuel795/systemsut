<?php
session_start();
include("../conexion/conexionBd.php");

$curp=$_SESSION['user_id'];
$nombreCompleto=$_SESSION['user_nombre'];

$buscar="SELECT curp FROM usuarios where nombre_completo='".$nombreCompleto."'";//Buscar en la base de datos

$sql="SELECT faltas.curp, 
           usuarios.curp, 
           usuarios.nombre_completo, 
           usuarios.telefono,
           usuarios.correo,
           faltas.estado,
           faltas.fecha,
           faltas.motivo
FROM faltas,usuarios 
WHERE faltas.curp=? and faltas.curp=usuarios.curp and faltas.estado='SIN VALIDAR'"; //Traer la informacion del usuario

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/pUser.css">
    <title>Bienvenid@</title>



</head>
<body>
    <!-- Encabezado para el usuario-->
        <nav class="navbar">
            <div class="datos">
                <img src=".././imagenes/logo1.jpg" alt="Logo">             
                <p class="bienvenida">Bienvenid@:</p> <p><strong><?php echo $nombreCompleto ?>  </strong></p>       
            </div>
            <ul class="nav-links">
                <li><a href="#inicio">Descargas</a></li>
                <li><a href=".././salir.php">Salir</a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="titulo">
                <h3>Faltas Generadas</h3>
            </div>
            <?php
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $curp);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) { 
                
            ?>
            <div class="tabla"><!--Informacion de las faltas del usuario-->
                    <table class="table table-striped" id="tabla-usuarios">
                            <thead>
                                <tr>
                                    <th>CURP</th>
                                    <th>Nombre Completo</th>
                                    <th>Faltas</th>
                                    <th>Motivo</th>
                                    <th>Estado</th>
                                    <th>Cargar Archivo</th>
                                </tr>
                            </thead>
                            <tbody >
                                <!-- Los datos se insertarán aquí dinámicamente -->
                            </tbody>
                    </table>
            </div>
                <?php
                }
                ?>
        </div>
            <!-- Modal -->
    <div class="modal fade" id="cargaArchivo" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Cargar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/ruta-de-tu-servidor" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="archivo">Selecciona un archivo</label>
                            <input type="file" class="form-control-file" id="archivo" name="archivo" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cargar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
        <!-- Bootstrap JS y dependencias -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- JavaScript para cargar los datos -->
    <script>

                // Función para obtener y mostrar los datos filtrados
                async function cargarDatos() {
                 // const edad = document.getElementById('edad').value;
                let edad ="<?php echo $curp; ?>";


            try {
                // Hacer una solicitud al backend (PHP) con la edad como parámetro
                const response = await fetch(`../Usuario/Consultas/obtener_datos.php?curp=${edad}`);
                if (!response.ok) {
                    throw new Error('Error al obtener los datos');
                }

                // Convertir la respuesta a JSON
                const data = await response.json();

                // Obtener el cuerpo de la tabla
                const tbody = document.querySelector('#tabla-usuarios tbody');

                // Limpiar el contenido actual de la tabla
                tbody.innerHTML = '';

                // Insertar los datos en la tabla
                data.forEach(usuario => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${usuario.curp}</td>
                        <td>${usuario.nombre_completo}</td>
                        <td>${usuario.fecha}</td>
                        <td>${usuario.motivo}</td>
                        <td>${usuario.estado}</td>
                        <td style="text-align:center; vertical-align:middle;"><a href="" data-bs-toggle="modal" data-bs-target="#cargaArchivo" class="link"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24" fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /></svg></i>Justificación</a></td>

                    `;
                    tbody.appendChild(row);
                });
            } catch (error) {
                console.error('Error:', error);
            }
        }
                // Cargar los datos cuando la página se cargue
                document.addEventListener('DOMContentLoaded', cargarDatos);
    </script>
</body>
</html>