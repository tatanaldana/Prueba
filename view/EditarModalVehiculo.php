<div class="modal fade" id="edit_<?php echo $row['idEmp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Vehiculo</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="EditarRegistro">
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="control-label" style="position:relative; top:7px;">Color:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="color">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="control-label" style="position:relative; top:7px;">Tipo de vehiculo:</label>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipo_veh">
                                <option value="1">Público</option>
                                <option value="0">Particular</option>
                            </select>
                        </div>
                    </div>
                </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" name="editar" id="btneditar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>