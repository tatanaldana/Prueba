
<div class="modal fade" id="addPropietario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Registro</h4></center>
            </div>
            <form id="form_propietario">
                <div class="modal-body">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Datos del propietario</a></li>
                            <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Datos del vehiculo</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab1">
                            <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Documento:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="documento">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Primer nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="primer_nom">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Segundo nombre:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="segundo_nom">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Apellidos</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="apellidos">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Direccion:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="direccion">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Telefono:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telefono">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Ciudad:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ciudad">
                                    </div>
                                </div>   
                            </div>        
                            <div role="tabpanel" class="tab-pane" id="tab2">    
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Marca:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="marca">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" style="position:relative; top:7px;">Placa:</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="placa">
                                    </div>
                                </div>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick= "limpiarCampos2()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="button" name="agregar" id="AgregarPropietario" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                                 </div>
                            </div>          
                        </div>
                    </div> 
                </div>
            </form>  
        </div>
    </div>
</div>
<script>
    function limpiarCampos2() {
        var modal = document.getElementById('addPropietario'); 
        var campos = modal.querySelectorAll('input, select');
        campos.forEach(function(campo) {
            campo.value = '';
        });
    }
</script>