<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once './conexion.php';
    date_default_timezone_set("America/Guayaquil");
    $date = date ("ymdGis");

    $img = $_POST['Img'];
    $user = $_POST['Descripcion'];
    $title = $_POST['Title'];
    $id = $_POST['Id'];
    $idDepartamento = $_POST['IdDepartamento'];


    $path  = "Uploads/Denucnia_$id$date.png";
    $actualpath  ="http://10.10.16.81/CSCD/App/$path";

    $sql = "INSERT into tb_denuncia(id_usuario, id_departamento, titulo, descripcion, imagen) VALUES('$id','$idDepartamento','$title','$user','$actualpath');";
    $result = $mysql->query($sql);

    if($mysql->affected_rows == 1) {
        file_put_contents($path, base64_decode($img));

        echo "SE SUBIO EXITOSAMENTE";
   
    }
    
}
