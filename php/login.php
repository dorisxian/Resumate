<?php
	function login() {
		global $err;
		$dbname = 'resumate';
		$user = 'root';
		$pass = '';
		$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$salt_stmt = $dbconn->prepare('SELECT salt FROM users WHERE email=:email');
		$salt_stmt->execute(array(':email' => $_POST['email']));
		$res = $salt_stmt->fetch();
		$salt = ($res) ? $res['salt'] : '';
		$salted = hash('sha256', $_POST['pass'] . $salt);

		$login_stmt = $dbconn->prepare('SELECT email, uid FROM users WHERE email=:email AND pword=:pass');
		$login_stmt->execute(array(':email' => $_POST['email'], ':pass' => $salted));
					
						
		if ($user = $login_stmt->fetch()) {
			$_SESSION['email'] = $user['email'];
			$_SESSION['uid'] = $user['uid'];
			return true;
		} else {
			$err = 'Incorrect username or password.';
			return false;
		}
	}
?>