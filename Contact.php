<!DOCTYPE html>
<html>
<head>
	<?php include('php/head.php'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="css/contact.css">
	<script type="text/javascript" src="js/newresume.js"></script>
</head>
<body>
	<?php include('php/header.php'); ?>

	<section id="canvas">
		<section id="contact">
			<form action="" method="post">
				<p><input name="name" type="text" placeholder="Name"></p>
			    <p><input name="email" type="email" placeholder="Email" required></p>
			    <p><input name="subject" type="text" placeholder="Subject"></p>
			    <p><textarea name="message" placeholder="Message" required></textarea></p>
		        <input id="checkbox_send" type="checkbox">
        		<label for="checkbox_send" class="checkbox_label checkbox">Reply to my email</label>
			    <input id="send" name="send" type="submit" value="Send" class="thin">
			</form>	
		</section>
	</section><!-- @end #canvas -->
	
	<footer>
		<p>Resumate © 2013. All Rights Reserved.</p>
	</footer>

</body>
</html>