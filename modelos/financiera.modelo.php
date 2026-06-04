<?php

require_once "conexion.php";

class ModeloFinanciera {

    /*=============================================
    MOSTRAR BENEFICIARIOS POR CONVOCATORIA
    =============================================*/
    static public function mdlMostrarBeneficiarios($idConvocatoria) {
        $stmt = Conexion::conectar()->prepare("
            SELECT 
                ap.descripcion_apoyo AS tipo_apoyo,
                c.id AS nro_convocatoria,
                u.documento_id AS identificacion,
                CONCAT(u.nombres, ' ', u.apellidos) AS aprendiz,
                f.codigo AS codigo_ficha,
                f.programa_ficha AS programa_formacion,
                a.meses_otorgados AS meses_beneficio,
                a.fecha_inicio_real AS fecha_inicio_pago,
                DATE_ADD(a.fecha_inicio_real, INTERVAL a.meses_otorgados MONTH) AS fecha_fin_pago,
                a.estado AS estado_asignacion
            FROM asignaciones a
            JOIN inscripciones i ON a.inscripcion_id = i.id
            JOIN usuarios u ON i.usuario_id = u.id
            JOIN fichas f ON i.ficha_id = f.id_ficha  
            JOIN convocatorias c ON i.convocatoria_id = c.id
            JOIN apoyos ap ON c.apoyo_id = ap.id_apoyo
            WHERE c.id = :idConvocatoria
            ORDER BY aprendiz ASC
        ");

        $stmt->bindParam(":idConvocatoria", $idConvocatoria, PDO::PARAM_INT);
        $stmt->execute();
        
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        
        return $resultados;
    }

    /*=============================================
    LISTAR CONVOCATORIAS CON BENEFICIARIOS (ASIGNACIONES)
    =============================================*/
    static public function mdlListarConvocatoriasFinanciera() {
        $stmt = Conexion::conectar()->prepare("
            SELECT DISTINCT c.id, c.apoyo_id, ap.descripcion_apoyo, ap.apoyo_icono
            FROM convocatorias c
            JOIN apoyos ap ON c.apoyo_id = ap.id_apoyo
            JOIN inscripciones i ON i.convocatoria_id = c.id
            JOIN asignaciones a ON a.inscripcion_id = i.id
            WHERE c.estado_en_convocatoria = 'CERRADA'
            ORDER BY c.id DESC
        ");

        $stmt->execute();
        
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        
        return $resultados;
    }
}
