<?php
global $dbconn;
$dbname = 'resumate';
$user = 'dorisxian';
$pass = 'pinyuan1008';
$dbconn = new PDO('mysql:host=dorisxiancom.ipagemysql.com;dbname='.$dbname, $user, $pass);
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>