<?php
	session_start();
	include("fetchResumes.php");
	$resumes = fetchResumes();
	
	$xmlid = $resumes[$_GET['num']]['xmlid'];
	include("save.php");
	
	try {
		$dbname = 'resumate';
		$user = 'root';
		$pass = '';
		$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		$err = "Error: " . $e->getMessage();
	}
	$newrid = $dbconn->prepare("UPDATE resumes SET rid=:rid WHERE xmlid=:xmlid");
	$newrid->execute(array(":rid"=>$_POST['rid'], ":xmlid"=>$xmlid));
	
	header("Location: ../Load.php");
?>