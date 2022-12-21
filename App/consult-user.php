<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    require_once './conexion.php';

    $user = trim($_POST['user']);
    $pass = $_POST['pass'];

 

    $sql = "SELECT * FROM  tb_usuario WHERE usuario = '".$user."';";
   
   
    $resultSql = $mysql->query($sql);

    if($mysql->num_rows($resultSql) >= 1){
       
        $usuario = $mysql->fetch_assoc($resultSql);
        
       
        $verify = password_verify($pass, $usuario['pass']);
         
    
         
        if ($verify ){
    
            echo $usuario['id'];
        }else {
            echo "Error: Credenciales en las incorectas";
        
        }
    }
     else{
        echo "Error: Credenciales no regitradas";
        
     }

}   