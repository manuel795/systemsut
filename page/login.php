<?php
echo <<<HTML
                    <!-- Botón para abrir el modal --> 
                        <div class="d-flex justify-content-center">
                            <div class="modal fade" id="sesionUsuario" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Cabecera -->
                                        <div class="modal-header">
                                            <h4 class="modal-title text-white" id="myModalLabel">Personal Autorizado S.U.T.G.E.S.E.</h4>
                                        </div>
                                        
                                        <!-- Modal Cuerpo contenido -->
                                        <div class="modal-body">
                                           <div class="msm1"><p class="statusMsg" id="msg"></p></div> 
                                            <form role="form" method="post" action="" id="loginForm">
                                                <div class="form-group">
                                                    <label for="usuario">Usuario:</label>
                                                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required/>
                                                    <label for="clave">Contrase&ntilde;a:</label>
                                                    <input type="password"class="form-control" name="clave" id="clave" placeholder="Contraseña" required/>
                                                </div>											<!-- Modal Pie de Página -->
                                                    <div class="modal-footer">
                                                        <a href="resetPass/resetLostPass.php">¿Olvidaste tu contraseña?</a>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close">Cerrar</button>
                                                        <button type="submit" class="btn btn-danger submitBtn" id="iniciar">Iniciar...</button>
                                                    </div>
                                            </form>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                
                        </div>
HTML; 
?>