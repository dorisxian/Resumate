<?php
	//returns all the resume style ids in a php array
	function fetchResumes($uid) {
		try {
			$dbname = 'resumate';
			$user = 'root';
			$pass = '';
			$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
			$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			$err = "Error: " . $e->getMessage();
		}
		$select = $dbconn->prepare("SELECT rid FROM resumes WHERE uid=:uid");
		return $select.execute(":uid"=>$_SESSION['uid'])->fetchAll();
	}
?>