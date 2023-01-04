  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <main>
      <form action="#" method="post">
        <input type="password" name="pass" id="">
        <button type="submit">Enviar</button>
      </form>
    </main>    
  </body>
  </html>
<?php
$pass = $_POST['pass'];

require_once 'conexion.php';
$user = "brunomateoc7@gmail.com";
$sql = "SELECT * FROM  tb_usuario WHERE usuario = '".$user."';";
echo $sql;

$resultSql = $mysql->query($sql);

    $usuario = $resultSql->fetch_assoc();
    echo $usuario['Pass'];

$pss = "hola";

$verify = password_verify( $pass, $usuario['Pass']);
echo "El pass es: $pass<br>";
//echo "El segura es: $password_segura <br>";
echo "verificaciones: $verify<br>";