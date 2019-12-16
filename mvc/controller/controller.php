<?php
date_default_timezone_set('America/Costa_Rica');

class MvcController{
  #LLAMADA A LA PLANTILLA
  #-------------------------------------
  public function page(){
    //include "mvc/controller/pdf-controller.php";
    //include "mvc/views/modules/intro.php";
    include "mvc/views/modules/api-appdicun.php";
  include "mvc/views/template.php";
  }
  #ENLACES
  #-------------------------------------
  public function enlacesPaginasController(){
      //echo $_GET["action"];
    if(isset($_GET["action"])){
      $enlacesController = $_GET["action"];
    }else{
      $enlacesController = "intro";
    }
    $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
    include $respuesta;
  }

#=============================================================================
#***************************** Empresas **************************************
#Registro de Usuarios
#----------------------------------------------------------------------------
# Login
#-----------------------------------------------------------------------------
static public function registroEmpresaController(){
// var_dump($_POST);
    if( isset($_POST["Nombre_Empresa"]) && isset($_POST["Email_Empresa"]) && isset($_POST["Numero_Empresa"]) && isset($_POST["Numero2_Empresa"]) && isset($_POST["Representante_Empresa"])
         && isset($_POST["Pais_Empresa"]) && isset($_POST["Provincia_Empresa"]) && isset($_POST["Canton_Empresa"]) && isset($_POST["Distrito_Empresa"]) && isset($_POST["Direccion_Empresa"]) && isset($_POST["Codigo_Postal_Empresa"]) ){
      $temporalPassword = "Qw12as34zx";
      $statusEmpresa = "ok";
      $categoria =  "Gratuita";
      $fechaRegistro = (date ("Y-m-d"));
      if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["Nombre_Empresa"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,10}$/',$_POST["Email_Empresa"]) ){
        $passwordEncriptada = crypt($temporalPassword,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $datosController = array( "nombre"         => $_POST["Nombre_Empresa"],
                                  "email"          => $_POST["Email_Empresa"],
                                  "password"       => $passwordEncriptada,
                                  "numero"         => $_POST["Numero_Empresa"],
                                  "numero2"        => $_POST["Numero2_Empresa"],
                                  "representante"  => $_POST["Representante_Empresa"],
                                  "categoria"      => $categoria,
                                  "pais"           => $_POST["Pais_Empresa"],
                                  "provincia"      => $_POST["Provincia_Empresa"],
                                  "canton"         => $_POST["Canton_Empresa"],
                                  "distrito"       => $_POST["Distrito_Empresa"],
                                  "direccion"      => $_POST["Direccion_Empresa"],
                                  "codigo_Postal"  => $_POST["Codigo_Postal_Empresa"],
                                  "latitud"        => $_POST["Latitud_Empresa"],
                                  "longitud"       => $_POST["Longitud_Empresa"],
                                  "status"         => $statusEmpresa,
                                  "fecha_registro" => $fechaRegistro );
         // var_dump($datosController);
          $respuesta = Datos::registroEmpresaModel($datosController, "empresa");
         //var_dump($respuesta);
        if($respuesta == "success"){
          header("location:registro-empresa-ok");
        }else{
          $resultado = "USUARIO ya fue registrado!";
          echo '
          <div class="col-md-12">
            <div class="card-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-ban"></i> ¡Error al Registrarse!! </h5>
              '.$resultado.'
              </div>
            </div>
          </div>';
        }

      }else {
        $resultado = "Se produjo un problema, los caracteres o la información ingresada no cumple con los paramentros establecidos";
          echo '
          <div class="col-md-8">
            <div class="card-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-ban"></i> ¡Problemas con los campos de registro!! </h5>
              '.$resultado.'
              </div>
            </div>
          </div>';
       }
    }
 }

