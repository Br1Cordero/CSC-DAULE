<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    require_once './conexion.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    


    $sql = "SELECT * FROM  tb_usuario WHERE usuario = '".$user."';";
    echo $sql;
   
    $resultSql = $mysql->query($sql);

    if($mysql->affected_rows == 1){

        $usuario = $resultSql->fetch_assoc();
        
       
        $verify = password_verify($pass, $usuario['Pass']);
         
    
              
        if ($verify ){
    
            echo $usuario['id'];
            
        }else {
            echo "Error: Credenciales en las incorectas";
        
        }
    }else{
        echo "Error: Credenciales no regitradas";
           
     }

}   