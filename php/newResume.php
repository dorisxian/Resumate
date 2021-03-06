<?php
	session_start();
	try {
		include('connect.php');
		// $dbname = 'resumate';
		// $user = 'root';
		// $pass = '';
		// $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
		// $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//$_SESSION['uid'] and $_POST['rid']
		// first insert new style and uid into table to secure my new xml id
		$insert = $dbconn->prepare("INSERT INTO resumes (uid, rid) VALUES (:uid, :rid)");
		$insert->execute(array(':uid' => $_SESSION['uid'], ':rid' => $_POST['rid']));
		
		try { 
        	$dbconn->beginTransaction();

			// get the last xml id for the user(the one I just inserted
			$select = $dbconn->prepare("SELECT xmlid FROM resumes WHERE uid=:uid");
			$select->execute(array(":uid"=>$_SESSION['uid']));

			$dbconn->commit(); 
	        $xmlid = $dbconn->lastInsertId();
	    } catch(PDOExecption $e) { 
        	$dbconn->rollback(); 
        	print "Error: " . $e->getMessage() . "</br>";
    	}

		//$xmlid = end($select->fetchAll())['xmlid'];
		
		require('save.php');
		
		header( 'Location: ../Load.php' );
	} catch (Exception $e) {
		echo "Error: " . $e->getMessage();
	}
?> 