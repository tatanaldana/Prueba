
<div class="modal fade" id="addConductor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Registro</h4></center>
            </div>
            <form id="form_conductor">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="tab-content">
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
                                    <label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
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
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick= "limpiarCampos()" ><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="button" name="agregar" id="AgregarConductor" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                </div>
            </form>  
        </div>
    </div>
</div>
<script>
    function limpiarCampos() {
        var modal = document.getElementById('addConductor'); 
        var campos = modal.querySelectorAll('input, select');
        campos.forEach(function(campo) {
            campo.value = '';
        });
    }
</script>