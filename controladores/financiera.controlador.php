<?php

class ControladorFinanciera {

    /*=============================================
    MOSTRAR BENEFICIARIOS POR CONVOCATORIA
    =============================================*/
    static public function ctrMostrarBeneficiarios($idConvocatoria) {
        $respuesta = ModeloFinanciera::mdlMostrarBeneficiarios($idConvocatoria);
        return $respuesta;
    }

    /*=============================================
    LISTAR CONVOCATORIAS CON BENEFICIARIOS
    =============================================*/
    static public function ctrListarConvocatoriasFinanciera() {
        $respuesta = ModeloFinanciera::mdlListarConvocatoriasFinanciera();
        return $respuesta;
    }
}
