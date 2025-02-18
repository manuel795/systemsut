<?php 
echo <<<HTML
<!--*************************************************************************************************  -->
<!--Creación del formulario para alta de volante  -->		

<div class="modal" id="altaFalta" role="dialog">
    <div class="modal-dialog modal-lg"><!-- anchura del modal-->
        <div class="modal-content">
            <!-- Modal Cabecera -->
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white" id="myModalLabel">Alta de Faltas</h4>
            </div>            
            <!-- Modal Cuerpo contenido -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" id="guardarFalta" method="post" action="">
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
								<input type="text" class="form-control" name="curp" id="curp" onblur="consultarClave()" required/>								
							</div>						
						</div>
						<div class="col-6">
							  <div class="form-group">
								<input type="text" class="form-control" name="nCompleto2" id="nCompleto2"  readonly="readonly"/>
							</div>						
						</div>
						
					</div>	

					<div class="row col-12">
						
						<div class="col-6">
						  <label class="form-group">Fecha:</label>
						
						</div>						
						<div class="col-6">
							<label class="form-group">Motivo:</label>
						
						</div>					
					</div>
					<div class="row col-12">
						<div class="col-6">
							<div class="form-group">
								 <input type="date" class="form-control" name="fecha" id="fecha" required/>
								
							</div>						
						</div>								
						<div class="col-6">
							<div class="form-group">                       
								<input type="text" class="form-control" name="motivo" id="motivo"  required/>
							</div>						
						</div>						
					</div>
					<div class="row col-12">
						<div class="col-12">
						<label class="form-group text-center">Justificación:</label>
                        <input type="hidden" class="form-control" name="estado" id="estado" value="SIN VALIDAR" />
                        <input type="hidden" class="form-control" name="justi" id="justi" value="SIN VALIDAR" />
                        <!--	<textarea class="form-control" name="justificacion" id="justificacion" placeholder="Debe pasar al área a entregar OFICIO en ORIGINAL"></textarea>-->
                       					
					</div>

											<!-- Modal Pie de Página -->
						<div class="modal-footer">
								<div id="message"></div>
							<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-danger submitBtn" id="faltita">Procesar Falta</button>
						</div>
                </form>				
            </div>
        </div>
    </div>
</div>
	
HTML; 
?>