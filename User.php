<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="css/user.css">
</head>
<script>
$(document).ready(function() {
	$('.change_link a').on('click', function(e){
    	e.preventDefault();
		if($(this).hasClass('toregister')) {
			var oldcontent = $('#login');
		}
		else if($(this).hasClass('tologin')) {
			var oldcontent = $('#register');
		}
  		var newcontent = $(this).attr('href');
  
  		$(oldcontent).fadeOut('fast', function(){
	        $(newcontent).fadeIn().removeClass('hidden');
	        $(oldcontent).addClass('hidden');
	    }); 	
    });
});
</script>
<body>
	<?php include('header.php'); ?>

	<section id="canvas">
		<section id="user">
			<form id="login" class="" action="" method="post">
				<h2 class="subtitle">Login</h2>
				<p><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email"></p>
				<p><i class="fa fa-key fa-fw"></i><input type="password" name="password" placeholder="Password"></p>
				<input type="submit" name="login" value="Sign In" class="thin"/>
				<p class="change_link">Not a member yet?<a href="#register" class="toregister light"><i class="fa fa-plus-circle"></i>Join us</a></p>
			</form>
			<form id="register" class="hidden" action="" method="post">
				<h2 class="subtitle">Register</h2>
				<p><i class="fa fa-envelope fa-fw"></i><input type="email" name="email" placeholder="Email"></p>
				<p><i class="fa fa-key fa-fw"></i><input type="password" name="password" placeholder="Password"></p>
				<p><i class="fa fa-lock fa-fw"></i><input type="password" name="passwordconfirm" placeholder="Comfirm Password"></p>
				<input type="submit" name="register" value="Signup" class="thin" />
				<p class="change_link">Already a member?<a href="#login" class="tologin light"><i class="fa fa-sign-in"></i>Login</a></p>
			</form>		
		</section>
		
	</section><!-- @end #canvas -->
	
	<footer>
		<p>Resumate © 2013. All Rights Reserved.</p>
	</footer>

</body>
</html>