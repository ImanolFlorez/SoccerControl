<!-- Eliminar -->
<div class="modal fade" id="delete_historialreserva_<?php echo $row['rs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"><strong>Eliminar Reserva</strong></h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">    
                <p class="text-center">Estas seguro en borrar los datos de?</p>
                <h2 class="text-center"> <?php echo $row['rs_id']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="delete_historialreserva.php?id=<?php echo $row['rs_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span>Si</a>
            </div>

        </div>
    </div>
</div>
