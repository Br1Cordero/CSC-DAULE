<?php
$hostname = '216.238.107.175';
$username = 'cscdaule_root';
$password = '1nv1t4d0s$';
$db = 'cscdaule_cscd1';
//$db = 'cscdaule_cscd';

$mysql = new mysqli(
    $hostname,
    $username,
    $password,
    $db);

    if ($mysql->connect_error):
        die ('Fallo la conexion error: '.$mysql->connect_error);
    elseif(!$mysql->connect_error):
        session_start();
        
    endif;
