<?php // Interface de la Alta de Usuario..
echo <<<HTML
<!--*************************************************************************************************  -->
<!--Creación del formulario para alta de volante  -->		

<div class="modal" id="altaUsuario" role="dialog">
    <div class="modal-dialog modal-lg"><!-- anchura del modal-->
        <div class="modal-content">
            <!-- Modal Cabecera -->
            <div class="modal-header bg-danger">

                <h4 class="modal-title text-white" id="myModalLabel">Alta de Usuarios</h4>
            </div>
            
            <!-- Modal Cuerpo contenido -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="guardarUsuario" method="post" action="">
					<div class="row col-12">
						<div class="col-6">
						    <label class="form-group">CURP:</label>						
						</div>
						<div class="col-6">
						    <label class="form-group">Nombre:</label>						
						</div>
						
					</div>	
					<div class="row col-12">
						<div class="col-6">
							<div class="form-group">        
								<input type="text" class="form-control" name="nCurp" id="nCurp" placeholder="Ingrese Números y Letras">								
							</div>						
						</div>
						<div class="col-6">
							  <div class="form-group">

								<input type="text" class="form-control" name="nCompleto" id="nCompleto" placeholder="Ingrese Letras" required/>
							</div>						
						</div>
						
					</div>	

					<div class="row col-12">
						
						<div class="col-6">
						<label class="form-group">Telefono:</label>
						
						</div>						
						<div class="col-6">
						<label class="form-group text-">Correo:</label>
						
						</div>

						
					</div>
					<div class="row col-12">
						<div class="col-6">
							<div class="form-group">
								 <input type="text" class="form-control" name="nTelefono" id="nTelefono" placeholder="Ingrese Números" required/>
								
							</div>						
						</div>								
						<div class="col-6">
							<div class="form-group">                       
								<input type="text" class="form-control" name="nCorreo" id="nCorreo" placeholder="correo@gmail.com" required="required"/>
							</div>						
						</div>

						
					</div>
					<div class="row col-12">
						<div class="col-12">
						<label class="form-group text-center">Usuario:</label>
						
						</div>
					
					</div>
					<div class="row col-12">
						<div class="col-12">
                        <input type="text" class="form-control" name="nUser" id="nUser" placeholder="Nombre.Apellido-manuel.marin" required="required"/>
						
						</div>
					
					</div>
					<div class="row col-12">
						<div class="col-6">
						<label class="form-group">Contraseña:</label>
						
						</div>
						<div class="col-6">
						<label class="form-group">Repertir Contraseña:</label>
						
						</div>
						
					</div>

					<div class="row col-12">
						<div class="col-6">
							<div class="form-group">
								 <input type="password" class="form-control" name="nPass" id="nPass"  required/>
								
							</div>						
						</div>
						<div class="col-6">
							  <div class="form-group">
									<input type="password" class="form-control" name="rPass" id="rPass" required/>
																  
							</div>						
						</div>
						
					</div>	

					<div class="row col-12">
						<div class="col-12">
							<label class="form-group">Privilegio:</label>
						
						</div>
	
					</div>
					<div class="row col-12">
						<div class="col-12">
							<div class="form-group">                       
                            <select class="form-control" name="privilegio" id="privilegio">
							  <option value="administrador">Administrador</option>
							  <option value="usuario" selected>Usuario</option>
					    	  <option value="usuarioc" >Usuarioc</option>
							</select>
								<input type="hidden" class="form-control" name="vUser" id="vUser"value="ACTIVO"/>
							</div>
						
						</div>
					
					</div>
					<div class="form-group">
                       
                        
                    </div>
	
					
					
				
											<!-- Modal Pie de Página -->
						<div class="modal-footer">
								<div id="message"></div>
							<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-danger submitBtn" id="Guardadito">Procesar Datos</button>
						</div>
                </form>
				
            </div>
            

        </div>
    </div>
</div>
	
HTML; 
?>