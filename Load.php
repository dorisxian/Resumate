<?php
	session_start();
	include("php/fetchResumes.php");
	$resumes = fetchResumes();
	$index = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('php/head.php') ?>
	<script src="js/load.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/load.css">
</head>
<body>
	<?php include('php/header.php'); ?>
	<section id="canvas">
		<section id="load">
			<form id="resumes" method="post" action="php/load.php" onsubmit="return validate();">
				<?php foreach($resumes as $resume): ?>
				<img src="<?php echo "./img/lib/" . $resume['rid'] . ".png" ?>" class="off thumbnail">
				<input type="hidden" name="num" value="<?php echo $index ?>" class="value">
				<img src="<?php echo "./img/lib/" . $resume['rid'] . "h.png" ?>" class="on thumbnail">
				<?php $index++; ?>
				<?php endforeach; ?>
				<br/>
				<input type="image" name="delete" src="./img/delete.png" value="Delete">
				<input type="image" name="load" src="./img/view.png" value="Load">
				<input type="image" name="edit" src="./img/edit.png" value="Edit">
			</form>
		</section>
		
	</section><!-- @end #canvas -->
	<footer>
		<p>Resumate © 2013. All Rights Reserved.</p>
	</footer>
</body>