$('#nuevoDocumento').change(function() {

    let nuevoDocumento = $(this).val();
    console.log("este es el documento a ingresar: " +nuevoDocumento);
    let datos = new FormData();
    datos.append("nuevoDocumento", nuevoDocumento);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta) {
                $("#nuevoDocumento").val("");
                Swal.fire({
                    icon: 'error',
                    title: '¡El documento ya existe!',
                    text: 'Por favor, ingrese un documento diferente.',
                });
            }
        },
    }); //ajax



}); //fin de nuevoDocumento.change

$(document).on("click", ".btnActivarUsuario", function(){
    let boton = $(this);
    let estadoActual = boton.attr("data-estadoUsuario");
    let idUsuario = boton.attr("data-idUsuario");
    // console.log("estadoUsuario", estadoActual);
    // console.log("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: {
            idUsuarioEstado: idUsuario,
            estado: estadoActual
        },
        success: function (respuesta) {
            // console.log(respuesta);

            if (respuesta.trim()==="ok"){
                if (estadoActual === "activo") {
                    boton.removeClass("btn-danger");
                    boton.addClass("btn-success");
                    boton.html("activo");
                    boton.attr("data-estadoUsuario","inactivo");
                } else {
                    boton.removeClass("btn-success");
                    boton.addClass("btn-danger");
                    boton.html("inactivo");
                    boton.attr("data-estadoUsuario","activo");
                }
            }
        }
    });

});

// Mostrar ocultar ficha según rol
$('#nuevoRol').change(function() {
    let rol = $(this).val();
    if (rol === "Aprendiz") {
        $('#divFicha').show();
        $('#inputFicha').attr('required', true);
    } else {
        $('#divFicha').hide();
        $('#inputFicha').val('');
        $('#nuevaFicha').val('');
        $('#inputFicha').removeAttr('required');
        $('#divDescripcionFicha').hide();
        $('#descripcionFicha').val('');
    }
});

// Autocompletar descripcion ficha
$('#inputFicha').on('input', function() {
    let val = $(this).val();
    let option = $('#listaFichas option').filter(function() {
        return this.value === val;
    });

    if (option.length) {
        let idFicha = option.attr('data-id');
        let programa = option.attr('data-programa');
        $('#nuevaFicha').val(idFicha);
        $('#descripcionFicha').val(programa);
        $('#divDescripcionFicha').show();
    } else {
        $('#nuevaFicha').val('');
        $('#descripcionFicha').val('');
        $('#divDescripcionFicha').hide();
    }
});

//===========================================
// EDITAR USUARIO
//===========================================
$(document).on("click", ".btnEditarUsuario", function() {
    let idUsuario = $(this).attr("data-idUsuario");
    let datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idUsuarioEditar").val(respuesta["id"]);
            $("#editarTipoDocumento").val(respuesta["tipo_documento"]);
            $("#editarDocumento").val(respuesta["documento_id"]);
            $("#editarNombre").val(respuesta["nombres"]);
            $("#editarApellido").val(respuesta["apellidos"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
            $("#editarCorreo").val(respuesta["correo"]);
            
            // Seleccionar el rol (ignorando mayúsculas/minúsculas)
            let rolDB = respuesta["rol"].toUpperCase();
            $("#editarRol option").each(function() {
                if($(this).val().toUpperCase() === rolDB) {
                    $(this).prop("selected", true);
                }
            });

            $("#passwordActual").val(respuesta["password"]);

            // Lógica para Aprendiz
            if(respuesta["rol"] === "Aprendiz" || respuesta["rol"] === "APRENDIZ"){
                $("#divEditarFicha").show();
                $("#inputEditarFicha").attr('required', true);
                
                // Si trae ficha guardada, pre-cargar el input
                if(respuesta["ficha_id"]){
                    let fichaOption = $('#listaFichas option[data-id="'+respuesta["ficha_id"]+'"]');
                    if(fichaOption.length > 0){
                        $("#inputEditarFicha").val(fichaOption.attr('value'));
                        $("#editarFicha").val(respuesta["ficha_id"]);
                        $("#descripcionEditarFicha").val(fichaOption.attr('data-programa'));
                        $("#divDescripcionEditarFicha").show();
                    }
                }
            }else{
                $("#divEditarFicha").hide();
                $("#inputEditarFicha").removeAttr('required');
                $("#inputEditarFicha").val('');
                $("#editarFicha").val('');
                $("#divDescripcionEditarFicha").hide();
                $("#descripcionEditarFicha").val('');
            }
        }
    });
});

// Mostrar ocultar ficha según rol en EDICIÓN
$('#editarRol').change(function() {
    let rol = $(this).val();
    if (rol === "Aprendiz" || rol === "APRENDIZ") {
        $('#divEditarFicha').show();
        $('#inputEditarFicha').attr('required', true);
    } else {
        $('#divEditarFicha').hide();
        $('#inputEditarFicha').val('');
        $('#editarFicha').val('');
        $('#inputEditarFicha').removeAttr('required');
        $('#divDescripcionEditarFicha').hide();
        $('#descripcionEditarFicha').val('');
    }
});

// Autocompletar descripcion ficha en EDICIÓN
$('#inputEditarFicha').on('input', function() {
    let val = $(this).val();
    let option = $('#listaFichas option').filter(function() {
        return this.value === val;
    });

    if (option.length) {
        let idFicha = option.attr('data-id');
        let programa = option.attr('data-programa');
        $('#editarFicha').val(idFicha);
        $('#descripcionEditarFicha').val(programa);
        $('#divDescripcionEditarFicha').show();
    } else {
        $('#editarFicha').val('');
        $('#descripcionEditarFicha').val('');
        $('#divDescripcionEditarFicha').hide();
    }
});