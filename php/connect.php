<?php
global $dbconn;
$dbname = 'resumate';
$user = 'root';
$pass = '';
$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>