  #Ingreso de Empresa Controller
  # Login
  #-----------------------------------------------------------------------------
  static public function ingresoEmpresaController(){
    #echo "si funciona";
    if( isset($_POST["Email_Empresa"]) && isset($_POST["Password_Empresa"])){
        $passwordEncriptada = crypt($_POST["Password_Empresa"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $datosController = array(
                                  "email"     => $_POST["Email_Empresa"],
                                  "passsword" => $passwordEncriptada );
        $respuesta = Datos::datosSessionEmpresaModel($datosController, "empresa");
        // var_dump($datosController);
        //echo $respuesta["password"];

        if($respuesta["email_emp"] == $_POST["Email_Empresa"] && $respuesta["pass_emp"] == $passwordEncriptada ){
          session_start();

            $_SESSION["id_Emp"]         =$respuesta["id_emp"];
            $_SESSION["Empresa"]        =$respuesta["nomb_emp"];
            $_SESSION["email_Emp"]      =$respuesta["email_emp"];
            $_SESSION["password_Epm"]   =$respuesta["pass_emp"];
            $_SESSION["categorira_Epm"] =$respuesta["cat_emp"];

          header("location:panel");
      }else{
        header("location:ingreso-empresa-error");
      }
    }
  }
     #Validar Usuario Existente en el Ajax
     #---------------------------
     public static function validarEmailController($validarEmail){
       $datosController = $validarEmail;
       $respuesta = Datos::validarEmailModel($datosController, "usuarios");
       if($respuesta["email"] != "" && $respuesta["email"] != null){
         echo 0;
       }else{
         echo 1;
       }
     }
     #vista de Usuarios
     # Plantilla de vista
     #--------------------------------------------------------------------------------------
     // static public function vistaDatosUsuarioController(){
     //   $respuesta = Datos::vistaDatosUsuarioModel("empresa");
     // #constructor foreach - proporciona un modo sencillo para recorrer un array, solo funciona sobre arrays.
     //   foreach ($respuesta as $row => $item) {
     // 	   echo"
     //   	<tr>
     //   	  <td>".$item["id_emp"]."</td>
     //       <td>".$item["nomb_emp"]."</td>
     //   	  <td>".$item["email_emp"]."</td>
     //       <td>
     //         <a href='updateusuario&id=".$item["id_emp"]."'>
     //          <button type='button' class='btn btn-block btn-info'>Editar</button>
     //         </a>
     //       </td>
     //       <td><a href='Usuario&idBorrar=".$item["id_emp"]."'>
     //          <button type='button' class='btn btn-block btn-danger'>Borrar</button>
     //          </a>
     //        </td>
     //   	</tr>
     //   	";
     // 	 }
     //  }

      #Vista a editar datos de la Empresa
      #-------------------------------------------------------------------
      static public function editarEmpresaController(){
        if(isset($_SESSION["id_Emp"])){
      	   $datosController = $_SESSION["id_Emp"];
           $respuesta = Datos::editarEmpresaModel($datosController, "empresa");
          // var_dump($respuesta);
      	   echo'
           <div class="container">
             <div class="col-sm-6">
               <span class="login100-form-title p-t-10 p-b-20">
                 Datos de la Empresa
               </span>
          	    <input type="hidden" id="id_Empresa" name="Id_Empresa" required value="'.$_SESSION["id_Emp"].'">
                <div class="form-group">
                  <label>Nombre de la Empresa</label>
                  <input type="text" class="form-control" id="nombre_Empresa" name="Nombre_Empresa" placeholder="Digitar" required value="'.$respuesta["nomb_emp"].'">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email_Emp" name="Email_Empresa" placeholder="Insertar" readonly="readonly" required value="'.$respuesta["email_emp"].'">
                </div>
                <div class="form-group">
                  <label>Número de Teléfono</label>
                  <input class="form-control" id="num_EmpRegistro" name="Numero_Empresa" required value="'.$respuesta["num_emp"].'">
                </div>
                <div class="form-group">
                  <label>Segundo Número de Teléfono</label>
                  <input type="text" class="form-control" id="num2_EmpRegistro" name="Numero2_Empresa" required value="'.$respuesta["num_emp"].'">
                </div>
                <div class="form-group">
                  <label>Representante de la Empresa</label>
                  <input type="text" class="form-control" id="repre_EmpRegistro" name="Representante_Empresa" placeholder="Insertar"required value="'.$respuesta["repre_emp"].'">
                </div>
                <div class="form-group">
                  <label>Plan Públicitario</label>
                  <input type="text" class="form-control" id="categoria_Empresa CUSTOMER" name="Categoria_Empresa" placeholder="Insetar" readonly="readonly" required value="'.$respuesta["cat_emp"].'">
                </div>
              </div>

              <div class="col-sm-6">
                <span class="login100-form-title p-t-10 p-b-20">
                  Ubicación de la Empresa
                </span>
                <div class="form-group">
                  <label>País</label>
                  <input type="text" class="form-control" id="pais_EmpRegistro" name="Pais_Empresa" placeholder="Digitar" required value="'.$respuesta["pais_emp"].'">
                </div>
                <div class="form-group">
                  <label>Provincia</label>
                  <input type="text" class="form-control" id="prov_EmpRegistro" name="Provincia_Empresa" required value="'.$respuesta["prov_emp"].'">
                </div>
                <div class="form-group">
                  <label>Canton</label>
                  <input type="text" class="form-control" id="cant_EmpRegistro" name="Canton_Empresa" required value="'.$respuesta["cant_emp"].'">
                </div>
                <div class="form-group">
                  <label>Distrito</label>
                  <input type="text" class="form-control" id="dist_EmpRegistro" name="Distrito_Empresa" required value="'.$respuesta["dist_emp"].'">
                </div>
                <div class="form-group">
                  <label>Dirección Exacta</label>
                  <input type="text" class="form-control" id="dirc_EmpRegistro" name="Direccion_Empresa" required value="'.$respuesta["dirc_emp"].'">
                </div>
                <div class="form-group">
                  <label>Codigo Zip</label>
                  <input type="text" class="form-control" id="codPos_EmpRegistro" name="Codigo_Postal_Empresa" placeholder="Insertar" required value="'.$respuesta["codpos_emp"].'">
                </div>
                </div>
                <div class="card-footer">
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>

                  <div class="col-sm-4">
                  </div>

                  <div class="col-sm-4">
                    <a href="panel" class="btn btn-danger my-2">Cancelar y Volver</a>
                  </div>
                </div>
              </div>

          ';
        }
      }

      #actualizar Datos de la Empresa
      #-------------------------------------------------------------------------------
      static public function actualizarEmpresaController(){
      	if(isset($_POST["Id_Empresa"]) && isset($_POST["Nombre_Empresa"]) && isset($_POST["Email_Empresa"]) && isset($_POST["Numero_Empresa"]) && isset($_POST["Numero2_Empresa"]) && isset($_POST["Representante_Empresa"]) && isset($_POST["Categoria_Empresa"])
         && isset($_POST["Pais_Empresa"]) && isset($_POST["Provincia_Empresa"]) && isset($_POST["Canton_Empresa"]) && isset($_POST["Distrito_Empresa"]) && isset($_POST["Direccion_Empresa"]) && isset($_POST["Codigo_Postal_Empresa"]) ){
           // var_dump($_POST);
          $_datosController = array(  "id"            => $_POST["Id_Empresa"],
                                      "nombre"        => $_POST["Nombre_Empresa"],
                                      "email"         => $_POST["Email_Empresa"],
                                      "numero"        => $_POST["Numero_Empresa"],
                                      "numero2"       => $_POST["Numero2_Empresa"],
                                      "representante" => $_POST["Representante_Empresa"],
                                      "categoria"     => $_POST["Categoria_Empresa"],
                                      "pais"          => $_POST["Pais_Empresa"],
                                      "provincia"     => $_POST["Provincia_Empresa"],
                                      "canton"        => $_POST["Canton_Empresa"],
                                      "distrito"      => $_POST["Distrito_Empresa"],
                                      "direccion"     => $_POST["Direccion_Empresa"],
                                      "codigo_Postal" => $_POST["Codigo_Postal_Empresa"],
                                      );
      		$respuesta = Datos::actualizarEmpresaModel($_datosController, "empresa");
           // var_dump($respuesta);
          if($respuesta == "success"){
            header("location:Datos-Empresa-ok");
          }else{
            $resultado = "No deben haber espacios vacíos e ingresar valores con formato correcta . Error:" ;
            echo '       <br>
                           <div class="col-md-12">
                           <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-ban"></i> ¡Error! </h5>'.$resultado.'
                           </div>
                         </div>';
          }
      	}
     }

     #=============================================================================
     #***************************** Publicaciones **************************************
     # Publicidad archivos upload Empresa
     #--------------------------------------------------------
      static public function registroPubliEmpresaController($nombre_image, $ruta, $nombrePublic, $precio, $descripcion ) {
        $anuncioVisible = true;
        $inicio_Public = (date ("Y-m-d H:i:s"));
        $fin_Public = 0000-00-00;
        if (isset($_SESSION["categorira_Epm"]) == "Gratuito" ) {
          // $anuciodestacado = false;
          $anuciodestacado = 0;
        }else {
          // $anuciodestacado = true;
          $anuciodestacado = 1;
        }
         $datosController = ["id_Empresa"          => $_SESSION["id_Emp"],
                             "nomb_Publi"          => $nombrePublic,
                             "nombre_Imag"         => $nombre_image,
                             "ruta_Imag"           => $ruta,
                             "prec_Publi"          => $precio,
                             "descrip_Publi"       => $descripcion,
                             "vis_Publi_Empresa"   => $anuncioVisible,
                             "desta_Publi_Empresa" => $anuciodestacado,
                             "incio_Public"        => $inicio_Public,
                             "fin_Public"          => $fin_Public ];

        // var_dump($datosUploadPubliEmpresa);
         $respuesta = Datos::registroPubliEmpresaModel($datosController, "publicidad");
           if ($respuesta == "success") {
             header("location:../anuncio-ok");
           } else {
             header("location:../anuncio-error");
           }
       }
       #***************************** Publicaciones **************************************
       #  Vista publicaciones upload
       #--------------------------------------------------------

         static public function vistaPublicacionesEmpresaController(){
           $respuesta = Datos::vistaPublicacionesEmpresaModel();
           // var_dump($respuesta);
         #constructor foreach - proporciona un modo sencillo para recorrer un array, solo funciona sobre arrays.
           foreach ($respuesta as $row => $item) {
             echo"
            <div class='col-md-4'>
              <div class='card mb-4 shadow-sm'>
                <p class='card-text'><h1> <small> ".$item["nomb_publi"]." </small></h1></p>
                <img class='card-img-top' data-src='holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail' alt='Thumbnail [100%x225]' style='height: 225px; width: 100%; display: block;'
                src= ".$item["ruta_imag_publi"]." data-holder-rendered='true'  style='height: 225px; width: 100%; display: block;'>
                <div class='card-body'>
                  <p class='card-text'>".$item["descri_publi"]."</p>
                  <p class='card-text'>¢ ".$item["precio_publi"]."</p>
                  <div class='d-flex justify-content-between align-items-center'>
                    <div class='btn-group' href='producto2&id=".$item["id_publi"]."' >
                      <button type='button' class='btn btn-success' data-toggle='modal' data-target='#modalEditarPublicaciones' >Editar</button>
                    </div>
                    <small class='text-muted'> Publicado ".$item["inicio_publi"].",</small>
                    <small class='text-muted'> Vence ".$item["final_publi"]."</small>
                  </div>
                </div>
              </div>
            </div>  ";
           }
          }

          #Editar Publicaciones de Empresas
          #-------------------------------------------------------------------
          static public function editarPublicacionesEmpresaController(){
            if(isset($_POST["id_publi"])){
          	   $datosController = $_POST["id_publi"];
          	   $respuesta = Datos::editarPublicacionesEmpresaModel($datosController, "publicidad");
            }
          }

      #Borrar Usuarios
      #-------------------------------------------
      static public function borrarUsuariosController(){
        if(isset($_GET["idBorrar"])){
          $datosController = $_GET["idBorrar"];
          $respuesta = Datos::borrarClienteModel($datosController, "usuarios");
          if($respuesta == "success"){
            header("location:Usuario-eliminado-ok");
            echo "<script type=\"text/javascript\">alert(\"Usuario Eliminado Corectamente.\");</script>";
          }else{
          	header("location:Usuario-eliminado-error");
          echo "<script type=\"text/javascript\">alert(\"Se produjo un error al eliminar el Usuario.\");</script>";
          }
        }
      }

  #=============================================================================
  #***************************** CLIENTES **************************************
  #Registro de Clientes
  #-----------------------------------------------------------------------------
  // static public function registroClientesController(){
    #var_dump($_POST);
  //   if(isset($_POST["DNI"]) && isset($_POST["FULLNAMECUSTOMER"]) && isset($_POST["FANTASYNAME"]) && isset($_POST["PHONE"])
  // && isset($_POST["EMAIL"]) && isset($_POST["ADDRESS"]) ){
  //       $datosController = array( "DNI" => $_POST["DNI"],
  //                                 "TYPEDNI" => $_POST["TYPEDNI"],
  //                                 "FULLNAMECUSTOMER" => $_POST["FULLNAMECUSTOMER"],
  //                                 "FANTASYNAME" => $_POST["FANTASYNAME"],
  //                                 "PHONE" => $_POST["PHONE"],
  //                                 "EMAIL" => $_POST["EMAIL"],
  //                                 "PROVINCE" => $_POST["PROVINCE"],
  //                                 "CANTON" => $_POST["CANTON"],
  //                                 "DISTRIC" => $_POST["DISTRIC"],
  //                                 "STREET" => $_POST["STREET"],
  //                                 "ADDRESS" => $_POST["ADDRESS"]);
  //       var_dump($datosController);
  //       $respuesta = Datos::registroClientesModel($datosController, "clientes");
  //       //echo $respuesta;
  //       if($respuesta == "success"){
  //        header("location:registro-Cliente-ok");
  //       }else{
  //         header("location:registro-Cliente-error");
  //       }
  //   }
  // }

#vista de Clientes
#--------------------------------------------------------------------------------------
// static public function vistaClientesController(){
//   $respuesta = Datos::vistaClientesModel("clientes");
#constructor foreach - proporciona un modo sencillo para recorrer un array, solo funciona sobre arrays.
 //  foreach ($respuesta as $row => $item) {
	//    echo"
 //  	<tr>
 //  	  <td>".$item["id"]."</td>
 //      <td>".$item["DNI"]."</td>
 //  	  <td>".$item["TYPEDNI"]."</td>
 //  	  <td>".$item["FULLNAMECUSTOMER"]."</td>
 //      <td>".$item["FANTASYNAME"]."</td>
 //      <td>".$item["PHONE"]."</td>
 //      <td>".$item["EMAIL"]."</td>
 //      <td>".$item["PROVINCE"]."</td>
 //      <td>".$item["CANTON"]."</td>
 //      <td>".$item["DISTRIC"]."</td>
 //      <td>".$item["STREET"]."</td>
 //      <td>".$item["ADDRESS"]."</td>
 //      <td><a href='updateclientes&id=".$item["id"]."'>
 //        <button type='button' class='btn btn-block btn-info'>Editar</button>
 //        </a>
 //        </td>
 //      <td><a href='clientes&idBorrar=".$item["id"]."'>
 //        <button type='button' class='btn btn-block btn-danger'>Borrar</button></a></td>
 //  	</tr>
 //  	";
	//  }
 // }

#Borrar Clientes
#-------------------------------------------
// static public function borrarClienteController(){
//   if(isset($_GET["idBorrar"])){
//     $datosController = $_GET["idBorrar"];
//     $respuesta = Datos::borrarClienteModel($datosController, "clientes");
//     if($respuesta == "success"){
//       header("location:cliente-eliminado-ok");
//       echo "<script type=\"text/javascript\">alert(\"Cliente Eliminado Corectamente.\");</script>";
//     }else{
//     	header("location:cliente-eliminado-error");
//     echo "<script type=\"text/javascript\">alert(\"Se produjo un error al eliminar el CLiente.\");</script>";
//     }
//   }
// }
#Editar Clientes
#-------------------------------------------------------------------
// static public function editarClienteController(){
//   if(isset($_GET["id"])){
// 	   $datosController = $_GET["id"];
// 	   $respuesta = Datos::editarClienteModel($datosController, "clientes");
// 	   echo'
//   	    <input type="hidden" id="id" name="id" required value="'.$_GET["id"].'">
//         <div class="form-group">
//           <label>Identificacion</label>
//           <input type="text" class="form-control" id="DNI CUSTOMER" name="DNI" placeholder="Digitar" required value="'.$respuesta["DNI"].'">
//         </div>
//         <div class="form-group">
//           <label>Tipo de Identificacion</label>
//           <select class="form-control" id="TYPEDNICUSTOMER" name="TYPEDNI" required value="'.$respuesta["TYPEDNI"].'">
//             <option>Seleccionar</option>
//             <option>Fisica</option>
//             <option>Juridica</option>
//           </select>
//         </div>
//         <div class="form-group">
//           <label>Nombre Completo</label>
//           <input type="text" class="form-control" id="FULLNAME CUSTOMER" name="FULLNAMECUSTOMER" placeholder="Insertar"required value="'.$respuesta["FULLNAMECUSTOMER"].'">
//         </div>
//         <div class="form-group">
//           <label>Nombre Fantasia</label>
//           <input type="text" class="form-control" id="FANTASYNAME CUSTOMER" name="FANTASYNAME" placeholder="Insetar" required value="'.$respuesta["FANTASYNAME"].'">
//         </div>
//         <div class="form-group">
//           <label>Telefono</label>
//           <input type="text" class="form-control" id="PHONE CUSTOMER" name="PHONE" placeholder="Digitar" required value="'.$respuesta["PHONE"].'">
//         </div>
//         <div class="form-group">
//           <label>Email</label>
//           <input type="email" class="form-control" id="EMAIL CUSTOMER" name="EMAIL" placeholder="Insertar" required value="'.$respuesta["EMAIL"].'">
//         </div>
//         <div class="form-group">
//           <label>Provincia</label>
//           <select class="form-control" id="PROVINCECUSTOMER" name="PROVINCE" required value="'.$respuesta["PROVINCE"].'">
//             <option>San Jose </option>
//             <option>Puntarenas</option>
//           </select>
//         </div>
//         <div class="form-group">
//           <label>Provincia</label>
//           <select class="form-control" id="CANTONCUSTOMER" name="CANTON" required value="'.$respuesta["CANTON"].'">
//             <option>Perez Zeledon</option>
//             <option>Osa</option>
//           </select>
//         </div>
//         <div class="form-group">
//           <label>Provincia</label>
//           <select class="form-control" id="DISTRICCUSTOMER" name="DISTRIC" required value="'.$respuesta["DISTRIC"].'">
//             <option>Platanares</option>
//             <option>Palmar</option>
//           </select>
//         </div>
//         <div class="form-group">
//           <label>Provincia</label>
//           <select class="form-control" id="STREETCUSTOMER" name="STREET" required value="'.$respuesta["STREET"].'">
//             <option>San Rafael</option>
//             <option>Sierpe</option>
//           </select>
//         </div>
//         <div class="form-group">
//           <label for="exampleInputPassword1">Otras señas</label>
//           <input type="text" class="form-control" id="ADDRESS CUSTOMER" name="ADDRESS" placeholder="Insertar" required value="'.$respuesta["ADDRESS"].'">
//         </div>
//         <div class="card-footer">
//           <button type="submit" class="btn btn-primary">Guardar</button>
//         </div>';
//   }
// }

#actualizar Producto
#-------------------------------------------------------------------------------
// static public function actualizarClienteController(){
// 	if(isset($_POST["id"]) && isset($_POST["DNI"]) && isset($_POST["TYPEDNI"]) && isset($_POST["FULLNAMECUSTOMER"]) && isset($_POST["FANTASYNAME"]) && isset($_POST["PHONE"]) && isset($_POST["EMAIL"])
//    && isset($_POST["PROVINCE"]) && isset($_POST["CANTON"]) && isset($_POST["DISTRIC"]) && isset($_POST["STREET"]) && isset($_POST["ADDRESS"])){
// 		$_datosController = array(
//                               "id"               => $_POST["id"],
//                               "DNI"              => $_POST["DNI"],
//                               "TYPEDNI"          => $_POST["TYPEDNI"],
//                               "FULLNAMECUSTOMER" => $_POST["FULLNAMECUSTOMER"],
//                               "FANTASYNAME"      => $_POST["FANTASYNAME"],
//                               "PHONE"            => $_POST["PHONE"],
//                               "EMAIL"            => $_POST["EMAIL"],
//                               "PROVINCE"         => $_POST["PROVINCE"],
//                               "CANTON"           => $_POST["CANTON"],
//                               "DISTRIC"          => $_POST["DISTRIC"],
//                               "STREET"           => $_POST["STREET"],
//                               "ADDRESS"          => $_POST["ADDRESS"]);
// 		$respuesta = Datos::actualizarClienteModel($_datosController, "clientes");
//     if($respuesta == "success"){
//       header("location:cliente-actualizado-ok");
//     }else{
//       header("location:cliente-actualizado-error");
//     }
// 	}
//  }


#Validar Cliente Existente en el Ajax
#---------------------------
// public static function validarClienteController($validarCliente){
//   $datosController = $validarCliente;
//   $respuesta = Datos::validarClienteModel($datosController, "clientes");
//   if($respuesta["usuario"] != "" && $respuesta["usuario"] != null){
//     echo 0;
//   }else{
//     echo 1;
//   }
// }

#=============================================================================
#***************************** PRODUCTOS **************************************
#Registro de Productos
#-----------------------------------------------------------------------------
// static public function registroProductosController(){
  #var_dump($_POST);
  // if(isset($_POST["Codigo"]) && isset($_POST["Nombre"]) && isset($_POST["Descripcion"]) ){
  //     $datosController = array("Codigo" => $_POST["Codigo"], "Nombre" => $_POST["Nombre"], "Descripcion" => $_POST["Descripcion"]);
      //var_dump($datosController);
      // $respuesta = Datos::registroProductosModel($datosController, "clientes");
      //echo $respuesta;
//       if($respuesta == "success"){
//         header("location:registro-Producto-ok");
//         echo "<script type=\"text/javascript\">alert(\"Producto Guardado Corectamente.\");</script>";
//       }else{
//         header("location:registro-Producto-error");
//         echo "<script type=\"text/javascript\">alert(\"Error al Guardar el Producto\");</script>";
//       }
//   }
// }

#vista de Productos
#--------------------------------------------------------------------------------------
// static public function vistaProductosController(){
// $respuesta = Datos::vistaProductosModel("productos");
// $respuesta = Datos::vistaProductosModel2();
#constructor foreach - proporciona un modo sencillo para recorrer un array, solo funciona sobre arrays.
// foreach ($respuesta as $row => $item) {
//    echo"
//   <tr>
//     <td>".$item["id"]."</td>
//     <td>".$item["Codigo"]."</td>
//     <td>".$item["Nombre"]."</td>
//     <td>".$item["Descripcion"]."</td>
//     <td>".$item["Cantidad"]."</td>
//     <td>".$item["Precio_Compra"]."</td>
//     <td>".$item["Precio_Venta"]."</td>
//     <td>
//       <a href='producto2&id=".$item["id"]."'>
//         <button type='button' class='btn btn-block btn-info'>Editar</button>
//       </a>
//     </td>
//     <td>
//       <a href='productos&idBorrar=".$item["id"]."'>
//         <button type='button' class='btn btn-block btn-danger'>Borrar</button>
//       </a>
//     </td>
//   </tr>
//   ";
//  }
// }

#Borrar PRODUCTO
#-------------------------------------------
// static public function borrarProductoController(){
//   if(isset($_GET["idBorrar"])){
//     $datosController = $_GET["idBorrar"];
//     $respuesta = Datos::borrarProductoModel($datosController, "productos");
//     if($respuesta == "success"){
//       header("location:producto-eliminado-ok");
//       echo "<script type=\"text/javascript\">alert(\"Cliente Eliminado Corectamente.\");</script>";
//     }else{
//     	header("location:producto-eliminado-error");
//     echo "<script type=\"text/javascript\">alert(\"Se produjo un error al eliminar el CLiente.\");</script>";
//     }
//   }
// }

#Editar PRODUCTO
#-------------------------------------------------------------------
/*static public function editarProductoController(){
  if(isset($_GET["id"])){
	   $datosController = $_GET["id"];
	   $respuesta = Datos::editarProductoModel($datosController, "productos");
	   echo'
  	    <input type="hidden" id="id" name="id" required value="'.$_GET["id"].'">
        <div class="form-group">
          <label>Codigo</label>
          <input type="text" class="form-control" id="Codigo CUSTOMER" name="Codigo" placeholder="Insertar"required value="'.$respuesta["Codigo"].'">
        </div>
        <div class="form-group">
          <label>Nombre</label>
          <input type="text" class="form-control" id="Nombre CUSTOMER" name="Nombre" placeholder="Insetar" required value="'.$respuesta["Nombre"].'">
        </div>
        <div class="form-group">
          <label>Descripcion</label>
          <input type="text" class="form-control" id="Descripcion CUSTOMER" name="Descripcion" placeholder="Insetar" required value="'.$respuesta["Descripcion"].'">
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>';
  }
}*/


// static public function editarProductosController(){
// if(isset($_GET["id"])){
// 	$datosController = $_GET["id"];
// 	$respuesta = Datos::editarProductosModel($datosController, "productos");
// 	echo'
// 	<input type="hidden" id="id" name="id" required value="'.$_GET["id"].'">
//
//  <div class="card-body">
//   <div class="form-group">
//     <label>Codigo de Producto</label>
//     <input type="text" class="form-control" id="codigoProducto" name="codigo" placeholder="Digitar" required value="'.$respuesta["codigo"].'">
//     </div>
//
//     <div class="form-group">
//       <label>Nombre del Producto</label>
//       <input type="text" class="form-control" id="nombreProducto" name="producto" placeholder="Digitar" required value="'.$respuesta["producto"].'">
//     </div>
//
//     <div class="form-group">
//       <label>Cantidad</label>
//       <input type="text" class="form-control" id="cantidadProducto" name="cantidad" placeholder="Digitar" required value="'.$respuesta["cantidad"].'">
//     </div>
//
//     <div class="form-group">
//       <label>Precio Compra</label>
//       <input type="text" class="form-control" id="prociocProducto" name="preciocompra" placeholder="Digitar" required value="'.$respuesta["preciocompra"].'">
//     </div>
//
//     <div class="form-group">
//       <label>Precio Venta</label>
//       <input type="text" class="form-control" id="prociovProducto" name="precioventa" placeholder="Digitar" required value="'.$respuesta["precioventa"].'">
//     </div>
//
//     <div class="form-group">
//       <label>Porcentaje</label>
//       <input type="text" class="form-control" id="PorcentajeProducto" name="porcentaje" placeholder="Digitar" required value="'.$respuesta["porcentaje"].'">
//     </div>
//
// 	<input <button type="submit" class="btn btn-primary"></button> ';
//
// }
//
// }
#actualizar Producto
#-------------------------------------------------------------------------------
// static public function actualizarProductoController(){
// 	if(isset($_POST["Codigo"]) && isset($_POST["Nombre"]) && isset($_POST["Descripcion"]) && isset($_POST["id"])){
// 		$_datosController = array(
//       "id"          => $_POST["id"],
//       "Codigo"      => $_POST["Codigo"],
//       "Nombre"      => $_POST["Nombre"],
//       "Descripcion" => $_POST["Descripcion"]);
// 		$respuesta = Datos::actualizarProductoModel($_datosController, "productos");
//     if($respuesta == "success"){
//       header("location:producto-editar-ok");
//     }else{
//       header("location:producto-editar-error");
//     }
// 	}
//  }


# Vusta archivos upload
  // static public function vistaArchivosController(){
  //   $respuesta = Datos::vistaArchivosModel();
  #constructor foreach - proporciona un modo sencillo para recorrer un array, solo funciona sobre arrays.
   //  foreach ($respuesta as $row => $item) {
   //    echo"
   //   <tr>
   //     <td>".$item["id"]."</td>
   //      <td>".$item["nombre"]."</td>
   //      <td>".$item["ruta"]."</td>
   //      <td>".$item["usuario"]."</td>
   //
   //
   //     <td>
   //       <a
   //         download=".$item['nombre']." href=".$item['ruta']." class='btn btn-primary'>Descargar
   //       </a>
   //     </td>
   //
   //      <td><a href='archivo&idBorrar=".$item["id"]."'>
   //         <button type='button' class='btn btn-block btn-danger'>Eliminar</button>
   //         </a>
   //       </td>
   //   </tr>
   //   ";
   //  }
   // }


  #=============================================================================
  #***************************** FACTURA **************************************
  #Seleccionar CLIENTES
  #-----------------------------------------------------------------------------
  // static public function selecClienteController(){
  //   $respuesta = Datos::selecClientesModel("clientes");
  // #constructor foreach - proporciona un modo sencillo para recorrer un array, solo funciona sobre arrays.
  //   foreach ($respuesta as $row => $item) {
  // 	   echo"
  //   	<tr>
  //   	  <td>".$item["id"]."</td>
  //       <td>".$item["DNI"]."</td>
  //   	  <td>".$item["FULLNAMECUSTOMER"]."</td>
  //       <td>".$item["PHONE"]."</td>
  //       <td>".$item["EMAIL"]."</td>
  //
  //       <td><a href='selecCliente&id=".$item["id"]."&nombreCliente=".$item["FULLNAMECUSTOMER"]."'>
  //         <button type='button' class='btn btn-block btn-primary'>Seleccionar</button></a>
  //         </td>
  //     	</tr>
  //   	";
  //   }
  // }


  #CARGAR CLIENTES
  #-----------------------------------------------------------------------------
  //static public function selecClienteController(){

//  }

}
 ?>
