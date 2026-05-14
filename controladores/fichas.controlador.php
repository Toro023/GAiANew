<?php

class ControladorFichas
{

    /*=============================================
    MOSTRAR FICHAS
    =============================================*/
    static public function ctrMostrarFichas($item, $valor)
    {
        $tabla = "fichas";
        $respuesta = ModeloFichas::mdlMostrarFichas($tabla, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    AGREGAR FICHA
    =============================================*/
    public function ctrAgregarFicha()
    {
        if (isset($_POST["nuevoCodigoFicha"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoCodigoFicha"])) {

                $tabla = "fichas";

                $datos = array(
                    "codigo" => $_POST["nuevoCodigoFicha"],
                    "sede_id" => $_POST["nuevaSedeId"],
                    "programa_ficha" => $_POST["nuevoProgramaFicha"],
                    "fecha_inicio" => empty($_POST["nuevaFechaInicio"]) ? null : $_POST["nuevaFechaInicio"],
                    "fecha_fin_lectiva" => empty($_POST["nuevaFechaFinLectiva"]) ? null : $_POST["nuevaFechaFinLectiva"],
                    "fecha_fin" => empty($_POST["nuevaFechaFin"]) ? null : $_POST["nuevaFechaFin"]
                );

                $respuesta = ModeloFichas::mdlAgregarFicha($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡La ficha ha sido guardada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "fichas";
                            }
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "¡El código de la ficha no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "fichas";
                        }
                    })
                </script>';
            }
        }
    }

    /*=============================================
    EDITAR FICHA
    =============================================*/
    public function ctrEditarFicha()
    {
        if (isset($_POST["editarCodigoFicha"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarCodigoFicha"])) {

                $tabla = "fichas";

                $datos = array(
                    "id_ficha" => $_POST["idFichaEditar"],
                    "codigo" => $_POST["editarCodigoFicha"],
                    "sede_id" => $_POST["editarSedeId"],
                    "programa_ficha" => $_POST["editarProgramaFicha"],
                    "fecha_inicio" => empty($_POST["editarFechaInicio"]) ? null : $_POST["editarFechaInicio"],
                    "fecha_fin_lectiva" => empty($_POST["editarFechaFinLectiva"]) ? null : $_POST["editarFechaFinLectiva"],
                    "fecha_fin" => empty($_POST["editarFechaFin"]) ? null : $_POST["editarFechaFin"]
                );

                $respuesta = ModeloFichas::mdlEditarFicha($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡La ficha ha sido editada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "fichas";
                            }
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "¡El código de la ficha no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "fichas";
                        }
                    })
                </script>';
            }
        }
    }

    /*=============================================
    CAMBIAR ESTADO FICHA
    =============================================*/
    static public function ctrCambiarEstadoFicha($idFicha, $estado)
    {
        $tabla = "fichas";
        $item1 = "estado";
        $valor1 = $estado;
        $item2 = "id_ficha";
        $valor2 = $idFicha;

        $respuesta = ModeloFichas::mdlCambiarEstadoFicha($tabla, $item1, $valor1, $item2, $valor2);

        return $respuesta;
    }
}
