<div class="modal fade" id="VerVehiculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Datos del Vehiculo</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Marca:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="marca" id="marca">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Placa:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="placa" id="placa">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Color:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="color" id="color">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Tipo de vehiculo:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="tipo_veh" id="tipo_veh">
                                    <option value="1">Público</option>
                                    <option value="0">Particular</option>
                                </select>
                            </div>
                        </div>         
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
            </div>
        </div>
    </div>
</div>