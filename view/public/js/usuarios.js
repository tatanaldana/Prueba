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

$('#btnbuscar').click(function() {
    var buscar = $('#buscar').val();
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/VerificarUsuario.php',
        data: { buscar_php: buscar },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                swal({
                    title: "Aviso",
                    text: response.message, 
                    icon: "warning",
                    buttons: {
                        confirm: "Aceptar",
                    },
                    dangerMode: false,
                }).then(function() {
                    // Redireccionar al index.php
                    window.location.href = "index.php";
                });
            } else {
                // Validar el campo "rol"
                if (response.rol==1) {
                    // Abrir el modal de inserción
                    $('#addPropietario').modal('show');
                } else {
                    // Redireccionar al index.php si no se cumple la condición
                    $('#addVehiculo').modal('show');
                }
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});

$('#AgregarConductor').click(function() {
    var form = $('#form_conductor').serialize();
    $.ajax({
        method: 'POST',
        url: '/prueba/controlador/usuarios/ingresarConductor.php',
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