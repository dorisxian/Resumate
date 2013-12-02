<?php
	session_start();
	include("fetchResumes.php");
	$resumes = fetchResumes();
	
	$xmlid = $resumes[$_GET['num']]['xmlid'];
	include("save.php");
	
	header("Location: ../Load.php");
?>