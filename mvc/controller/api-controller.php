<?php
  date_default_timezone_set('America/Costa_Rica');

  class MvcApiController{

    static public function getEmpresasController(){

     // var_dump($respuesta);
      $datosApiController = array();
      $datosApiController["items"] = array();
      $respuesta = DatosApi::getEmpresasModel("empresa");

      foreach ($respuesta as $key => $row) {
        $item = array('id'     =>$row['id_emp'],
                      'nombre' =>$row['nomb_emp'],
                      'email'  =>$row['email_emp']  );
        array_push($datosApiController['items'], $item);
      }
      echo json_encode($datosApiController);
    }



    static public function getAnunciosEmpresaController(){
      if (isset($_GET['para_funcion'])) {
        $datos_id_Empresa =$_GET['para_funcion'];

        $datosApiController = array();
        $datosApiController["items"] = array();
        $respuesta = DatosApi::getAnunciosEmpresaModel($datos_id_Empresa);
         // var_dump($respuesta);
        foreach ($respuesta as $row => $item) {
          $item = array('id Public'       =>$item['id_publi'],
                        'id Empresa'      =>$item['fk_id_emp'],
                        'nomb Publi'      =>$item['nomb_publi'],
                        'nomb imag publi' =>$item['nomb_imag_publi'],
                        'ruta imag publi' =>$item['ruta_imag_publi'],
                        'precio publi'    =>$item['precio_publi'],
                        'descri publi'    =>$item['descri_publi'],
                        'cond publi'      =>$item['cond_publi'],
                        'Destacado publi' =>$item['dest_publi'],
                        'inicio publi'    =>$item['inicio_publi'],
                        'final publi'     =>$item['final_publi'] );
          array_push($datosApiController['items'], $item);
        }
        echo json_encode($datosApiController);

      }else {
        $mensaje ="No se han enviado paramentros a la funcion para la consulta";
        echo json_encode($mensaje);
      }


    }



}
 ?>
