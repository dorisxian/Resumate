<?php
	//returns all the resumes of a user
	function fetchResumes() {
		try {
			$dbname = 'resumate';
			$user = 'root';
			$pass = '';
			$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
			$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			$err = "Error: " . $e->getMessage();
		}
		$select = $dbconn->prepare("SELECT * FROM resumes WHERE uid=:uid");
		$select->execute(array(":uid"=>$_SESSION['uid']));
		return $select->fetchAll();
	}
?>