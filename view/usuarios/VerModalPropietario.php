<div class="modal fade" id="VerPropietario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Datos del propietario</h4></center>
                </div>
                <form id="form_propietario">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab4" aria-controls="tab1" role="tab" data-toggle="tab">Propietario</a></li>
                                <li role="presentation"><a href="#tab5" aria-controls="tab2" role="tab" data-toggle="tab">Datos del vehiculo</a></li>
                            </ul>
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab4">
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Documento:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="documento" id="documento">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Primer nombre:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="primer_nom" id="primer_nom">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Segundo nombre:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="segundo_nom" id="segundo_nom">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Apellidos</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="apellidos" id="apellidos">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Direccion:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="direccion" id= "direccion">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Telefono:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="telefono" id="telefono">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" style="position:relative; top:7px;">Ciudad:</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ciudad" id="ciudad">
                                        </div>
                                    </div>   
                                </div>        
                                <div role="tabpanel" class="tab-pane" id="tab5">    
                                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                                        <thead>
                                            <th>Placa</th>
                                            <th>Marca</th>
                                            <th>Color</th>
                                            <th>Tipo de vehiculo</th>
                                        </thead>
                                        <tbody id="TablaVehiculos1">
                                        </tbody>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    </div>
                                </div>          
                            </div>
                        </div> 
                    </div>
                </form>  
            </div>
        </div>
    </div>
