
// var usuarioExistente = false;
 var email_EmpRegistro = false;
 var clienteRegistro = false;
//*-------------- Validar usuario existente --------*//
if(email_EmpRegistro == true){
  $("#email_EmpRegistro").change(function(){
   var email = $("#email_EmpRegistro").val(); // .val puede leer y escrivir de acuerdo como se aplique en el codigo
   if (email != ""){
     var datos = new FormData();
     datos.append("validarEmail", email);
     $.ajax({
       url: "ajax/ingreso-ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contenType: false,
       processData: false,
       beforeSend:function(respuesta) {
         console.log("se va a enviar una solicitud ajax");
       },
       success:function(respuesta) {
         console.log(respuesta);
         if(respuesta == 0){
           console.log("Este Usuario ya existe, use otro Nombre");
         }else {
           console.log("Nombre de usuario Disponible");
         }
       },
       error:function(respuesta) {
         console.log("ocurrió un error", respuesta);
       }
     });
   }
  });
}else {

}

//*-------------- Validar Cliente existente --------*//
if(clienteRegistro == true){
  $("#clienteRegistro").change(function(){
   var usuario = $("#clienteRegistro").val(); // .val puede leer y escrivir de acuerdo como se aplique en el codigo
   if (usuario != ""){
     var datos = new FormData();
     datos.append("validarCliente", usuario);
     $.ajax({
       url: "ajax/ingreso-ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contenType: false,
       processData: false,
       beforeSend:function(respuesta) {
         console.log("se va a enviar una solicitud ajax");
       },
       success:function(respuesta) {
         console.log(respuesta);
         if(respuesta == 0){
           console.log("Este Usuario ya existe, use otro Nombre");
         }else {
           console.log("Nombre de usuario Disponible");
         }
       },
       error:function(respuesta) {
         console.log("ocurrió un error", respuesta);
       }
     });
   }
  });

}else {

}
