<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    require_once './conexion.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    //$verify = password_verify($password, $usuario['pass']);

    $sql = "SELECT * FROM  tb_usuario WHERE usuario = '".$user."';";
    $password_segura = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
    $resultSql = $mysql->query($sql);

    if($mysql->affected_rows <= 0) {
      
        echo "Error: Credenciales no regitradas";

    } else{
       

        
        $querry = "UPDATE tb_usuario set pass = '".$password_segura."' where usuario = '".$user."'";
        $result= $mysql->query($querry);
    
        if (!$mysql->affected_rows == 1){
        
                echo "No se pudo actualzar la contraseña";
        }else {

            echo "Actualizacion  exitosa";
            ob_start();
        ?>
        <body>
                
            <table>
                <tr>
                   
                <tr style="display: block; width: 50%; height: auto; float: left;">
                    <h1 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                         RECUPERACION DE CUENTA   </h1>
                    <h2> Le hemos enviado sus crendenciales, por favor guradalas en un lugar seguro <h2>
                    <h3>Su Contraseña es:   <?php echo $pass;?></h3>
                </tr>
                <tr style="float: right; width: 50%; height: auto; text-align: center; position: relative; top: -250px;"> 
                    <img  width="200%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSE6pofdfOpGDjsTwUX-jrk2q5Wf3QmXnOgU1XQigtrWw&s">
                </tr>
            </table>
                
        </body>
            
            </html>
        <?php
        $text = ob_get_clean();
        $email = $user;
        
        
        
        require_once '../web/assets/librerya/PHPMailer/src/PHPMailer.php';
        require_once '../web/assets/librerya/PHPMailer/src/Exception.php';
        require_once '../web/assets/librerya/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'mail.clickdatasolution.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = 'login';                                   //Enable SMTP authentication
            $mail->Username = 'info@clickdatasolution.com';                     //SMTP username
            $mail->Password = ';&vJ(7c6PWjf';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('info@clickdatasolution.com', 'ClickData');
            $mail->addAddress($email);     //Add a recipient
        //                                    $mail->addReplyTo('info@example.com', 'Information');
        //                                    $mail->addCC('cc@example.com');
        //                                    $mail->addBCC('bcc@example.com');
        //                                     Attachments
        //                                    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //                                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Actualizacion de Datos App CSCD";
            $mail->Body = $text;
        
            $mail->send();
            
        } catch (Exception $e) {
            //echo "error: {$mail->ErrorInfo}";
        }

        }
        
     }

}   