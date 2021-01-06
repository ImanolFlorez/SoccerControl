					<!-- Editar -->
					<div class="modal fade" id="edit_valor_canchas_<?php echo $row['vc_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					            	 <h4 class="modal-title" id="myModalLabel"><center>Desea editar el precio de la cancha </center></h4>
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					            </div>
					            <div class="modal-body">
								<div class="container-fluid">
								<form method="POST" action="edit_valor_canchas.php?id=<?php echo $row['vc_id']; ?>">
                              
									

									<div class="row form-group">
										<div class="col-sm-3">
											<label class="control-label" style="position:relative; top:7px;">Fecha de Actualizacion</label>
										</div>
										<div class="col-sm-9">
											<input type="date" class="form-control" name="vcfecha" value="<?php echo $row['vc_fecha']; ?>">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-sm-3">
											<label class="control-label" style="position:relative; top:7px;">$Precio:</label>
										</div>
										<div class="col-sm-9">
											<input type="number" class="form-control" name="vcvalor" value="<?php echo $row['vc_valor']; ?>">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-sm-3">
											<label class="control-label" style="position:relative; top:7px;">Persona Responsable</label>
										</div>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="username" value="<?php echo ($_SESSION['rol']) ?>" disabled>
										</div>
									</div>
					            </div> 
								</div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
					                <button type="submit" name="edit" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</a>
								</form>
					            </div>

					        </div>
					    </div>
					</div>

					<!-- Eliminar -->
					<div class="modal fade" id="delete_valor_canchas_<?php echo $row['vc_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					            	<center><h4 class="modal-title" id="myModalLabel"><strong>Eliminar el valor de la cancha</strong></h4></center>
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					            </div>
					            <div class="modal-body">	
					            	<p class="text-center">Estas seguro en borrar los de la cancha</p>
									<h2 class="text-center"><?php echo $row['cancha_id']; ?></h2>
								</div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
					                <a href="delete_valor_canchas.php?id=<?php echo $row['vc_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
					            </div>

					        </div>
					    </div>
					</div>

