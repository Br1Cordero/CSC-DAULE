<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once ('conexion.php');

    //sql = "SELECT * FROM tb_departamento;";
    $sql = "SELECT id, nombre, imagen, email FROM tb_departamento where estado = 1;";
    $result = pg_query($db, $sql);

    $json = array();

    if(pg_affected_rows($result) >0){
        while($row = pg_fetch_assoc($result)) {
            $json[]= array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'imagen' => $row['imagen'],
                'email' => $row['email']
            );
        }
        echo json_encode($json);
    }else {
        echo "No existen registros ";
    }

}
