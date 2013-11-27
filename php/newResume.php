<?php
	session_start();
	try {
		$dbname = 'resumate';
		$user = 'root';
		$pass = '';
		$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//$_SESSION['uid'] and $_POST['rid']
		// first insert new style and uid into table to secure my new xml id
		$insert = $dbconn->prepare("INSERT INTO resumes (uid, rid) VALUE (:uid, :rid)");
		$insert->execute(":uid"=>$_SESSION['uid'], ":rid"=>$_POST['rid']);
		
		// get the last xml id for the user(the one I just inserted
		$select = $dbconn->prepare("SELECT xml FROM resumes WHERE uid=:uid");
		$xmlid = end($select->execute(":uid"=>$_SESSION['uid'])->fetchAll())['xml'];
		
		include('save.php');
	} catch (Exception $e) {
		$err = "Error: " . $e->getMessage();
	}
?> 