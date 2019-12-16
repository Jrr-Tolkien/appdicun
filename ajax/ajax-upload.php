 <?php
session_start();
 include_once "../mvc/controller/controller.php";
 include_once "../mvc/models/crud.php";

 if (isset($_FILES["file"]) && isset($_POST["Nombre_Publicacion"]) && isset($_POST["Precio_Publicacion"]) && isset($_POST["Descripcion_Publicacion"]) ){

     $nomb_Publi = $_POST["Nombre_Publicacion"];
     $prec_Publi = $_POST["Precio_Publicacion"];
     $descrip_Publi = $_POST["Descripcion_Publicacion"];


     if (!empty($_FILES["file"])) {
         if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
             $targetDir = "../download/";
             $imageFileSize=$_FILES["file"]["size"];
             $imageFileType=pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

             $imageName2 = time()."_".rand(1000,9999).".".$imageFileType;

             $targetFile2 = $targetDir . $imageName2;

             if ($imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG"
             && $imageFileType != "bmp" && $imageFileType != "BMP" && $imageFileType != "gif" && $imageFileType != "GIF" && $imageFileType != "tif" && $imageFileType != "TIF") {
                 $return = "1";

             }else if ($imageFileSize > 25165824) {
                 $return = "2";
             }else {
                 move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile2);
                 $controller = new MvcController;
                 $controller->registroPubliEmpresaController($imageName2, "download/".$imageName2."", $nomb_Publi, $prec_Publi , $descrip_Publi );
                 return;
             }
         }else {
             $return = "3";
         }
     }else {
         $return = "4";
     }
  }else{
     $return = "4";
  }

 echo $return;

 ?>
