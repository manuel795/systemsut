<?php
session_start();
include ("../conexion/conexionbd.php");
$curpA=$_SESSION['user_id'];
$nombreCompleto=$_SESSION['user_nombre']; // Se inicia Sesion y se coloca en una variable
if($curpA== null || $curpA==" "){
    echo "<h2 class='alert-warning'><center>Usted est&aacute; entrando ilegamente..</center></h2>";
    die();
  }
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Bienvenido Administrador</title>
<header>
<div class="encabezado">
    <div class="logo">
        <img src="../imagenes/logo1.jpg" alt="Logo">
        <div class="name">
            <p class="User">
                <span style="color: yellow;">Bienvenid@ Administrador: </span>
                <strong><?php echo htmlspecialchars($nombreCompleto);//Se usa la variable para mostrar el nombre del usuario y para evitar ataques XSS ?></strong>
            </p>
        </div>
    </div>
    <div class="enlaces">
        <nav class="navbar">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Altas</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#altaUsuario">Alta de Usuario</a>
                        </li>
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#altaFalta">Alta de Faltas</a>
                        </li>
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#altaUbicacion">Alta de Ubicación</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Consultas</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#consultaPersonal">Consulta General</a>
                        </li>
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#consultaFalta">Consulta Faltas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../salir.php">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</header>  
</head>
<body>
    <div class="container">
        <div class="tituloP">
            <div class="marquee">Bienvenid@ S.U.T.G.E.S.E.</div>
        </div>
        <div class="busquedaP">
            <form action="" >
                <div class="form-group">
                    <label for="bPersona">Buscar Personal:</label>
                    <input type="text"  class ="form-control" name="bPersona" id="bPersona">
                </div>
            </form>
        </div>
        <div class="datos" id="datosG">
         <!--  Información de la busqueda rapida-->
        </div>

                    <!-- Consulta de volante -->
                <div class="modal fade bd-example-modal-lg" id="consultaPersonal">
                    <div class="modal-dialog modal-lg" style="max-width: 100%;" role="document">
                        <div class="modal-content">
                                <!--Encabezado de mi modal -->
                                <div class="modal-header " >
                                    <button tyle="button" class="btn btn-danger" data-bs-dismiss="modal" >cerrar</button>
                                    <h3 class="modal-title w-100 text-center text-white" >Consulta de Personal</h3>
                                
                                </div>
                                <!--Contenido de la ventana -->
                            <div class="modal-body">
                            <?php 
                                //Mostrar las columnas con informacion general
                                                echo "
                                                        <div class='table table-bordered'>
                                                                <table class='table table-striped'>
                                                                <thead class='thead-primary'>
                                                                    <tr  text-white text-center'>
                                                                    <th >CURP</th>
                                                                    <th>Nombre Completo</th>
                                                                    <th>Telefono</th>
                                                                    <th>Correo</th>
                                                                    <th>Usuario</th>
                                                                    <th>Estado</th>
                                                                    <th>Privilegios</th>
                                                                    <th>Edicion</th>
                                                                    <th>PDF</th>
                                                                    </tr>
                                                                </thead>
                                                                
                                                            ";
        
                                                        //Consulta general de los registros 
                                                        $sqlG ="SELECT * FROM usuarios ORDER by nombre_completo DESC";

                                            //***************************************************************
                                            $sqlC = "SELECT COUNT(*) as total FROM usuarios";//Conteo de filas
                                            $result = $conn->query($sqlG);

                                            $resultado = $conn->query($sqlC);
                            ?>
                              <tbody id="tablaUsuarios">                          
                                       
                                                        


                             <?php               
                                                                                                    echo "
                                                                                                </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            "	;
                                            $fila = $resultado->fetch_assoc();

                                    echo "---------------------------------------------------------------------------------</br>";
                                    echo "<strong>Total de Registros :**</strong>", $fila["total"]," Registros**</br>";
                                    echo "---------------------------------------------------------------------------------</br>";
                                                                
                                                        ?>
                            </div>
                            <!--Pie de pagina -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <a class="btn btn-danger" href="./Consultas_excel/exportar_a_excel_volantes.php" >Generar Excel</a>

                            
                            </div>
                        </div>
                    
                
                    </div>
            
            
                </div>	


                <div class="modal fade bd-example-modal-lg" id="consultaFalta">
                    <div class="modal-dialog modal-lg" style="max-width: 100%;" role="document">
                        <div class="modal-content">
                                <!--Encabezado de mi modal -->
                                <div class="modal-header" >
                                    <button style="button" class="btn btn-danger" data-bs-dismiss="modal" >Cerrar</button>
                                    <h3 class="modal-title w-100 text-center text-white" >Personal con Faltas</h3>
                                
                                </div>
                            <!--Contenido de la ventana -->
                                <div class="modal-body">
                                <?php 
                                    //Mostrar las columnas con informacion general
                                                    echo "
                                                            <div class='table table-bordered'>
                                                                    <table class='table table-striped'>
                                                                    <thead class='thead-primary'>
                                                                        <tr class='text-center'>
                                                                        <th >CURP</th>
                                                                        <th>Nombre Completo</th> 
                                                                        <th>Fecha</th>
                                                                        <th>Motivo</th>		
                                                                        <th>Estado</th>															
                                                                        <th>Edicion</th>
                                                                        <th>PDF</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                ";
            
                                            //Consulta general de los registros 
                                            $sqlff ="SELECT COUNT(*) as total
                                                                        FROM usuarios,faltas 
                                                                        WHERE faltas.estado='SIN VALIDAR' 
                                                                        AND faltas.curp=usuarios.curp";

                                                            //***************************************************************
                                                            //Consulta de las faltas leyenda sin validar
                                                          /*  $sqlf= "SELECT usuarios.curp,
                                                                            usuarios.nombre_completo,
                                                                            usuarios.telefono,
                                                                            usuarios.correo,
                                                                            usuarios.user,
                                                                            faltas.curp,
                                                                            faltas.motivo,
                                                                            faltas.fecha,
                                                                            faltas.estado as est
                                                                        FROM usuarios,faltas 
                                                                        WHERE faltas.estado='SIN VALIDAR' 
                                                                        AND faltas.curp=usuarios.curp";*///Conteo de filas
                                                                        //CONSULTA GENERAL DE LAS FALTAS
                                                                     $sqlf= "SELECT usuarios.curp,
                                                                        usuarios.nombre_completo,
                                                                        usuarios.telefono,
                                                                        usuarios.correo,
                                                                        usuarios.user,
                                                                        faltas.curp,
                                                                        faltas.motivo,
                                                                        faltas.fecha,
                                                                        faltas.estado as est
                                                                    FROM usuarios,faltas 
                                                                    WHERE faltas.curp=usuarios.curp";

                                                            $resultf = $conn->query($sqlf);

                                                        $resultado = $conn->query($sqlff);
                                                                        
                                                            while ($rowv = $resultf->fetch_assoc()) {
                                            
                                                    echo "	<tr>
                                                                        <td class='bg-danger text-white'>".$rowv['curp']."</td>
                                                                        <td>".$rowv['nombre_completo']."</td>
                                                                        <td>".$rowv['fecha']."</td>
                                                                        <td>".$rowv['motivo']."</td>
                                                                        <td>".$rowv['est']."</td>													
                                                                        <td>"."<a class='btn btn-sm btn-link' href='../Administrador/Edicion/edicion_volantes.php?no=".$rowv['curp']."'>Edicion</a>"."</td>
                                                                        <td>"."<a class='btn btn-sm btn-link' href='../Administrador/Consultas_pdf/crearVolante.php?no=".$rowv['curp']."' target='_blank'>PDF</a>"."</td>
                                                                        </tr>";

                                                                }
                                                                        echo "
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                                "	;
                                    $fila = $resultado->fetch_assoc();
                                    

                                    echo "---------------------------------------------------------------------------------</br>";
                                    echo "<strong>Total de Registros :**</strong>", $fila["total"]," Registros**</br>";
                                    echo "---------------------------------------------------------------------------------</br>";
                                    
                                ?>
                                </div>
                                <!--Pie de pagina -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                    <a class="btn btn-danger" href="./Consultas_excel/exportar_a_excel_volantes.php" >Generar Excel</a>						
                                </div>
                        </div>
                        
                    
                    </div>
                
                
                </div>	


    <?php
        include(".././Administrador/Altas/altaUbicacion.php");
        include(".././Administrador/Altas/altaUser.php");
        include(".././Administrador/Altas/altaFalta.php");
        
    ?>

    </div><!-- fin de container-->
                                                     
    <footer>
                <div class="pie_pagina">
                    <p><?php  $ano=Date('Y'); echo $ano; ?>. Derechos Reservados</p>

                </div>
            <?php
            include('.././enlaces/redSocial.php');
            ?>
    </footer>
    <script> 
        // Función para obtener datos de la API
        async function cargarDatos() {
            try {
                // Realiza una solicitud a la API (../Administrador/Consultas/Usuarios.php)
                const respuesta = await fetch('../Administrador/Consultas/Usuarios.php');
                const datos = await respuesta.json();

                // Selecciona el cuerpo de la tabla
                const tabla = document.getElementById('tabla-empleados');

                // Limpia la tabla antes de rellenarla
                tabla.innerHTML = '';

                // Itera sobre los datos y crea filas
                datos.forEach(empleado => {
                    const fila = document.createElement('tr');
                    fila.innerHTML = `
                        <td>${empleado.id_user}</td>
                        <td>${empleado.curp}</td>
                        <td>${empleado.nombre_completo}</td>
                        <td>${empleado.telefono}</td>
                        <td>${empleado.correo}</td>
                        <td>${empleado.user}</td>
                        <td>${empleado.pass}</td>
                        <td>${empleado.privilegio}</td>
                        <td>${empleado.estado}</td>
                       
                    `;
                    tabla.appendChild(fila);
                });
            } catch (error) {
                console.error('Error al cargar los datos:', error);
            }
        }

        // Cargar los datos al cargar la página
        document.addEventListener('DOMContentLoaded', cargarDatos);

     
        $(document).ready(function () { 

            $('#guardarUsuario').submit(function (event) { 
            event.preventDefault(); // Evita el comportamiento por defecto del formulario 

            const nombre1 = $('#nCompleto').val(); 
            const telefono1= $('#nTelefono').val(); 
            const correo1 = $('#nCorreo').val(); 
            const user1 = $('#nUser').val(); 
            const pass1 = $('#nPass').val(); 
            const pass2 = $('#rPass').val(); 
            const privilegio1= $('#privilegio').val(); 
            const curp1= $('#nCurp').val(); 
            const estado1 = $('#vUser').val(); 
                if(pass1!=pass2){
                    alert("Las contraseñas NO coinciden...");
                    return false;
                }
			
                if($("#nCorreo").val().indexOf('@', 0) == -1 || $("#nCorreo").val().indexOf('.', 0) == -1) {
                    alert('El correo electrónico introducido no es correcto.');
                    return false;
                }

            $.ajax({ type: 'POST', 
                      url: '../Administrador/Registros/procesarUsuario.php', 
                      data: { nombre: nombre1, telefono: telefono1, correo: correo1, user: user1, pass: pass1, privilegio: privilegio1, curp: curp1, estado: estado1 }, 
                success: function (response) { 
                    alert(response);
                    $('#guardarUsuario')[0].reset(); // Limpia el formulario
                 }, 
                 error: function () { 
                    alert('Error al insertar datos.'); 
                } 
            }); 
        });

        //***************************************************************
        $('#guardarFalta').submit(function (event) { 
            event.preventDefault(); // Evita el comportamiento por defecto del formulario 

            const nombre1 = $('#nCompleto2').val(); 
            const curp1= $('#curp').val(); 
            const fecha1 = $('#fecha').val(); 
            const motivo1 = $('#motivo').val(); 
            const justificacion1 = $('#justi').val(); 
            const estado1 = $('#estado').val(); 


            $.ajax({ type: 'POST', 
                      url: '../Administrador/Registros/procesarFalta.php', 
                      data: { nombre: nombre1,estado: estado1, justificacion: justificacion1, motivo: motivo1, fecha: fecha1, curp: curp1 }, 
                success: function (response) { 
                    alert(response);
                    $('#guardarFalta')[0].reset(); // Limpia el formulario
                 }, 
                 error: function () { 
                    alert('Error al insertar datos.'); 
                } 
            }); 
        });

    });

    function consultarClave() { //mostrar información en un input con una consulta
        var clave = $("#curp").val(); 

        $.ajax({ url: "../Administrador/Buscar/buscaE.php", 
              method: "POST", 
              data: { clave: clave }, 
              success: function(data) { 
                var datos = JSON.parse(data); 
                if(datos) { 
                    $("#nCompleto2").val(datos.nombre_completo); 
                   // $("#email").val(datos.email);  Llena otros campos según sea necesario 
                } else { 
                    alert("No se encontraron datos para la clave ingresada."); 

                } 
            } 
        }); 
    } 
    fetch('../Administrador/Consultas/consultaGral.php')
            .then(response => response.json())
            .then(data => {
                const tabla = document.getElementById('tablaUsuarios');
                data.forEach(usuario => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${usuario.curp}</td>
                                      <td>${usuario.nombre_completo}</td>
                                      <td>${usuario.telefono}</td>
                                      <td>${usuario.correo}</td>
                                      <td>${usuario.user}</td>
                                      <td>${usuario.estado}</td>
                                      <td>${usuario.privilegio}</td>
                                      <td> <i class="fa-solid fa-user-pen"></i></td>
                                      <td><i class="fa-duotone fa-solid fa-file-pdf"></i></td>`;
                    tabla.appendChild(fila);
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/buscarPersona.js"></script>

</body>
</html>