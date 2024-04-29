$(document).ready(function() {
    $('#TablaConductor').on('click', '.AsignarBoton', function() {
        // Realizar la solicitud AJAX utilizando el valor del documento
        var documento = $(this).closest('tr').find('td:first').text();
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/asignaciones/VerificarAsignacion.php',

            success: function(response) {

        var datos = JSON.parse(response);
        console.log(datos   );
          var tablaHTML = '';
         
          for (var i = 0; i < datos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + datos[i].placa + '</td>';
            tablaHTML += '<td>' + datos[i].color + '</td>';
            tablaHTML += '<td>' + datos[i].marca + '</td>';
            tablaHTML += '<td>' + datos[i].tipo_veh + '</td>';
            tablaHTML += '<td style="display: none;"><input type="hidden" name="doc_usuario" id="doc" value="' + documento + '"></td>';
            tablaHTML += '<td>';
            tablaHTML += '<button type="button" class="btn btn-success btn-sm mx-1 AsignarBoton" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Asignar</button>';
            tablaHTML += '</td>';
            tablaHTML += '</tr>';
        }
  
          $('#TablaAsignar').html(tablaHTML);
          $('#asignarVehiculo').modal('show');
      },
        error: function(xhr) {
          console.error(xhr.responseText);
          var errorResponse = JSON.parse(xhr.responseText);
          swal('Error', errorResponse.error, 'error');
      }
  });
});
});

$(document).ready(function() {
    $('#TablaAsignar').on('click', '.AsignarBoton', function() {
        // Realizar la solicitud AJAX utilizando el valor del documento
        var placa = $(this).closest('tr').find('td:first').text();
        var documento = $('#doc').val();
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/asignaciones/AsignarConductor.php',
            data:{placa_php: placa,documento_php: documento },
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
});

$(document).ready(function() {
    $('#Tablainforme').on('click', '.deleteButton', function() {

        swal({
            title: "¿Estás seguro?",
            text: "¿Realmente quieres dejar disponible el vehiculo?",
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
                    url: '/prueba/controlador/asignaciones/eliminarAsignacion.php',
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

$(document).ready(function() {
    $('#Tablainforme').on('click', '.viewButton', function() {
        var placa = $(this).closest('tr').find('td:first').text();
                
        // Realizar la solicitud AJAX utilizando el valor del documento
        $.ajax({
            method: 'POST',
            url: '/prueba/controlador/asignaciones/VerInforme.php',
            data: { placa_php: placa },
            dataType: 'json',
            success: function(response) {

                if (response.length > 0) {
                    var propietario = response[0]; 
                    $('#documento8').val(propietario.documento_c).prop('disabled', true);
                    $('#primer_nom8').val(propietario.primer_nom_c).prop('disabled', true);
                    $('#segundo_nom8').val(propietario.segundo_nom_c).prop('disabled', true);
                    $('#apellidos8').val(propietario.apellidos_c).prop('disabled', true);
                    $('#direccion8').val(propietario.direccion_c).prop('disabled', true);
                    $('#telefono8').val(propietario.telefono_c).prop('disabled', true);
                    $('#ciudad8').val(propietario.ciudad_c).prop('disabled', true);
                    $('#documento7').val(propietario.documento_p).prop('disabled', true);
                    $('#primer_nom7').val(propietario.primer_nom_p).prop('disabled', true);
                    $('#segundo_nom7').val(propietario.segundo_nom_p).prop('disabled', true);
                    $('#apellidos7').val(propietario.apellidos_p).prop('disabled', true);
                    $('#direccion7').val(propietario.direccion_p).prop('disabled', true);
                    $('#telefono7').val(propietario.telefono_p).prop('disabled', true);
                    $('#ciudad7').val(propietario.ciudad_p).prop('disabled', true);
                    $('#marca').val(propietario.Marca).prop('disabled', true);
                    $('#color').val(propietario.color).prop('disabled', true);
                    $('#placa').val(propietario.placa).prop('disabled', true);
                    $('#tipo_veh').val(propietario.tipo_veh).prop('disabled', true);

                    $('#VerInforme').modal('show'); 
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