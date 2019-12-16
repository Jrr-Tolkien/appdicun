<?php
  require_once "conexion.php";
  class Datos extends Conexion{
  #=============================================================================
  #***************************** USUARIOS **************************************
  #Registro de usuario
  #-----------------------------------------------------------------------------
  	static public function registroEmpresaModel($datosModel, $tabla){
      var_dump($datosModel);
      // echo $$datosModel;
      // #prepare() funciona para preparar una sentencia SQL para ser ejecutada
     $stmt = Conexion::conectar()->prepare( "INSERT INTO $tabla(nomb_emp, email_emp, pass_emp, num_emp, num2_emp, repre_emp, cat_emp, pais_emp, prov_emp, cant_emp, dist_emp, dirc_emp, codpos_emp, lat_emp, long_emp, stats_emp, fech_Reg_emp)
                                            VALUES (:nombre, :email, :password, :numero, :numero2, :representante, :categoria, :pais, :provincia, :canton, :distrito, :direccion, :codigo_Postal, :latitud, :longitud, :status, :fecha_registro)");
      #bindParam() nos vincula una variable de PHP a un parámetro de sustitución con un nombre o ? correspondiente de la sentencia SQL que se preparo.
      // $nombre = strtoupper($datosModel["nombre"]);
      // $pais= strtoupper($datosModel["pais"]);
      // $provincia = strtoupper($datosModel["provincia"]);
      // $canton = strtoupper($datosModel["canton"]);
      // $distrito = strtoupper($datosModel["distrito"]);
      // $canton = strtoupper($datosModel["canton"]);
      // $distrito = strtoupper($datosModel["distrito"]);
      // $status = strtoupper($datosModel["status"]);

      $stmt -> bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
      $stmt -> bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
      $stmt -> bindParam(":numero",$datosModel["numero"], PDO::PARAM_STR);
      $stmt -> bindParam(":numero2",$datosModel["numero2"], PDO::PARAM_STR);
      $stmt -> bindParam(":representante",$datosModel["representante"], PDO::PARAM_STR);
      $stmt -> bindParam(":categoria",$datosModel["categoria"], PDO::PARAM_STR);
      $stmt -> bindParam(":pais",$datosModel["pais"], PDO::PARAM_STR);
      $stmt -> bindParam(":provincia",$datosModel["provincia"], PDO::PARAM_STR);
      $stmt -> bindParam(":canton",$datosModel["canton"], PDO::PARAM_STR);
      $stmt -> bindParam(":distrito",$datosModel["distrito"], PDO::PARAM_STR);
      $stmt -> bindParam(":direccion",$datosModel["direccion"], PDO::PARAM_STR);
      $stmt -> bindParam(":codigo_Postal",$datosModel["codigo_Postal"], PDO::PARAM_STR);
      $stmt -> bindParam(":latitud",$datosModel["latitud"], PDO::PARAM_STR);
      $stmt -> bindParam(":longitud",$datosModel["longitud"], PDO::PARAM_STR);
      $stmt -> bindParam(":status",$datosModel["status"], PDO::PARAM_STR);
      $stmt -> bindParam(":fecha_registro",$datosModel["fecha_registro"], PDO::PARAM_STR);

      if($stmt -> execute()){
        return "success";
      }else{
        return "error";
      }
        $stmt -> close();

     }

    // #Ingreso de usuario
    // #-------------------------------------
    // static public function ingresoEmpresaModel($datosModel, $tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //                                           "SELECT email, password FROM $tabla WHERE email = :email");
    //   $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
    //   $stmt->execute();
    //   #fetch funciona para obtener una fila de un cojunto de resultados en la base de datos
    //   return $stmt->fetch();
    //   $stmt->close();
    // }

    #Ingreso de usuario agregar datos a la session
    #-------------------------------------
    static public function datosSessionEmpresaModel($datosModel, $tabla){
      $stmt = Conexion::conectar()->prepare(
                                              "SELECT id_emp, nomb_emp, email_emp, pass_emp, cat_emp FROM $tabla WHERE email_emp = :email");
      $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
      $stmt->execute();
      #fetch funciona para obtener una fila de un cojunto de resultados en la base de datos
      return $stmt->fetch();
      $stmt->close();
    }

    #validar usuario Existente en la BD
    #------------------------
    public static function validarEmailModel($datosModel, $tabla){
      $stmt = Conexion::conectar()->prepare(
                                              "SELECT email FROM $tabla WHERE email = :email");
      $stmt -> bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
      //$stmt -> bindParan(":usuario",$datosModel,PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt->fetch();
    }
    #Vista de USUARIOS
    #----------------------------
    // static public function vistaDatosUsuarioModel($tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //     "SELECT id_emp, nomb_emp, email_emp FROM $tabla");
    //   $stmt -> execute();
    //   #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
    //   return $stmt->fetchAll();
    //   $stmt->close();
    // }

    #EditarClientes
    #---------------------------
    static public function editarEmpresaModel($datosModel, $tabla){
      $stmt = Conexion::conectar()->prepare(
                                              "SELECT * FROM $tabla WHERE id_emp = :id");
      $stmt -> bindParam(":id",$datosModel,PDO::PARAM_INT);
      $stmt -> execute();
      return $stmt->fetch();
      $stmt->close();
    }

    #Actualizar Usuario
    #---------------------------
    static public function actualizarEmpresaModel($datosModel, $tabla){
        // var_dump($datosModel);
        $stmt = Conexion::conectar()->prepare(
          "UPDATE $tabla SET nomb_emp=:nombre, email_emp=:email, num_emp =:numero, num2_emp =:numero2, repre_emp =:representante, cat_emp =:categoria, pais_emp =:pais, prov_emp =:provincia, cant_emp =:canton, dist_emp =:distrito, dirc_emp =:direccion, codpos_emp =:codigo_Postal WHERE  id_emp =:id");

          $stmt -> bindParam(":id",$datosModel["id"], PDO::PARAM_INT);
          $stmt -> bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
          $stmt -> bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
          $stmt -> bindParam(":numero",$datosModel["numero"], PDO::PARAM_STR);
          $stmt -> bindParam(":numero2",$datosModel["numero2"], PDO::PARAM_STR);
          $stmt -> bindParam(":representante",$datosModel["representante"], PDO::PARAM_STR);
          $stmt -> bindParam(":categoria",$datosModel["categoria"], PDO::PARAM_STR);
          $stmt -> bindParam(":pais",$datosModel["pais"], PDO::PARAM_STR);
          $stmt -> bindParam(":provincia",$datosModel["provincia"], PDO::PARAM_STR);
          $stmt -> bindParam(":canton",$datosModel["canton"], PDO::PARAM_STR);
          $stmt -> bindParam(":distrito",$datosModel["distrito"], PDO::PARAM_STR);
          $stmt -> bindParam(":direccion",$datosModel["direccion"], PDO::PARAM_STR);
          $stmt -> bindParam(":codigo_Postal",$datosModel["codigo_Postal"], PDO::PARAM_STR);

        if($stmt -> execute()){
          return "success";
        }else{
          return "error";
        }
          $stmt -> close();

      }

      static public function registroPubliEmpresaModel($datos_Model, $tabla) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_publi, fk_id_emp, nomb_publi, nomb_imag_publi, ruta_imag_publi, precio_publi, descri_publi, cond_publi, dest_publi, inicio_publi, final_publi)
                                                   VALUES (NULL,:id_Empresa, :nomb_Publi, :nombre_Imag, :ruta_Imag, :prec_Publi, :descrip_Publi, :vis_Publi_Empresa, :desta_Publi_Empresa, :incio_Public, :fin_Public) ");

            $stmt->bindParam(":id_Empresa",$datos_Model["id_Empresa"],PDO::PARAM_INT);
            $stmt->bindParam(":nomb_Publi",$datos_Model["nomb_Publi"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre_Imag",$datos_Model["nombre_Imag"],PDO::PARAM_STR);
            $stmt->bindParam(":ruta_Imag",$datos_Model["ruta_Imag"],PDO::PARAM_STR);
            $stmt->bindParam(":prec_Publi",$datos_Model["prec_Publi"],PDO::PARAM_STR);
            $stmt->bindParam(":descrip_Publi",$datos_Model["descrip_Publi"],PDO::PARAM_STR);
            $stmt->bindParam(":vis_Publi_Empresa",$datos_Model["vis_Publi_Empresa"],PDO::PARAM_STR);
            $stmt->bindParam(":desta_Publi_Empresa",$datos_Model["desta_Publi_Empresa"],PDO::PARAM_STR);
            $stmt->bindParam(":incio_Public",$datos_Model["incio_Public"],PDO::PARAM_STR);
            $stmt->bindParam(":fin_Public",$datos_Model["fin_Public"],PDO::PARAM_STR);

              // var_dump($datos_Model);
            if ($stmt -> execute()) {
                return "success";
            } else {
                return "error al guardar los datos en la Base de datos";
            }

            // $stmt->close();
        }

        static public function vistaPublicacionesEmpresaModel(){
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
              WHERE publicidad.fk_id_emp = $_SESSION[id_Emp]");

          $stmt -> execute();
          #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
          return $stmt->fetchAll();
          $stmt->close();
        }

        #Editar Publicaciones de Empresas
        #---------------------------
        static public function editarPublicacionesEmpresaModel($datosModel, $tabla){
          $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla WHERE id=:id_publi");
          $stmt -> bindParam(":id_publi",$datosModel,PDO::PARAM_INT);
          $stmt -> execute();
          return $stmt->fetch();
          $stmt->close();
        }

  #=============================================================================
  #***************************** CLIENTES **************************************
  #Registro de Clientes
  #-----------------------------------------------------------------------------
    // static public function registroClientesModel($datosModel, $tabla){
      #var_dump($datosModel);
      #echo $tabla;
   #prepare() nos permite preparar una sentencia sql, para ser ejecutada por el metodo PDO
   // $stmt = Conexion::conectar()->prepare(
   //   "INSERT INTO $tabla (DNI, TYPEDNI, FULLNAMECUSTOMER, FANTASYNAME, PHONE, EMAIL, PROVINCE, CANTON, DISTRIC, STREET, ADDRESS)
   //              VALUES (:DNI, :TYPEDNI, :FULLNAMECUSTOMER, :FANTASYNAME, :PHONE, :EMAIL, :PROVINCE, :CANTON, :DISTRIC, :STREET, :ADDRESS)");
   // $stmt -> bindParam(":DNI", $datosModel["DNI"], PDO::PARAM_STR);
   // $stmt -> bindParam(":TYPEDNI", $datosModel["TYPEDNI"], PDO::PARAM_STR);
   // $stmt -> bindParam(":FULLNAMECUSTOMER", $datosModel["FULLNAMECUSTOMER"], PDO::PARAM_STR);
   // $stmt -> bindParam(":FANTASYNAME", $datosModel["FANTASYNAME"], PDO::PARAM_STR);
   // $stmt -> bindParam(":PHONE", $datosModel["PHONE"], PDO::PARAM_STR);
   // $stmt -> bindParam(":EMAIL", $datosModel["EMAIL"], PDO::PARAM_STR);
   // $stmt -> bindParam(":PROVINCE", $datosModel["PROVINCE"], PDO::PARAM_STR);
   // $stmt -> bindParam(":CANTON", $datosModel["CANTON"], PDO::PARAM_STR);
   // $stmt -> bindParam(":DISTRIC", $datosModel["DISTRIC"], PDO::PARAM_STR);
   // $stmt -> bindParam(":STREET", $datosModel["STREET"], PDO::PARAM_STR);
   // $stmt -> bindParam(":ADDRESS", $datosModel["ADDRESS"], PDO::PARAM_STR);
   // if($stmt -> execute()){
   //   return "success";
   // }else{
   //   return "error";
   // }
   // $stmt -> close();
   //  }

    #Vista de Clientes
    #----------------------------
    // static public function vistaClientesModel($tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //     "SELECT id, DNI, TYPEDNI, FULLNAMECUSTOMER, FANTASYNAME, PHONE, EMAIL, PROVINCE, CANTON, DISTRIC, STREET, ADDRESS FROM $tabla");
    //   $stmt -> execute();
    //   #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
    //   return $stmt->fetchAll();
    //   $stmt->close();
    // }

    #Borrar Clientes
    #---------------------------
    // static public function borrarClienteModel($datosModel, $tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //     "DELETE FROM $tabla WHERE id = :id");
    //   $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
    //   if($stmt->execute()){
    //     return "success";
    //   }else{
    //     return "error";
    //   }
    //   $stmt->close();
    // }

    #EditarClientes
    #---------------------------
    // static public function editarClienteModel($datosModel, $tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //     "SELECT * FROM $tabla WHERE id=:id");
    //   $stmt -> bindParam(":id",$datosModel,PDO::PARAM_INT);
    //   $stmt -> execute();
    //   return $stmt->fetch();
    //   $stmt->close();
    // }

    #Actualizar Usuario
    #---------------------------
    // static public function actualizarClienteModel($datosModel, $tabla){
    //     //var_dump($datosModel);
    //     $stmt = Conexion::conectar()->prepare(
    //       "UPDATE $tabla SET `DNI`=:DNI,`TYPEDNI`=:TYPEDNI,`FULLNAMECUSTOMER`=:FULLNAMECUSTOMER,`FANTASYNAME`=:FANTASYNAME,`PHONE`=:PHONE,`EMAIL`=:EMAIL,`PROVINCE`=:PROVINCE,`CANTON`=:CANTON,`DISTRIC`=:DISTRIC,`STREET`=:STREET,`ADDRESS`=:ADDRESS WHERE `id`=:id");
    //       //"UPDATE $tabla SET DNI =:DNI, TYPEDNI =:TYPEDNI, FULLNAMECUSTOMER = :FULLNAMECUSTOMER, FANTASYNAME = :FANTASYNAME, PHONE = :PHONE, EMAIL =:EMAIL, PROVINCE =:PROVINCE, CANTON =:CANTON, DISTRIC =:DISTRIC, STREET=:STREET, ADDRESS = :ADDRESS WHERE id = :id");
    //     $stmt -> bindParam(":id",$datosModel["id"], PDO::PARAM_INT);
    //     $stmt -> bindParam(":DNI",$datosModel["DNI"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":TYPEDNI",$datosModel["TYPEDNI"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":FULLNAMECUSTOMER",$datosModel["FULLNAMECUSTOMER"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":FANTASYNAME",$datosModel["FANTASYNAME"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":PHONE",$datosModel["PHONE"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":EMAIL",$datosModel["EMAIL"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":PROVINCE",$datosModel["PROVINCE"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":CANTON",$datosModel["CANTON"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":DISTRIC",$datosModel["DISTRIC"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":STREET",$datosModel["STREET"], PDO::PARAM_STR);
    //     $stmt -> bindParam(":ADDRESS",$datosModel["ADDRESS"], PDO::PARAM_STR);
    //     if($stmt -> execute()){
    //       return "success";
    //     }else{
    //       return "error";
    //     }
    //       $stmt -> close();
    //
    //   }

    #validar usuario Existente
    #------------------------===
    // public static function validarClienteModel($datosModel, $tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //                                         "SELECT usuario FROM $tabla WHERE usuario = :usuario");
    //   $stmt -> bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
    //   //$stmt -> bindParan(":usuario",$datosModel,PDO::PARAM_STR);
    //   $stmt -> execute();
    //
    //   return $stmt->fetch();
    // }

    #=============================================================================
    #***************************** PRODUCTOS **************************************
    #Registro de Productos
    #-----------------------------------------------------------------------------
     //  static public function registroProductosModel($datosModel, $tabla){
     //    #var_dump($datosModel);
     //    #echo $tabla;
     // #prepare() nos permite preparar una sentencia sql, para ser ejecutada por el metodo PDO
     // $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, Codigo, Nombre, Descripcion)");
     // $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
     // $stmt -> bindParam(":Codigo", $datosModel["Codigo"], PDO::PARAM_STR);
     // $stmt -> bindParam(":Nombre", $datosModel["Nombre"], PDO::PARAM_STR);
     // $stmt -> bindParam(":Descripcion", $datosModel["Descripcion"], PDO::PARAM_STR);
     //
     // if($stmt -> execute()){
     //   return "success";
     // }else{
     //   return "error";
     // }
     // $stmt -> close();
     //  }
     //
     //  static public function vistaProductosModel3(){
     //    $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
     //    $stmt -> execute();
     //    #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
     //    return $stmt->fetchAll();
     //    $stmt->close();
     //  }




      // #Vista de Productos
      // #----------------------------
      // static public function vistaProductosModel($tabla){
      //   $stmt = Conexion::conectar()->prepare(
      //                                           "SELECT id, Codigo, Nombre, Descripcion  FROM $tabla");
      //   $stmt -> execute();
      //   #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
      //   return $stmt->fetchAll();
      //   $stmt->close();
      // }

      #Borrar Productos
      #---------------------------
      // static public function borrarProductoModel($datosModel, $tabla){
      //   $stmt = Conexion::conectar()->prepare(
      //                                           "DELETE FROM $tabla WHERE id = :id");
      //   $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
      //   if($stmt->execute()){
      //     return "success";
      //   }else{
      //     return "error";
      //   }
      //   $stmt->close();
      // }

      #Editar Productos
      #---------------------------
      // static public function editarproductoModel($datosModel, $tabla){
      //   $stmt = Conexion::conectar()->prepare(
      //                                         "SELECT id, Codigo, Nombre, Descripcion  FROM $tabla WHERE id=:id");
      //   $stmt -> bindParam(":id",$datosModel,PDO::PARAM_INT);
      //   $stmt -> execute();
      //   return $stmt->fetch();
      //   $stmt->close();
      // }


    #Actualizar Usuario
    #---------------------------
    // static public function actualizarUsuarioModel($datosModel, $tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //     "UPDATE $tabla SET Codigo=:Codigo, Nombre=:Nombre, Descripcion=:Descripcion WHERE id=:id");
    //
    //   $stmt -> bindParam(":id",$datosModel["id"], PDO::PARAM_INT);
    //   $stmt -> bindParam(":Codigo",$datosModel["Codigo"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":Nombre",$datosModel["Nombre"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":Descripcion",$datosModel["Descripcion"], PDO::PARAM_STR);
    //   if($stmt -> execute()){
    //     return "success";
    //   }else{
    //     return "error";
    //   }
    //     $stmt -> close();
    // }

    #=============================================================================
    #***************************** MAIL **************************************
    #ENVIAR CORREOS
    #-----------------------------------------------------------------------------





// intval()
    #Vista de Archivos upload
    // #----------------------------
    // static public function vistaArchivosModel(){
    //   $stmt = Conexion::conectar()->prepare(
    //     " SELECT
    //           archivos.id,
    //           archivos.nombre,
    //           archivos.ruta,
    //           archivos.id_usuario,
    //           usuarios.usuario
    //       FROM
    //             archivos
    //       INNER JOIN (
    //         SELECT usuarios.id, usuarios.usuario
    //           FROM usuarios
    //         ) usuarios
    //       ON archivos.id_usuario = usuarios.id
    //       WHERE archivos.id_usuario = $_SESSION[id_Emp] ");
    //   $stmt -> execute();
    //   #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
    //   return $stmt->fetchAll();
    //   $stmt->close();
    //
    // }


    #Vista de Clientes factura
    #----------------------------
    // static public function selecClientesModel($tabla){
    //   $stmt = Conexion::conectar()->prepare(
    //     "SELECT id, DNI, FULLNAMECUSTOMER, PHONE, EMAIL FROM $tabla");
    //   $stmt -> execute();
    //   #fetchAll se usa para obtener todas las filas de un conjunto de resultados de la base de datos.
    //   return $stmt->fetchAll();
    //   $stmt->close();
    // }


  }
 ?>
