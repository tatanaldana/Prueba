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
          tablaHTML += '<td type="hidden">' + datos[i].documento + ' data-doc-usuario="' + datos[i].documento + '"</td>';
          tablaHTML += '<td>' + datos[i].placa + '</td>';
          tablaHTML += '<td>' + datos[i].marca + '</td>';
          tablaHTML += '<td>' + datos[i].nombre_propietario + '</td>';
          tablaHTML += '<td>' + datos[i].nombre_conductor + '</td>';
          tablaHTML += '<td>';
          tablaHTML += '<button type="button" id="viewBoton"class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</a>';
          tablaHTML += '<button type="button" id="editarBoton" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</a>';
          tablaHTML += '<button type="button" id="eliminarBoton" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';
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
            tablaHTML += '<button type="button" id="viewBoton1"class="btn btn-success btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</a>';
            tablaHTML += '<button type="button" id="editarBoton1" class="btn btn-success btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</a>';
            tablaHTML += '<button type="button" id="eliminarBoton1" class="btn btn-danger btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';
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
            tablaHTML += '<button type="button" id="AsignarBoton2"class="btn btn-success btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Asignar</a>';
            tablaHTML += '<button type="button" id="viewBoton2"class="btn btn-success btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</a>';
            tablaHTML += '<button type="button" id="editarBoton2" class="btn btn-success btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</a>';
            tablaHTML += '<button type="button" id="eliminarBoton2" class="btn btn-danger btn-sm mx-1"" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';
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
                        window.location.href = "index.php";
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
                    window.location.href = "index.php";
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
                  window.location.href = "index.php";
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