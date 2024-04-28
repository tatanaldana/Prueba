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
            tablaHTML += '<td style="display: none;"><input type="hidden" name="doc_usuario" value="' + datos[i].doc_usuario + '">' + datos[i].doc_usuario + '</td>';
            tablaHTML += '<td>' + datos[i].placa + '</td>';
            tablaHTML += '<td>' + datos[i].color + '</td>';
            tablaHTML += '<td>' + datos[i].Marca + '</td>';
            tablaHTML += '<td>' + datos[i].tipo_vehiculo + '</td>';
            tablaHTML += '<td>';
            tablaHTML += '<button type="button" id="viewBoton3"class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Visualizar</a>';
            tablaHTML += '<button type="button" id="editarBoton3" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Editar</a>';
            tablaHTML += '<button type="button" id="eliminarBoton3" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';
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
                    window.location.href = "index.php";
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