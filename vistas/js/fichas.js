/*=============================================
ACTIVAR / DESACTIVAR FICHA
=============================================*/
$(document).on("click", ".btnActivarFicha", function(){
    let boton = $(this);
    let estadoActual = boton.attr("data-estadoFicha");
    let idFicha = boton.attr("data-idFicha");

    $.ajax({
        url: "ajax/fichas.ajax.php",
        method: "POST",
        data: {
            idFichaEstado: idFicha,
            estado: estadoActual
        },
        success: function (respuesta) {
            if (respuesta.trim()==="ok"){
                if (estadoActual === "activo") {
                    boton.removeClass("btn-danger");
                    boton.addClass("btn-success");
                    boton.html("activo");
                    boton.attr("data-estadoFicha","inactivo");
                } else {
                    boton.removeClass("btn-success");
                    boton.addClass("btn-danger");
                    boton.html("inactivo");
                    boton.attr("data-estadoFicha","activo");
                }
            }
        }
    });
});

/*=============================================
EDITAR FICHA
=============================================*/
$(document).on("click", ".btnEditarFicha", function() {
    let idFicha = $(this).attr("data-idFicha");
    let datos = new FormData();
    datos.append("idFicha", idFicha);

    $.ajax({
        url: "ajax/fichas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idFichaEditar").val(respuesta["id_ficha"]);
            $("#editarCodigoFicha").val(respuesta["codigo"]);
            
            $("#editarSedeNombre").val(respuesta["nombre_sede"]);
            $("#editarSedeId").val(respuesta["sede_id"]);
            
            $("#editarProgramaFicha").val(respuesta["programa_ficha"]);
            $("#editarFechaInicio").val(respuesta["fecha_inicio"]);
            $("#editarFechaFinLectiva").val(respuesta["fecha_fin_lectiva"]);
            $("#editarFechaFin").val(respuesta["fecha_fin"]);
        }
    });
});

/*=============================================
CONSULTAR FICHA
=============================================*/
$(document).on("click", ".btnConsultarFicha", function() {
    let idFicha = $(this).attr("data-idFicha");
    let datos = new FormData();
    datos.append("idFicha", idFicha);

    $.ajax({
        url: "ajax/fichas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#consultarCodigoFicha").val(respuesta["codigo"]);
            $("#consultarSedeNombre").val(respuesta["nombre_sede"]);
            $("#consultarProgramaFicha").val(respuesta["programa_ficha"]);
            $("#consultarFechaInicio").val(respuesta["fecha_inicio"]);
            $("#consultarFechaFinLectiva").val(respuesta["fecha_fin_lectiva"]);
            $("#consultarFechaFin").val(respuesta["fecha_fin"]);
        }
    });
});

/*=============================================
VALIDAR CÓDIGO DE FICHA NO REPETIDO
=============================================*/
$('[name="nuevoCodigoFicha"], [name="editarCodigoFicha"]').change(function() {
    let element = $(this);
    let codigo = element.val();
    let isEditing = element.attr("id") === "editarCodigoFicha";
    let idFichaActual = isEditing ? $("#idFichaEditar").val() : null; 
    
    let datos = new FormData();
    datos.append("validarCodigo", codigo);

    $.ajax({
        url: "ajax/fichas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                if (!isEditing || respuesta["id_ficha"] != idFichaActual) {
                    element.val("");
                    Swal.fire({
                        icon: 'error',
                        title: '¡El código de la ficha ya existe!',
                        text: 'Por favor, ingrese un código diferente.',
                    });
                }
            }
        }
    });
});

/*=============================================
MANEJO DEL DATALIST DE SEDES (NUEVA Y EDICION)
=============================================*/
$('.inputDatalistSede').on('input', function() {
    let val = $(this).val();
    let hiddenInputId = $(this).attr("id") === "nuevaSedeNombre" ? "#nuevaSedeId" : "#editarSedeId";
    let selectedOption = $('#sedesList option').filter(function() {
        return this.value === val;
    });

    if (selectedOption.length) {
        $(hiddenInputId).val(selectedOption.data('id'));
    } else {
        $(hiddenInputId).val(""); 
    }
});
