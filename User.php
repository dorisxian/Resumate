<?php
	session_start();
	try {
		$err = '';
		if (isset($_POST['login']) && $_POST['login'] == 'Sign In') {
			include('php/login.php');
            login();
		}
		else if (isset($_POST['register']) && $_POST['register'] == 'Signup') {
			include('php/register.php');
            register();
		}
		else if (isset($_SESSION['email']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
			include('php/logout.php');
			logout();
		}
	}
	catch (Exception $e) {
		$err = "Error: " . $e->getMessage();
	}

	if(isset($_SESSION['email'])) {
		include("php/fetchResumes.php");
		$resumes = fetchResumes();
		$index = 0;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('php/head.php'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="css/user.css">
	<script type="text/javascript" src="js/user.js"></script>
	<script src="js/load.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/load.css">
</head>
<body>
	<?php include('php/header.php'); ?>
	<pre></pre>
    <?php if (isset($_SESSION['email'])): ?>
    <section id="canvas">
		<section id="load">
			<?php 
	    		$parts = explode("@", $_SESSION['email']);
				$username = $parts[0];
	    	 ?>
			
			<form id ="logout" class="" action="" method="post">
	            <input type="submit" name="logout" value="Logout" class="thin"/>
	        </form>

	        <p class="link light">Welcome, <?php echo $username ?>

			<h3>Your Resume</h3>
			<a class="new" href="NewResume.php"><img src="./img/file_new.png" alt="">Create a new resume</a>
			<form id="resumes" method="post" action="php/load.php" onsubmit="return Validate();">
				<?php foreach($resumes as $resume): ?>
				<img src="<?php echo "./img/lib/" . $resume['rid'] . ".png" ?>" class="off">
				<input type="hidden" name="num" value="<?php echo $index ?>" class="value">
				<img src="<?php echo "./img/lib/" . $resume['rid'] . "h.png" ?>" class="on">
				<?php $index++; ?>
				<?php endforeach; ?>
				<input type="image" name="delete" src="./img/file_delete.png" value="Delete">
				<input type="image" name="load" src="./img/file_search.png" value="Load">
				<input type="image" name="edit" src="./img/file_edit.png" value="Edit">
			</form>
		</section>

        
        
	</section>

    <?php else: ?>
	<section id="canvas">
		<section id="user">
			<form id="login" class="" action="User.php" method="post">
				<h2 class="subtitle">Login</h2>
				<p class="error"><?php if ($err != null){ echo '<i class="fa fa-exclamation-circle"></i>'.$err;} ?></p>
				<div><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email" required></div>
				<div><i class="fa fa-key fa-fw"></i><input type="password" name="pass" placeholder="Password" required></div>
				<input type="submit" name="login" value="Sign In" class="thin"/>
				<p class="change_link">Not a member yet?<a href="#register" class="toregister light"><i class="fa fa-plus-circle"></i>Join us</a></p>
			</form>
			<form id="register" class="hidden" action="User.php" method="post" onsubmit="return Validate();">
				<h2 class="subtitle">Register</h2>
				<p id="errorMessage" class="error"></p>
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