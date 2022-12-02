<?php

$hosname = "localhost";
$dbname ="cscd";
$user ="postgres";
$password = "27866";
$port = "5432";
$db = pg_connect("host=$hosname dbname=$dbname user=$user password=$password port=$port");

//$con = new pg();