$(document).ready(function() {
    // Inicializar DataTable para ambos tables
    $("#example1").DataTable();
    $("#empresasTable").DataTable(); // Inicializa el segundo DataTable

    // Configurar el token CSRF en todas las solicitudes AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Manejar el evento de cambio para cualquier elemento con la clase toggle-class en example1
    $('#example1, #empresasTable').on('change', '.toggle-class', function() {
        var isChecked = $(this).prop('checked'); // Verificar si el checkbox está marcado o desmarcado
        var elementType = $(this).data('type'); // Obtener el tipo de elemento (empresa, contacto, etc.)
        var elementId = $(this).attr('data-id'); // Obtener el ID del elemento
        var url;

        // Configurar la URL y los datos según el tipo de elemento
        switch (elementType) {
            case 'pais':
                url = 'cambioestadopais';
                break;
            case 'departamento':
                url = 'cambioestadodepartamento';
                break;
            case 'ciudad':
                url = 'cambioestadociudad';
                break;
            case 'tipodocumento':
                url = 'cambioestadotipodocumento';
                break;
            case 'user':
                url = 'cambioestadouser';
                break;
            case 'empresa': // Caso para Empresa
                url = 'cambioestadoempresa';
                break;
            case 'contacto': // Caso para Contacto
                url = 'cambioestadocontacto';
                break;
            default:
                return; // Salir de la función si el tipo de elemento no es válido
        }

        $.ajax({
            type: "POST", // Cambiado a POST para más seguridad
            dataType: "json",
            url: url,
            data: {
                'estado': isChecked ? 1 : 0, // Estado (1 para marcado, 0 para desmarcado)
                'id': elementId // ID del elemento
            },
            success: function(data) {
                console.log(`Se ha cambiado el estado del ${elementType} correctamente.`);
                console.log('Respuesta del servidor:', data);
            },
            error: function(xhr, estado, error) {
                console.error(`Error al cambiar el estado del ${elementType}: ${error}`);
                console.error(`Respuesta del servidor: ${xhr.responseText}`);
            }
        });
    });
});
