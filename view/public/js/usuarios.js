$(document).ready(function() {
  if (window.location.pathname.endsWith("index.php")) {
    //Se realiza la solicitud AJAX al cargar la página
    $.ajax({
      method: 'POST',
      url: '/prueba/controlador/usuarios/view_informe.php',

      success: function(response) {
        var datos = JSON.parse(response);
        var tablaHTML = '';

        for (var i = 0; i < datos.length; i++) {
          tablaHTML += '<tr>';
          tablaHTML += '<td>' + datos[i].placa + '</td>';
          tablaHTML += '<td>' + datos[i].Marca + '</td>';
          tablaHTML += '<td>' + datos[i].nombre_propietario + '</td>';
          tablaHTML += '<td>' + datos[i].nombre_conductor + '</td>';
          tablaHTML += '<td>';
          tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 viewButton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>Visualizar</button>';
          tablaHTML += '<button type="button" class="btn btn-danger btn-sm mx-1 deleteButton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>Liberar</button>';
          tablaHTML += '</td>';
          tablaHTML += '</tr>';
      }

        $('#Tablainforme').html(tablaHTML);
    },
      error: function(xhr) {
        console.error(xhr.responseText);
        var errorResponse = JSON.parse(xhr.responseText);
        swal('Error', errorResponse.error, 'error');
    }
});
}
});

$(document).ready(function() {
    if (window.location.pathname.endsWith("gestion.php")) {
      //Se realiza la solicitud AJAX al cargar la página
      $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/propietariosController.php',
  
        success: function(response) {
          var datos = JSON.parse(response);
          var tablaHTML = '';
  
          for (var i = 0; i < datos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + datos[i].documento + '</td>';
            tablaHTML += '<td>' + datos[i].nombre_propietario + '</td>';
            tablaHTML += '<td>' + datos[i].cantidad_vehiculos + '</td>';
            tablaHTML += '<td>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 addButton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>Agregar Vehiculo</button>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 viewButton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</button>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 editButton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</button>';
            tablaHTML += '<button type="button" class="btn btn-danger btn-sm mx-1 deleteButton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>';
            tablaHTML += '</td>';
            tablaHTML += '</td>';
            tablaHTML += '</tr>';
        }
  
          $('#TablaPropietario').html(tablaHTML);
      },
        error: function(xhr) {
          console.error(xhr.responseText);
          var errorResponse = JSON.parse(xhr.responseText);
          swal('Error', errorResponse.error, 'error');
      }
  });
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/conductoresController.php',

        success: function(response) {
        var datos = JSON.parse(response);
        var tablaHTML = '';

        for (var i = 0; i < datos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + datos[i].documento + '</td>';
            tablaHTML += '<td>' + datos[i].nombre_conductor + '</td>';
            tablaHTML += '<td>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 AsignarBoton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Asignar</button>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 viewBoton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</button>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 editarBoton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</button>';
            tablaHTML += '<button type="button" class="btn btn-danger btn-sm mx-1 eliminarBoton" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>';
            tablaHTML += '</td>';
            tablaHTML += '</tr>';
        }

        $('#TablaConductor').html(tablaHTML);
    },
        error: function(xhr) {
        console.error(xhr.responseText);
        var errorResponse = JSON.parse(xhr.responseText);
        swal('Error', errorResponse.error, 'error');
    }
    });
    }
});

$('#btnbuscar').click(function() {
    var buscar = $('#buscar').val();
    console.log(buscar);
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/VerificarUsuario.php',
        data: { buscar_php: buscar },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.success) {
                // Si el usuario ya está registrado como propietario
                swal({
                    title: "Aviso",
                    text: response.message, 
                    icon: "warning",
                    buttons: {
                        confirm: "Agregar otro vehículo",
                        cancel: "Cancelar"
                    },
                    dangerMode: false,
                }).then(function(confirm) {
                    if (confirm) {
                        $('#documento1').val(buscar);
                        $('#addVehiculo').modal('show');
                        $('#VerificarPro').modal('hide');
                    } else {
                        $('#buscar').val('');
                        $('#VerificarPro').modal('hide');
                    }
                });
            } else {
                if (response.message.includes("No se encontraron datos del usuario")) {
                    $('#documento').val(buscar);
                    $('#addPropietario').modal('show');
                    $('#VerificarPro').modal('hide');
                } else {
                    swal({
                        title: "Aviso",
                        text: response.message, 
                        icon: "info",
                        buttons: {
                            confirm: "Aceptar"
                        },
                        dangerMode: false,
                    }).then(function() {
                        $('#buscar').val('');
                        window.location.reload();
                    });
                }
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
    $('#documento').val(buscar);
});

