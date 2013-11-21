<?php
	session_start();
	// Connect to the database
	try {
		$err = '';
		if (isset($_POST['login']) && $_POST['login'] == 'Sign In') {
			include('php/login.php');
			if(login()) {
				//redirect the user to landing page
			}
		}
		if (isset($_POST['register']) && $_POST['register'] == 'Signup') {
			include('php/register.php');
			if(register()){
				//redirect the user to landing page
			}
		}
		if (isset($_SESSION['email']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
			include('php/logout.php');
			logout();
		}
	}
	catch (Exception $e) {
		$err = "Error: " . $e->getMessage();
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
				<p><?php echo $err; ?></p>
				<div><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email" required></div>
				<div><i class="fa fa-key fa-fw"></i><input type="password" name="pass" placeholder="Password" required></div>
				<input type="submit" name="login" value="Sign In" class="thin"/>
				<p class="change_link">Not a member yet?<a href="#register" class="toregister light"><i class="fa fa-plus-circle"></i>Join us</a></p>
			</form>
			<form id="register" class="hidden" action="User.php" method="post" onsubmit="return validate();">
				<h2 class="subtitle">Register</h2>
				<p id="errorMessage"></p>
				<div><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email" required></div>
				<div><i class="fa fa-key fa-fw"></i><input type="password" name="password" placeholder="Password" required></div>
				<div><i class="fa fa-lock fa-fw"></i><input type="password" name="passwordconfirm" placeholder="Confirm Password" required></div>
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