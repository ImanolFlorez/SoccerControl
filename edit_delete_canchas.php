<div class="modal fade" id="edit_canchas_<?php echo $row['cancha_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	 <center><h4 class="modal-title" id="myModalLabel">Editar Cancha</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_canchas.php?id=<?php echo $row['cancha_id']; ?>">
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Nombre de la cancha:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="canchanombre" value="<?php echo $row['cancha_nombre']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Ubicacion:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="canchaubicacion" value="<?php echo $row['cancha_ubicacion']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Tipo de cancha:</label>
					</div>
					<div class="col-sm-9">
						<select type="text" class="form-control" name="canchatipo" value="<?php echo $row['cancha_tipo']; ?>" required>
						 
      
        <option value="Futbol">Futbol</option>
        <option value="Tennis">Tennis</option>

     </select> 
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Observacion:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="canchaobservacion" value="<?php echo $row['cancha_observacion']; ?>">
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
    </div>_
</div>

<!-- Eliminar -->
<div class="modal fade" id="delete_canchas_<?php echo $row['cancha_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel"><strong>Eliminar Cancha</strong></h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Estas seguro en borrar la cancha?</p>
				<h2 class="text-center"><?php echo $row['cancha_nombre']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="delete_canchas.php?id=<?php echo $row['cancha_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>

