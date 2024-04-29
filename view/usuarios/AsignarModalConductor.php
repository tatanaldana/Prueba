<div class="modal fade" id="asignarVehiculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Vehiculos disponibles</h4></center>
            </div>
            <form id="form_asignar">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="tab-content">
                        <table class="table table-bordered table-striped" style="margin-top:20px;">
                                <thead>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Color</th>
                                    <th>Tipo de vehiculo</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody id="TablaAsignar">
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>                             
                            </div> 
                        </div>          
                    </div> 
                </div>
            </form>  
        </div>
    </div>
</div>