<?php
	// connect to the database
	try {
		$dbname = 'resumate';
		$user = 'root';
		$pass = '';
		$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		$err = "Error: " . $e->getMessage();
	}
	
	// select resume from the user, post to this page which user resume they want
	$select = $dbconn->prepare("SELECT xml FROM resumes WHERE uid=:uid");
	$xmlid = $select->execute(":uid"=>$_SESSION['uid'])->fetchAll()[$_POST["num"]]['xml'];
	$load = simplexml_load_file("xml/".$xmlid.".xml");
?>
<html>
	<head>
	</head>
	<body>
		<section id="header">
			<ul id="basicInfo">
				<li id="firstName"><?php echo load['fname'][0]; ?></li>
				<li id="lastName"<?php echo load['lname'][0]; ?>></li>
				<li id="phone"><?php echo load['phone'][0]; ?></li>
				<li id="email"><?php echo load['email'][0]; ?></li>
			</ul>
			<ul id="addressInfo">
				<li id="addressLine1"><?php echo load['address1'][0]; ?></li>
				<li id="addressLine2"><?php echo load['address2'][0]; ?></li>
				<li id="city"><?php echo load['city'][0]; ?></li>
				<li id="state"><?php echo load['state'][0]; ?></li>
				<li id="zip"><?php echo load['zip'][0]; ?></li>
			</ul>
			<ul id="additionalInfo">
				<li id="website"><?php echo load['website'][0]; ?></li>
			</ul>
		</section>
		<section class="body" id="objective">
			<div id="statement"><?php echo load['obj'][0]; ?></div>
			<div id="profile"><?php echo load['profile'][0]; ?></div>
		</section>
		<section class="body" id="education">
			<?php foreach($_POST['schoolname'] as $i=>$value): ?>
			<ul class="school">
				<li class="sName"><?php echo load['schoolname'][$i]; ?></li>
				<li class="sCity"><?php echo load['schoolcity'][$i]; ?></li>
				<li class="sContry"><?php echo load['schoolcontry'][$i]; ?></li>
				<li class="sStartDate"><?php echo load['schoolstartdate'][$i]; ?></li>
				<li class="sEndDate"><?php echo load['schoolenddate'][$i]; ?></li>
				<li class="sMajor"><?php echo load['maj'][$i]; ?></li>
				<li class="sMinor"><?php echo load['min'][$i]; ?></li>
				<li class="sGPA"><?php echo load['gpa'][$i]; ?></li>
			</ul>
			<?php endforeach; ?>
			<ul id="relevantCourseWork">
				<li>
					<div class="course"></div>
					<div class="cDescription"></div>
				</li>
			</ul>
		</section>
		<section class="body" id="work">
			<?php foreach ($_POST['type'] as $i=>$value):; ?>
			<?php if($_POST['workhere'][$i] == 'workhere'):; ?>
			<ul class="job" id="currentJob">
				<li class="wCompany"><?php echo load['type'][$i]; ?></li>
				<li class="wTitle"><?php echo load['position'][$i]; ?></li>
				<li class="wStartDate"><?php echo load['workstatedate'][$i];; ?></li>
				<li class="wCity"><?php echo load['workcity'][$i]; ?></li>
				<li class="wDescription"><?php echo load['workdescription'][$i]; ?></li>
			</ul>
			<?php else: ?>
			<ul class="job">
				<li class="wCompany"><?php echo load['type'][$i]; ?></li>
				<li class="wTitle"><?php echo load['position'][$i]; ?></li>
				<li class="wStartDate"><?php echo load['workstatedate'][$i]; ?></li>
				<li class="wEndDate"><?php echo load['workenddate'][$i]; ?></li>
				<li class="wCity"><?php echo load['workcity'][$i]; ?></li>
				<li class="wDescription"><?php echo load['workdescription'][$i]; ?></li>
			</ul>
			<?php endif; ?>
			<?php endforeach; ?>
		</section>
		<section class="body" id="skills">
			??? doesn't look complete to me
		</section>
	</body>
</html>