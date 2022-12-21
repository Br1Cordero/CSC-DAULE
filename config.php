<?php
//error_reporting(0);

$hosname = "216.238.107.175";
$username = "cscdaule_root";
$password = "1nv1t4d0s$";
$dbname = "cscdaule_cscd";
$port = "5432 ";

$conn = pg_connect("host=$hosname dbname=$dbname user=$username password=$password port=$port");


if (!$conn){
    die ('Fallo la conexion error: '.pg_connect_error($conn).pg_errormessage($conn));
}







