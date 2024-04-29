$(document).ready(function() {
    if (window.location.pathname.endsWith("gestion.php")) {
      //Se realiza la solicitud AJAX al cargar la página
      $.ajax({
        method: 'POST',
        url: '/prueba/controlador/vehiculos/vehiculoController.php',
  
        success: function(response) {
          var datos = JSON.parse(response);
          var tablaHTML = '';
  
          for (var i = 0; i < datos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + datos[i].placa + '</td>';
            tablaHTML += '<td>' + datos[i].Marca + '</td>';
            tablaHTML += '<td>' + datos[i].color + '</td>';
            tablaHTML += '<td>' + datos[i].tipo_veh + '</td>';
            tablaHTML += '<td>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 viewButton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</button>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 editButton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</button>';
            tablaHTML += '<button type="button" class="btn btn-danger btn-sm mx-1 deleteButton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>';
            tablaHTML += '</td>';
            tablaHTML += '</tr>';
        }
  
          $('#TablaVehiculos').html(tablaHTML);
      },
        error: function(xhr) {
          console.error(xhr.responseText);
          var errorResponse = JSON.parse(xhr.responseText);
          swal('Error', errorResponse.error, 'error');
      }
  });
  }
  });

$('#AgregarVehiculo').click(function() {
var form = $('#form_vehiculo').serialize();
var documento = $('#documento1').val();
$.ajax({
    method: 'POST',
    url: '/prueba/controlador/vehiculos/AgregarVehiculo.php',
    data: form,
    dataType: 'json',
    success: function(response) {
        if (response.success) {
            console.log(response);
            swal({
                title: "Éxito",
                text: response.message, 
                icon: "success",
                buttons: {
                    confirm: "Aceptar",
                },
                dangerMode: false,
            }).then(function() {
                $('#form_vehiculo')[0].reset();
                $('#documento1').val(documento);
                window.location.reload();
            });
        } else if (response.message) {
            swal('Error', response.message, 'warning');
            $('#form_vehiculo')[0].reset();
            $('#documento1').val(documento);
        } else {
            swal('Error', 'Respuesta inesperada del servidor', 'error');
        }
    }
});
});

$(document).ready(function() {
    $('#TablaPropietario').on('click', '.addButton', function() {
        var documento = $(this).closest('tr').find('td:first').text();
        $('#documento1').val(documento);
        $('#addVehiculo').modal('show');
    });

    $('#AgregarVehiculo').click(function() {
        var form = $('#form_vehiculo').serialize();
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/vehiculos/AgregarVehiculo.php',
            data: form,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    swal({
                        title: "Éxito",
                        text: response.message,
                        icon: "success",
                        buttons: {
                            confirm: "Aceptar",
                        },
                        dangerMode: false,
                    }).then(function() {
                        $('#form_vehiculo')[0].reset();
                        $('#addVehiculo').modal('hide');
                        window.location.reload();
                    });
                } else if (response.message) {
                    swal('Error', response.message, 'warning');
                    $('#form_vehiculo')[0].reset();
                } else {
                    swal('Error', 'Respuesta inesperada del servidor', 'error');
                }
            }
        });
    });
});

$(document).ready(function() {
$('#TablaVehiculos').on('click', '.viewButton', function() {
    var placa = $(this).closest('tr').find('td:first').text();
            
    // Realizar la solicitud AJAX utilizando el valor del documento
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/vehiculos/VerVehiculos.php',
        data: { placa_php: placa },
        dataType: 'json',
        success: function(response) {

            if (response.length > 0) {
                var vehiculo = response[0]; 
                $('#marca').val(vehiculo.Marca).prop('disabled', true);
                $('#color').val(vehiculo.color).prop('disabled', true);
                $('#placa').val(vehiculo.placa).prop('disabled', true);
                $('#tipo_veh').val(vehiculo.tipo_veh).prop('disabled', true);


                $('#VerVehiculo').modal('show'); 
            } else {
                swal('Error', 'No se encontraron vehículos para este propietario', 'warning');
            }
        },
        error: function(xhr, status, error) {
            swal('Error', 'Hubo un problema al procesar la solicitud. Por favor, intenta de nuevo más tarde.', 'error');
        }
    });
});
});

$(document).ready(function() {
    $('#TablaVehiculos').on('click', '.editButton', function() {
        var placa = $(this).closest('tr').find('td:first').text();
                
        // Realizar la solicitud AJAX utilizando el valor del documento
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/vehiculos/VerVehiculos.php',
            data: { placa_php: placa },
            dataType: 'json',
            success: function(response) {

                if (response.length > 0) {
                    var vehiculo1 = response[0]; 
                    var tipo_vehiculo = vehiculo1.tipo_veh ? "1" : "0";
                    $('#marca1').val(vehiculo1.Marca).prop('disabled', true);
                    $('#placa1').val(vehiculo1.placa).prop('disabled', true);
                    $('#placa2').val(vehiculo1.placa)
                    $('#color1').val(vehiculo1.color)
                    $('#tipo_veh1').val(tipo_vehiculo)
    
    
                    $('#VerVehiculo2').modal('show'); 
                } else {
                    swal('Error', 'No se encontraron vehículos para este propietario', 'warning');
                }
            },
            error: function(xhr, status, error) {
                swal('Error', 'Hubo un problema al procesar la solicitud. Por favor, intenta de nuevo más tarde.', 'error');
            }
        });
    });
});

$('#ActualizarVeh').click(function() {
    var form = $('#form_edivehiculo').serialize();
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/vehiculos/EditarVehiculo.php',
        data: form,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                console.log(response);
                swal({
                    title: "Éxito",
                    text: response.message, 
                    icon: "success",
                    buttons: {
                        confirm: "Aceptar",
                    },
                    dangerMode: false,
                }).then(function() {
                    window.location.reload();
                });
            } else if (response.message) {
                swal('Error', response.message, 'warning');
            } else {
                swal('Error', 'Respuesta inesperada del servidor', 'error');
            }
        }
    });
});

$(document).ready(function() {
    $('#TablaVehiculos').on('click', '.deleteButton', function() {

        swal({
            title: "¿Estás seguro?",
            text: "¿Realmente quieres eliminar el vehiculo?",
            icon: "warning",
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar",
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var placa = $(this).closest('tr').find('td:first').text();
                
                $.ajax({
                    method: 'POST',
                    url: '/prueba/controlador/vehiculos/EliminarVehiculo.php',
                    data: { placa_php: placa },
                    dataType: 'json',
                    success: function(response) {

                        if (response.success) {
                            swal({
                                title: "Éxito",
                                text: response.message, 
                                icon: "success",
                                buttons: {
                                    confirm: "Aceptar",
                                },
                                dangerMode: false,
                            }).then(function() {
                                window.location.reload(); 
                            });
                        } else if (response.message) {
                            swal('Error', response.message, 'warning');
                        } else {
                            swal('Error', 'Respuesta inesperada del servidor', 'error');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
});