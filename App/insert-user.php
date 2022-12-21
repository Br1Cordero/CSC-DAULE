<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
        require_once './conexion.php';
    
        $Name = $_POST['nombre']; 
        $Surname = $_POST['apellido'];
        $Ced = $_POST['cedula'];
        $Email = $_POST['email'];
        $Cel = $_POST['celular'];
        $Pass  = $_POST['pass'];   
    
        $sql = "SELECT * FROM  tb_usuario WHERE usuario = '".$Email."';";
        $ressult = $mysql->query($sql);

        if($mysql->affected_rows($ressult) >= 1){
            echo "El usuario esta Registrado";
        }
        $sql = "SELECT * FROM  tb_usuario WHERE usuario = '".$Email."';";
        $ressult = $mysql->query($sql);
        
        if($mysql->num_rows($ressult)>= 1){
            echo "El usuario esta Registrado";
        }else {
            $password_segura = password_hash($Pass, PASSWORD_BCRYPT, ['cost' => 4]);
            $CallSql = "CALL InsertUsuario(
                '$Name', 
                '$Surname',
                '$Ced',
                '$Email',
                '$Cel',
                '$password_segura'
            );";
            $resultCall = $mysql->query($CallSql);
            if($resultCall){
                echo "USUARIO REGISTRADO";
            }
        }
}