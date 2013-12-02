<?php
	session_start();
	try {
		$dbname = 'resumate';
		$user = 'root';
		$pass = '';
		$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	include("fetchResumes.php");
	$resumes = fetchResumes();
	$remove = $resumes[$_POST['num']]['xmlid'];
	unlink('xml/' . $remove . '.xml');
	$delete = $dbconn->prepare("DELETE FROM resumes WHERE xmlid=:xmlid");
	$delete->execute(array(":xmlid"=>$remove));
	
	header( 'Location: ../Load.php' );
?>