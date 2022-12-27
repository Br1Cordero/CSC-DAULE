<?php


    
    require_once './conexion.php';

   
    $pass = 'xd';
    $email = 'brunomateoc7@gmail.com';


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
        
        
        
        
        require_once '../Web/Asset/PHPMailer/src/PHPMailer.php';
        require_once '../Web/Asset/PHPMailer/src/Exception.php';
        require_once '../Web/Asset/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        
        try {
            //Server settings   $mail->SMTPDebug = 0;
            $mail->isSMTP();                         
            $mail->Host       = 'mail.cscdaule.com'; 
            $mail->SMTPAuth   = 'login';             
            $mail->Username   = 'info@cscdaule.com'; 
            $mail->Password   = '1nv1t4d0s$';        
            $mail->SMTPSecure = 'ssl';            
            $mail->Port       = 465;  
            //Recipients
            $mail->setFrom('info@cscdaule.com', 'CONSEJO DE SEGURIDAD CIUDADANA DE DAULE');
            $mail->addAddress($email);    
            //Add a recipient
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

        