$('#AgregarConductor').click(function() {
    var form = $('#form_conductor').serialize();
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/ingresarConductor.php',
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
                    $('#form_conductor')[0].reset();
                    window.location.reload();
                });
            } else if (response.message) {
                swal('Error', response.message, 'warning');
                $('#form_conductor')[0].reset();
            } else {
                swal('Error', 'Respuesta inesperada del servidor', 'error');
            }
        }
    });
});

$('#AgregarPropietario').click(function() {
  var form = $('#form_propietario').serialize();
  $.ajax({
      method: 'POST',
      url: '/prueba/controlador/usuarios/ingresarPropietario.php',
      data: form,
      dataType: 'json',
      success: function(response) {
          if (response.error) {
              swal('Error', response.error, 'warning');
          } else if (response.success) {
              swal({
                  title: "Éxito",
                  text: response.message, 
                  icon: "success",
                  buttons: {
                      confirm: "Aceptar",
                  },
                  dangerMode: false,
              }).then(function() {
                $('#form_propietario')[0].reset();
                window.location.reload();
              });
          } else {
              swal('Error', 'Respuesta inesperada del servidor', 'error');
          }
      },
      error: function(xhr, status, error) {
          swal('Error', 'Hubo un problema al procesar la solicitud. Por favor, intenta de nuevo más tarde.', 'error');
      }
  });
});

