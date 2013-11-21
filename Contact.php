<?php

if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $siteEmail = "rpiresumate@gmail.com";
    $name = $_POST['name'];
    $emailer = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    //counteract early stops
    //see http://php.net/manual/en/function.mail.php under the Parameters>message heading
    $message = str_replace("\n.", "\n..", $message);
    
    $headers = 'From: ' . $emailer . '' . "\r\n" . 'Reply-To: ' . $emailer . '' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    mail($siteEmail, $subject, $message, $headers);
    /* ^^^ requires webmail functionality (WILL NOT WORK on local host unless you use your XAMPP's sendmail client  */
}
?>
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