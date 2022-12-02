<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){


    require_once ('./conexion.php');

    $idDep = $_GET['idDep'];
    $idDen = $_GET['idDenun'];

    $sql =   "SELECT id, titulo, descripcion, imagen from tb_denuncia WHERE estado =1  and id_departamento = '".$idDep."' and id = '".$idDen."';";
    $result  = pg_query($db,$sql);

    $json = array();

    if(pg_affected_rows($result) >0){
        while($row = pg_fetch_assoc($result)) {
            $json[]= array(
                'id' => $row['id'],
                'titulo' => $row['titulo'],
                'descripcion' => $row['descripcion'],
                'imagen' => $row['imagen']

            );
        }
        echo json_encode($json);
    }else {
        echo "No existen registros ";
}


}