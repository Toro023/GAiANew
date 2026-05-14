<?php

require_once "../controladores/fichas.controlador.php";
require_once "../modelos/fichas.modelo.php";
require_once "../controladores/sedes.controlador.php";
require_once "../modelos/sedes.modelo.php";

class AjaxFichas
{
    /*=============================================
    EDITAR FICHA
    =============================================*/
    public $idFicha;

    public function ajaxEditarFicha()
    {
        $item = "id_ficha";
        $valor = $this->idFicha;
        $respuesta = ControladorFichas::ctrMostrarFichas($item, $valor);
        
        if ($respuesta) {
            $sede = ControladorSedes::ctrMostrarSedes("id_sede", $respuesta["sede_id"]);
            $respuesta["nombre_sede"] = is_array($sede) ? $sede["descripcion_sede"] : "";
        }
        
        echo json_encode($respuesta);
    }

    /*=============================================
    VALIDAR CÓDIGO
    =============================================*/
    public $validarCodigo;

    public function ajaxValidarCodigo()
    {
        $item = "codigo";
        $valor = $this->validarCodigo;
        $respuesta = ControladorFichas::ctrMostrarFichas($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    CAMBIAR ESTADO FICHA
    =============================================*/
    public $idFichaEstado;
    public $estado;

    public function ajaxCambiarEstado()
    {
        $idFicha = $this->idFichaEstado;
        $estado = $this->estado;
        $respuesta = ControladorFichas::ctrCambiarEstadoFicha($idFicha, $estado);
        echo $respuesta ? 'ok' : 'error';
    }
}

/*=============================================
CAMBIAR ESTADO FICHA
=============================================*/
if (isset($_POST["idFichaEstado"]) && isset($_POST["estado"])) {
    $actFicha = new AjaxFichas();
    $actFicha->idFichaEstado = $_POST["idFichaEstado"];
    $actFicha->estado = $_POST["estado"];
    $actFicha->ajaxCambiarEstado();
}

/*=============================================
EDITAR FICHA
=============================================*/
if (isset($_POST["idFicha"])) {
    $editar = new AjaxFichas();
    $editar->idFicha = $_POST["idFicha"];
    $editar->ajaxEditarFicha();
}

/*=============================================
VALIDAR CÓDIGO NO REPETIDO
=============================================*/
if (isset($_POST["validarCodigo"])) {
    $valCodigo = new AjaxFichas();
    $valCodigo->validarCodigo = $_POST["validarCodigo"];
    $valCodigo->ajaxValidarCodigo();
}
