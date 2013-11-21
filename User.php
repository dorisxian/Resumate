<?php
    session_start();

    // Connect to the database
    try {
        $dbname = 'resumate';
        $user = 'root';
        $pass = '';
        $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);

    }
        catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $msg = '';
   
    /*   Register user form   */
    if (isset($_POST['register'])) {   
        //check if password matches passwordconfirm
        if ($_POST['password'] !== $_POST['passwordconfirm']) {
            $msg = "Passwords must match.";
        }
        //^^needs to be implemented either here or in html
        
        
        else {
            // Generate random salt
            $salt = hash('sha256', uniqid(mt_rand(), true));      

            // Apply salt before hashing
            $salted = hash('sha256', $salt . $_POST['password']);

            // Store the salt with the password, so we can apply it again and check the result
            $stmt = $dbconn->prepare("INSERT INTO users (email, pword, salt) 
                              VALUES (:email, :password, :salt)");
            $stmt->execute(array(':email' => $_POST['email'], ':password' => $salted, ':salt' => $salt));
                                
            //login the user once they've successfully registered
            $login_stmt = $dbconn->prepare('SELECT email, uid FROM users WHERE email=:email AND pword=:password');
            $login_stmt->execute(array(':email' => $_POST['email'], ':password' => $salted));

            if ($user = $login_stmt->fetch()) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['uid'] = $user['uid'];
            }
        }
    }
    
    /*   Login form   */
    if (isset($_POST['login']) && $_POST['login'] == 'Sign In') {
        $salt_stmt = $dbconn->prepare('SELECT salt FROM users WHERE email=:email');
        $salt_stmt->execute(array(':email' => $_POST['email']));
        $res = $salt_stmt->fetch();
        $salt = ($res) ? $res['salt'] : '';
        $salted = hash('sha256', $salt . $_POST['password']);
        
          
        $login_stmt = $dbconn->prepare('SELECT email, uid FROM users WHERE email=:email AND pword=:password');
        $login_stmt->execute(array(':email' => $_POST['email'], ':password' => $salted));


        if ($user = $login_stmt->fetch()) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['uid'] = $user['uid'];
        }
        else {
            $err = 'Incorrect username or password.';
        }
    }
    
    /*   Logout form   */
    if (isset($_SESSION['email']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
        // Unset the keys from the superglobal
        unset($_SESSION['email']);
        unset($_SESSION['uid']);
        // Destroy the session cookie for this session
        setcookie(session_name(), '', time() - 72000);
        // Destroy the session data store
        session_destroy();
        $err = 'You have been logged out.';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('php/head.php'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="css/user.css">
	<script type="text/javascript" src="js/user.js"></script>
</head>
<body>
	<?php include('php/header.php'); ?>

    <?php if (isset($_SESSION['email'])): ?>
    <h1>Welcome, <?php echo htmlentities($_SESSION['email']) ?></h1>
    <section id="canvas">
		<section id="user">
            <form id ="logout" class="" action="" method="post">
                <h2 class="subtitle">Logout</h2><br/>
                <input type="submit" name="logout" value="Logout" class="thin"/>
            </form>
        </section>
	</section>
    <?php else: ?>
	<section id="canvas">
		<section id="user">
			<form id="login" class="" action="User.php" method="post">
				<h2 class="subtitle">Login</h2>
				<div><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email" required></div>
				<div><i class="fa fa-key fa-fw"></i><input type="password" name="password" placeholder="Password" required></div>
				<input type="submit" name="login" value="Sign In" class="thin"/>
				<p class="change_link">Not a member yet?<a href="#register" class="toregister light"><i class="fa fa-plus-circle"></i>Join us</a></p>
			</form>
			<form id="register" class="hidden" action="User.php" method="post">
				<h2 class="subtitle">Register</h2>
				<div><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email" required></div>
				<div><i class="fa fa-key fa-fw"></i><input type="password" name="password" placeholder="Password" required></div>
				<div><i class="fa fa-lock fa-fw"></i><input type="password" name="passwordconfirm" placeholder="Comfirm Password" required></div>
				<input type="submit" name="register" value="Signup" class="thin" />
				<p class="change_link">Already a member?<a href="#login" class="tologin light"><i class="fa fa-sign-in"></i>Login</a></p>
			</form>	
                        
		</section>
		
	</section><!-- @end #canvas -->
    <?php endif; ?>
	
	<footer>
		<p>Resumate © 2013. All Rights Reserved.</p>
	</footer>

</body>
</html>