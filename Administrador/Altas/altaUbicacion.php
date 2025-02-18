<?php 
echo <<<HTML
<!--*************************************************************************************************  -->
<!--Creación del formulario para alta de volante  -->		

<div class="modal" id="altaUbicacion" role="dialog">
    <div class="modal-dialog modal-lg"><!-- anchura del modal-->
        <div class="modal-content">
            <!-- Modal Cabecera -->
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white" id="myModalLabel">Alta de Ubicación</h4>
            </div>            
            <!-- Modal Cuerpo contenido -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="guardarUbicacion" method="post" action="">
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
								<input type="text" class="form-control" name="curp" id="curpu" onblur="consultarClave()" required/>								
							</div>						
						</div>
						<div class="col-6">
							  <div class="form-group">
								<input type="text" class="form-control" name="nCompleto2" id="nCompleto2u"  readonly="readonly"/>
							</div>						
						</div>
						
					</div>	
					<div class="row col-12">
						
						<div class="col-6">
						  <label class="form-group">Clave de Centro de Trabajo</label>
						
						</div>						
						<div class="col-6">
							<label class="form-group">Ubicación:</label>
						
						</div>					
					</div>
					<div class="row col-12">
						<div class="col-6">
							<div class="form-group">
								 <input type="text" class="form-control" name="cct" id="cct" required/>
								
							</div>						
						</div>								
						<div class="col-6">
							<div class="form-group">                       
								<input type="text" class="form-control" name="ubi" id="ubi"  required/>
							</div>						
						</div>						
					</div>
                    <div class="row col-12">
						
						<div class="col-6">
						  <label class="form-group">Edificio:</label>
						
						</div>						
						<div class="col-6">
							<label class="form-group">Adscripcion:</label>
						
						</div>					
					</div>
					<div class="row col-12">
						<div class="col-6">
							<div class="form-group">
								 <input type="text" class="form-control" name="edificio" id="edificio" required/>
								
							</div>						
						</div>								
						<div class="col-6">
							<div class="form-group">                       
								<input type="text" class="form-control" name="adscripcion" id="adscripcion"  required/>
							</div>						
						</div>						
					</div>
					<div class="row col-12">
						<div class="col-12">
                         <!--   <input type="hidden" class="form-control" name="estado" id="estado" value="SIN VALIDAR" />
                            <input type="hidden" class="form-control" name="justi" id="justi" value="SIN VALIDAR" />
                        	<textarea class="form-control" name="justificacion" id="justificacion" placeholder="Debe pasar al área a entregar OFICIO en ORIGINAL"></textarea>-->
                        </div>			
					</div>         
											<!-- Modal Pie de Página -->
						<div class="modal-footer">
							<div id="message"></div>
							<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-danger submitBtn" id="ubicacionf">Procesar Falta</button>
                        </div>
                </form>				
             </div>
               

        </div>
    </div>
</div>
	
HTML; 
?>