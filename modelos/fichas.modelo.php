<?php

require_once "conexion.php";

class ModeloFichas
{
    /*=============================================
    MOSTRAR FICHAS
    =============================================*/
    static public function mdlMostrarFichas($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    /*=============================================
    AGREGAR FICHA
    =============================================*/
    static public function mdlAgregarFicha($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, sede_id, programa_ficha, fecha_inicio, fecha_fin_lectiva, fecha_fin) VALUES (:codigo, :sede_id, :programa_ficha, :fecha_inicio, :fecha_fin_lectiva, :fecha_fin)");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":sede_id", $datos["sede_id"], PDO::PARAM_INT);
        $stmt->bindParam(":programa_ficha", $datos["programa_ficha"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin_lectiva", $datos["fecha_fin_lectiva"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    /*=============================================
    EDITAR FICHA
    =============================================*/
    static public function mdlEditarFicha($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, sede_id = :sede_id, programa_ficha = :programa_ficha, fecha_inicio = :fecha_inicio, fecha_fin_lectiva = :fecha_fin_lectiva, fecha_fin = :fecha_fin WHERE id_ficha = :id_ficha");

        $stmt->bindParam(":id_ficha", $datos["id_ficha"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":sede_id", $datos["sede_id"], PDO::PARAM_INT);
        $stmt->bindParam(":programa_ficha", $datos["programa_ficha"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin_lectiva", $datos["fecha_fin_lectiva"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
