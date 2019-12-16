<?php
require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/POP3.php';
require_once 'phpmailer/src/OAuth.php';

class EmailController{

public static function sendEmailSMTP(){
if (isset($_POST['Email_Empresa']) &&
    isset($_POST['Nombre_Empresa']) &&
    isset($_POST['Representante_Empresa'])){
      if ( !empty(isset($_POST['Email_Empresa'])) &&
           !empty(isset($_POST['Nombre_Empresa'])) &&
           !empty(isset($_POST['Representante_Empresa']))){

             $Email = $_POST['Email_Empresa'];
             $Empresa = $_POST['Nombre_Empresa'];
             $Usuario= $_POST['Representante_Empresa'];
             $Password = "Qw12as34zx";
             $Asunto = "Bienvenido a Appdicun !!";
             $Mensaje = "Su registro se efecto con exito !!

             Gracias por registrarse en AppDicun.


              Estimado ". $Usuario . " representante de
             " . $Empresa ."

             El password es: Qw12as34zx  ";
             $SMTPname = "AppDicun";
             $SMTPemail = "ranndy.salas90@gmail.com";
             $SMTPserver = "smtp.gmail.com";
             $SMTPport = "587";
             $SMTPpassword = "Rasun-90";

             $my_name = $SMTPname;
             $my_mail = $SMTPemail;
             $my_replyto = $SMTPemail;

             //
             //
             //

             $correo = new PHPMailer(true);

             $correo->SMTPDebug = 0;
             $correo->isSMTP();
             $correo->Host = $SMTPserver;
             $correo->SMTPAuth = true;
             $correo->Username = $SMTPemail;
             $correo->Password = $SMTPpassword;
             $correo->SMTPSecure = 'tls';
             $correo->Port = $SMTPport;

             //
             $correo->SetFrom($my_mail, $my_name);

             //
             $correo->AddReplyTo($my_replyto, $my_name);

             //
             $correo->AddAddress($Email, $Email);

             $correo->Subject = $Asunto;

             /*
             *
             *
             *
             *
             *
             */
             $correo->MsgHTML($Mensaje);


             //
             //

             //
             if(!$correo->Send()){
               $resultado = "Error enviando el correo, por favor intente de nuevo. Error:". $correo->ErrorInfo;
               echo '       <br>
                              <div class="col-md-12">
                              <div class="alert alert-danger alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h5><i class="icon fa fa-ban"></i> ¡Error! </h5>'.$resultado.'
                              </div>
                            </div>';
             }else{
               $resultado = "Correo enviado con exito!";
               echo '   <br>
                       <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h5><i class="icon fa fa-check"></i> ¡Aviso! </h5>'.$resultado.'
                           </div>
                       </div>';
             }
           }else{
             $resultado = "Error, por favor ingrese todos los datos";
             echo'    <br>
                      <div class="col-md-12">
                     <div id="resultados"><div class="alert alert-warning alert-dismissible" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</Span><Button>
                       <strong> Error! </strong> '.$resultado.'</div>
                     </div>
                  </div>';

           }//Fin if !empty

      }//Fin if isset

    }//Fin sendEmailSMTP

  }
