function upload_image(){
  var respuesta ="";
  var inputFile =$('#file')[0];
  var file = inputFile.files[0];
  if ((typeof file == "object") && (file !== null)){
    var data = new FormData();
    data.append('file',file);
    $.ajax({
      url: "panel",
      type: "POST",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(objeto){
        console.log(objeto);
      if (objeto==0) {
          errorNot("Ocurrio un error al subor la foto");
          $("#file2").val("");
        }else if (objeto==1){
          errorNot("Lo sentimos, sólo se permiten archivos JPG, PNG. TIF, BMP y GIF");
          $("#file2").val("");
        }else if (objeto==2){
          errorNot("Lo sentimos, pero el archivo es demasiado grande. Seleeciona otro archivo menor a 2MB");
          $("#file2").val("");
        }else if (objeto==3){
          errorNot("Ocurrió un error, no se recibió la foto correctamente.");
          $("#file2").val("");
        }else if (objeto==4){
          errorNot("Lo sentimos, sólo se permiten archivos JPG, PNG, TIF, BMP y GIF");
          $("#file2").val("");
        }else{
          $("#file2").val(objeto);
          header("location:panel");
        }
      },error: function(data){
        console.log(" Error interno");
        console.log(data);
      }
    });
  }else {
    errornot("Ocurrio un error interno, no se recibió el archivo correctamente");
  }

}
