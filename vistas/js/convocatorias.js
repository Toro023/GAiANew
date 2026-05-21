$(document).ready(function() {
    
    // =============================================================================
    // 0. INICIALIZAR DATATABLE PRINCIPAL
    // =============================================================================
    if ($('#tblConvocatorias').length > 0) {
        $('#tblConvocatorias').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                }
            }
        });
    }

    // =============================================================================
    // LÓGICA DEL MODAL "AGREGAR CONVOCATORIA" Y FORMULARIO BAREMO
    // =============================================================================
    
    let baremoCounter = 0;

    // 1. Selector de Apoyo y Badge Dualidad
    $('#apoyo_id').on('change', function() {
        let option = $(this).find('option:selected');
        let duality = option.data('duality');
        let badge = $('#badge_duality');

        badge.removeClass('d-none badge-success badge-warning');
        
        if (duality === true) {
            badge.addClass('badge-success').html('<i class="fas fa-check-double mr-1"></i> Permite Dualidad');
        } else if (duality === false) {
            badge.addClass('badge-warning').html('<i class="fas fa-ban mr-1"></i> Sin Dualidad');
        } else {
            badge.addClass('d-none');
        }
    });

    // 2. Baremo Dinámico
    function checkEmptyState() {
        if ($('#baremoContainer').children().length === 0) {
            $('#baremoEmptyState').removeClass('d-none');
        } else {
            $('#baremoEmptyState').addClass('d-none');
        }
    }

    $('#btnAgregarCriterio').on('click', function() {
        baremoCounter++;
        let templateContent = $('#baremoRowTemplate').html();
        let newRow = $(templateContent);

        // Arreglar IDs de switch para que funcionen los eventos del label nativos de Bootstrap
        let switchId = 'switch_' + baremoCounter;
        newRow.find('.custom-control-input').attr('id', switchId);
        newRow.find('.custom-control-label').attr('for', switchId);

        // Evento de toggle crítico
        newRow.find('.toggle-critico').on('change', function() {
            let hiddenInput = $(this).siblings('.hidden-critico-input');
            if ($(this).is(':checked')) {
                hiddenInput.val('1');
            } else {
                hiddenInput.val('0');
            }
        });

        // Evento eliminar fila
        newRow.find('.btn-eliminar-fila').on('click', function() {
            $(this).closest('.baremo-row').fadeOut(250, function() {
                $(this).remove();
                checkEmptyState();
            });
        });

        // Insertar en DOM con animacion
        newRow.hide();
        $('#baremoContainer').append(newRow);
        newRow.fadeIn(250);
        checkEmptyState();
    });

    // Añadir el primer criterio por defecto cuando se abra el modal
    // Utilizamos el evento show.bs.modal de Bootstrap para prepararlo
    $('#modal-agregarConvocatoria').on('show.bs.modal', function (e) {
        if ($('#baremoContainer').children().length === 0) {
            $('#btnAgregarCriterio').click();
        }
    });

    // 3. Control de Estados y Submit (Botones de Guardar Borrador y Publicar)
    $('#btnBorrador').on('click', function() {
        let form = $('#formConvocatoria')[0];
        if (form.checkValidity()) {
            $('#estado_convocatoria').val('CONFIGURACION');
            
            // Logica temporal para vista (maquetación)
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Borrador Guardado',
                showConfirmButton: false,
                timer: 1500
            });
            $('#modal-agregarConvocatoria').modal('hide');
            // En backend real: form.submit();
            
        } else {
            form.reportValidity();
        }
    });

    $('#btnPublicar').on('click', function() {
        if ($('#baremoContainer').children().length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes agregar al menos un documento o criterio en el baremo para poder publicar.'
            });
            return;
        }

        let form = $('#formConvocatoria')[0];
        if (form.checkValidity()) {
            Swal.fire({
                title: '¿Publicar Convocatoria?',
                text: "Una vez ABIERTA, los aprendices podrán visualizarla e iniciar sus inscripciones.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, publicar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#estado_convocatoria').val('ABIERTA');
                    
                    // Logica temporal para vista (maquetación)
                    Swal.fire(
                      'Publicada!',
                      'La convocatoria ha sido abierta exitosamente.',
                      'success'
                    )
                    $('#modal-agregarConvocatoria').modal('hide');
                    // En backend real: form.submit();
                }
            });
        } else {
            form.reportValidity();
        }
    });

});
