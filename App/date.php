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
$pss = "hola";
$password_segura = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
$verify = password_verify($pss, $password_segura);
echo "El pass es: $pass<br>";
echo "El segura es: $password_segura <br>";
echo "verificaciones: $verify<br>";