$(document).ready(function() {
    $('#TablaPropietario').on('click', '.viewButton', function() {
        var documento = $(this).closest('tr').find('td:first').text();
                
        // Realizar la solicitud AJAX utilizando el valor del documento
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/usuarios/VerPropietarios.php',
            data: { documento_php: documento },
            dataType: 'json',
            success: function(response) {

                if (response.length > 0) {
                    var propietario = response[0]; 
                    $('#documento').val(propietario.documento).prop('disabled', true);
                    $('#primer_nom').val(propietario.primer_nom).prop('disabled', true);
                    $('#segundo_nom').val(propietario.segundo_nom).prop('disabled', true);
                    $('#apellidos').val(propietario.apellidos).prop('disabled', true);
                    $('#direccion').val(propietario.direccion).prop('disabled', true);
                    $('#telefono').val(propietario.telefono).prop('disabled', true);
                    $('#ciudad').val(propietario.ciudad).prop('disabled', true);

                    var tablaHTML = '';
                    for (var i = 0; i < response.length; i++) {
                        var vehiculo = response[i];
                        tablaHTML += '<tr>';
                        tablaHTML += '<td>' + vehiculo.placa + '</td>';
                        tablaHTML += '<td>' + vehiculo.marca + '</td>';
                        tablaHTML += '<td>' + vehiculo.color + '</td>';
                        tablaHTML += '<td>' + vehiculo.tipo_veh + '</td>';
                        tablaHTML += '</tr>';
                    }
                    $('#TablaVehiculos1').html(tablaHTML);
                    $('#VerPropietario').modal('show'); 
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
    $('#TablaPropietario').on('click', '.editButton', function() {
        var documento = $(this).closest('tr').find('td:first').text();
                
        // Realizar la solicitud AJAX utilizando el valor del documento
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/usuarios/DatosPropietarios.php',
            data: { documento_php: documento },
            dataType: 'json',
            success: function(response) {

                if (response.length > 0) {
                    var propietario1 = response[0]; 
                    console.log(propietario1);
                    $('#documento2').val(propietario1.documento).prop('disabled', true);
                    $('#primer_nom1').val(propietario1.primer_nom).prop('disabled', true);
                    $('#segundo_nom1').val(propietario1.segundo_nom).prop('disabled', true);
                    $('#apellidos1').val(propietario1.apellidos).prop('disabled', true);
                    $('#documento22').val(propietario1.documento);
                    $('#direccion1').val(propietario1.direccion)
                    $('#telefono1').val(propietario1.telefono);
                    $('#ciudad1').val(propietario1.ciudad);

                    $('#VerPropietario2').modal('show'); 
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

$('#btnactualizar').click(function() {
    var form = $('#form_ediusuario').serialize();
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/EditarPropietario.php',
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
                    $('#form_edipropietario')[0].reset();
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

$('#btnactualizar2').click(function() {
    var form = $('#form_ediconductor').serialize();
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/EditarPropietario.php',
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
                    $('#form_edipropietario')[0].reset();
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
    $('#TablaPropietario').on('click', '.deleteButton', function() {

        swal({
            title: "¿Estás seguro?",
            text: "¿Realmente quieres eliminar al propietario?.Eliminaras todos los vehiculos asociados a él",
            icon: "warning",
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar",
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var documento = $(this).closest('tr').find('td:first').text();
                
                $.ajax({
                    method: 'POST',
                    url: '/prueba/controlador/usuarios/EliminarPropietarios.php',
                    data: { documento_php: documento },
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

$(document).ready(function() {
    $('#TablaConductor').on('click', '.viewBoton', function() {
        var documento = $(this).closest('tr').find('td:first').text();
                
        // Realizar la solicitud AJAX utilizando el valor del documento
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/usuarios/DatosPropietarios.php',
            data: { documento_php: documento },
            dataType: 'json',
            success: function(response) {

                if (response.length > 0) {
                    var propietario = response[0]; 
                    $('#documento22').val(propietario.documento).prop('disabled', true);
                    $('#primer_nom2').val(propietario.primer_nom).prop('disabled', true);
                    $('#segundo_nom2').val(propietario.segundo_nom).prop('disabled', true);
                    $('#apellidos2').val(propietario.apellidos).prop('disabled', true);
                    $('#direccion2').val(propietario.direccion).prop('disabled', true);
                    $('#telefono2').val(propietario.telefono).prop('disabled', true);
                    $('#ciudad2').val(propietario.ciudad).prop('disabled', true);

                    $('#VerConductor').modal('show'); 
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
    $('#TablaConductor').on('click', '.editarBoton', function() {
        var documento = $(this).closest('tr').find('td:first').text();
                
        // Realizar la solicitud AJAX utilizando el valor del documento
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/usuarios/DatosPropietarios.php',
            data: { documento_php: documento },
            dataType: 'json',
            success: function(response) {

                if (response.length > 0) {
                    var propietario1 = response[0]; 
                    console.log(propietario1);
                    $('#documento3').val(propietario1.documento).prop('disabled', true);
                    $('#primer_nom3').val(propietario1.primer_nom).prop('disabled', true);
                    $('#segundo_nom3').val(propietario1.segundo_nom).prop('disabled', true);
                    $('#apellidos3').val(propietario1.apellidos).prop('disabled', true);
                    $('#documento33').val(propietario1.documento);
                    $('#direccion3').val(propietario1.direccion)
                    $('#telefono3').val(propietario1.telefono);
                    $('#ciudad3').val(propietario1.ciudad);

                    $('#VerConductor2').modal('show'); 
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
    $('#TablaConductor').on('click', '.eliminarBoton', function() {

        swal({
            title: "¿Estás seguro?",
            text: "¿Realmente quieres eliminar al conductor?",
            icon: "warning",
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar",
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var documento = $(this).closest('tr').find('td:first').text();
                
                $.ajax({
                    method: 'POST',
                    url: '/prueba/controlador/usuarios/EliminarPropietarios.php',
                    data: { documento_php: documento },
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
