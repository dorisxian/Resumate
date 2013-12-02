<?php
	if(isset($_POST['load']) && $_POST['load'] == "Load") {
		include("resume.php");
	} else if(isset($_POST['delete']) && $_POST['delete'] == "Delete"){
		include("delete.php");
	} else if(isset($_POST['edit']) && $_POST['edit'] == "Edit") {
		header("Location: ../NewResume.php?num=". $_POST['num']);
	} else {
		print_r($_POST);
	}
?>