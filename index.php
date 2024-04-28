<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transportes ACNE</title>
        <link rel="stylesheet" type="text/css" href="view/public/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
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
        <div class="container">
        <h1 class="page-header text-center">Transportes ACNE</h1>
	        <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                <a href="#VerificarPro" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Propietario</a>
                <a href="#addConductor" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Conductor</a>
                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Nombre propietario</th>
                            <th>Nombre conductor</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody id="Tablainforme">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php 
            include('view/AgregarModalPropietario.php');
            include('view/AgregarModalConductor.php');
            include('view/VerificarModalPropietario.php');
            include('view/AgregarModalVehiculo.php');
        ?>
        <script src="view/public/js/jquery.js"></script>
        <script src="view/public/js/jquery.min.js"></script>
        <script src="view/public/bootstrap/js/bootstrap.min.js"></script>
        <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
        <script src="view/public/js/usuarios.js"></script>
        <script src="view/public/js/vehiculos.js"></script>
    </body>
</html>
