<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios
{

    public $nuevoDocumento;
    public $idUsuarioEstado; // usado para cambiar el estado
    public $estado; // usado para cambiar el estado

    public function ajaxValidarDocumento()
    {

        $item = "documento_id";
        $valor = $this->nuevoDocumento;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxCambiarEstado()
    {

        $idUsuario = $this->idUsuarioEstado;
        $estado = $this->estado;
        $respuesta = ControladorUsuarios::ctrCambiarEstadoUsuario($idUsuario, $estado);
        echo $respuesta ? 'ok' : 'error';
    }
    public $idUsuario; // usado para editar usuario

    public function ajaxEditarUsuario()
    {
        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["nuevoDocumento"])) {
    $valDocumento = new AjaxUsuarios();
    $valDocumento->nuevoDocumento = $_POST["nuevoDocumento"];
    $valDocumento->ajaxValidarDocumento();
}

if (isset($_POST["idUsuarioEstado"]) && isset($_POST["estado"])) {
    $actUsuario = new AjaxUsuarios();
    $actUsuario->idUsuarioEstado = $_POST["idUsuarioEstado"];
    $actUsuario->estado = $_POST["estado"];
    $actUsuario->ajaxCambiarEstado();
}

if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}
