<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transportes ACNE</title>
        <link rel="stylesheet" type="text/css" href="view/public/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="index.php">INICIO</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                        <li ><a href="gestion.php">GESTION <span class="sr-only">(current)</span></a></li>
                        </ul>
                    </div>
                </div> 
            </nav>
            <h1 class="page-header text-center">Transportes ACNE</h1>
            <div class="modal-body">
                <div class="container-fluid">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Propietarios</a></li>
                        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Conductores</a></li>
                        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Vehiculos</a></li>                   
                    </ul>
                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <table class="table table-bordered table-striped" style="margin-top:20px;">
                                <thead>
                                    <th>Documento</th>
                                    <th>Nombre propietario</th>
                                    <th>Cantidad de vehiculos</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody id="TablaPropietario">
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <table class="table table-bordered table-striped" style="margin-top:20px;">
                                <thead>
                                    <th>Documento</th>
                                    <th>Nombre Conductor</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody id="TablaConductor">
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <table class="table table-bordered table-striped" style="margin-top:20px;">
                                <thead>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Color</th>
                                    <th>Tipo de vehiculo</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody id="TablaVehiculos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <script src="view/public/js/jquery.js"></script>
        <script src="view/public/js/jquery.min.js"></script>
        <script src="view/public/bootstrap/js/bootstrap.min.js"></script>
        <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
        <script src="view/public/js/usuarios.js"></script>
        <script src="view/public/js/vehiculos.js"></script>
    </body>
</html>
