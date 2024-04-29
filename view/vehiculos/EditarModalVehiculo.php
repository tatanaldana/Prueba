<div class="modal fade" id="VerVehiculo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Vehiculo</h4></center>
            </div>
            <form id="form_edivehiculo">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="tab-content"> 
                            <div class="row form-group">
                                <input type="hidden" class="form-control" name="placa" id="placa2">
                            </div>  
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Marca:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="marca" id="marca1">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Placa:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="placa" id="placa1">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Color:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="color" id="color1">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Tipo de vehiculo:</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tipo_veh" id="tipo_veh1">
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
                        <button type="button" name="editar" id="ActualizarVeh" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>