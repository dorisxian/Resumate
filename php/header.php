<?php
	$log = "Login / Signup";
	if(isset($_SESSION['email'])) {
		$log = "Logout ";
	}
?>
<header>
	<img id="logo" src="img/logo.png" alt="">
	<h1>Resumate</h1>
</header>

<nav>
	<ul>
		<li><a href="NewResume.php"><span class="icon"><img src="img/add.png" alt=""></span>New Resume</a></li>
		<li><a href="User.php"><span class="icon"><img src="img/user.png" alt=""></span><?php echo $log; ?></a></li>
		<li><a href="Contact.php"><span class="icon"><img src="img/message.png" alt=""></span>Contact Us</a></li>
	</ul>
</nav>