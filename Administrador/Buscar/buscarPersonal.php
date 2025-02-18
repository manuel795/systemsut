<?php
include("../../conexion/conexionbd.php");
//incluimos el archivo para la conexion
//traemos la variable del formulario (ajax)
header("Content-Type: application/json");

$buscar=$_REQUEST['persona'];
if(!empty($buscar)){
// Consulta SQL
$sql = "SELECT DISTINCT usuarios.curp, 
						usuarios.nombre_completo,
						usuarios.telefono,
						usuarios.correo,
						usuarios.user,
						usuarios.pass,
						usuarios.estado,
						usuarios.privilegio
						
                                     FROM 
									      usuarios
										  
                                     WHERE (usuarios.curp LIKE '%".$buscar."%' 
									 OR usuarios.nombre_completo LIKE '%".$buscar."%'
									 OR usuarios.correo LIKE '%".$buscar."%')
                                     "; // Reemplaza 'usuarios' con tu tabla
$result = $conn->query($sql);

// Array para guardar los resultados
$data = [];

// Verifica si hay resultados
if ($result->num_rows > 0) {

	echo "
	<h2 class='text-white'>Datos de la Persona Solicitada</h2><br>

	  <div class='table table-bordered'>
			<table class='table table-striped' style='width: 100%;'>
			  <thead class='thead-dark'>
				<tr class='bg-info'>
				<th style='width: 20px;'>CURP</th>
				<th style='width: 180px;' >Nombre Completo</th>
				<th style='width: 35px;'>Telefono</th>													
				<th style='width: 20px;'>Correo</th>
				<th style='width: 160px;'>Usuario</th>
				<th style='width: 45px;'>Contraseña</th>												
				<th style='width: 25px;'>Estado</th>
				<th style='width: 25px;'>Privilegios</th>
																				  
				</tr>
			  </thead>
			  <tbody>
		";
    while ($row = $result->fetch_assoc()) {
      
		//$data[] = $row;

			$cct=$row['curp'];
			$nombre=$row['nombre_completo'];
						echo "	<tr>
																  <td>".$row['curp']."</td>
																  <td>".$row['nombre_completo']."</td>	
																  <td>".$row['telefono']."</td>					  	
																  <td>".$row['correo']."</td>
															      <td>".$row['user']."</td>	  
																  <td>".$row['pass']."</td>
																  <td>".$row['estado']."</td>
																   <td>".$row['privilegio']."</td>

															</tr>";

			json_encode($cct);
		}
					echo "
															  </tbody>
															</table>
														  </div>
														"	;
	}

 }

?>