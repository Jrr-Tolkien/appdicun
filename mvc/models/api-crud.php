<?php
  date_default_timezone_set('America/Costa_Rica');

  require_once "conexion.php";

  class DatosApi extends Conexion{

    public static function getEmpresasModel($tabla){
      // code...
      $stmt = Conexion::conectar()->prepare(
        "SELECT id_emp, nomb_emp, email_emp FROM $tabla");
      $stmt ->execute();
      return $stmt ->fetchAll();
      $stmt ->close();
    }

    static public function getAnunciosEmpresaModel($datos_id){
      // var_dump($datos_id);
      $stmt = Conexion::conectar()->prepare(
        " SELECT
              publicidad.id_publi,
              publicidad.fk_id_emp,
              publicidad.nomb_publi,
              publicidad.nomb_imag_publi,
              publicidad.ruta_imag_publi,
              publicidad.precio_publi,
              publicidad.descri_publi,
              publicidad.cond_publi,
              publicidad.dest_publi,
              publicidad.inicio_publi,
              publicidad.final_publi
          FROM
                publicidad
          INNER JOIN (
            SELECT empresa.id_emp, empresa.nomb_emp
              FROM empresa
            ) empresa
          ON publicidad.fk_id_emp = empresa.id_emp
          WHERE publicidad.fk_id_emp = $datos_id ");
      $stmt -> execute();
      #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
      return $stmt->fetchAll();
      $stmt->close();

    }




  }
 ?>
