<?php
	session_start();
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
	$select = $dbconn->prepare("SELECT xmlid, rid FROM resumes WHERE uid=:uid");
	$select->execute(array(":uid"=>$_SESSION['uid']));
	$result = $select->fetchAll();
	$xmlid = $result[000]['xmlid'];
	$rid = $result[000]['rid'];
	if(isset($_POST['num'])) {
		$xmlid = $result[$_POST['num']]['xmlid'];
		$rid = $result[$_POST['num']]['rid'];
	}
	$load = simplexml_load_file("xml/".$xmlid.".xml");
	
	$cssGet = $dbconn->prepare("SELECT css FROM styles WHERE rid=:rid");
	$cssGet->execute(array(':rid' => $rid));
	$css = $cssGet->fetchAll()[0]['css'];
?>
<html>
	<head>
		<style>
			<?php echo $css; ?>
		</style>
	</head>
	<body>
		<section id="header">
			<ul id="basicInfo">
				<?php if(($load->fname) != ''): ?>		<li id="firstName"><?php 	echo $load->fname[0]; ?></li>		<?php endif; ?>
				<?php if(($load->lname) != ''): ?>		<li id="lastName"><?php echo $load->lname[0]; ?></li>			<?php endif; ?>
				<?php if(($load->phone) != ''): ?>		<li id="phone"><?php echo $load->phone[0]; ?></li>				<?php endif; ?>
				<?php if(($load->email) != ''): ?>		<li id="email"><?php echo $load->email[0]; ?></li>				<?php endif; ?>
			</ul>
			<ul id="addressInfo">
				<?php if(($load->address1) != ''): ?>	<li id="addressLine1"><?php echo $load->address1[0]; ?></li>	<?php endif; ?>
				<?php if(($load->address2) != ''): ?>	<li id="addressLine2"><?php echo $load->address2[0]; ?></li>	<?php endif; ?>
				<?php if(($load->city) != ''): ?>		<li id="city"><?php echo $load->city[0]; ?></li>				<?php endif; ?>
				<?php if(($load->state) != ''): ?>		<li id="state"><?php echo $load->state[0]; ?></li>				<?php endif; ?>
				<?php if(($load->zip) != ''): ?>		<li id="zip"><?php echo $load->zip[0]; ?></li>					<?php endif; ?>
			</ul>
			<?php if(($load->website) != ''): ?>
			<ul id="additionalInfo">
				<li id="website"><?php echo $load->website[0]; ?></li>
			</ul>
			<?php endif; ?>
		</section>
		<section class="body" id="objective">
			<?php if(($load->obj) != ''): ?>		<div id="statement"><?php echo $load->obj[0]; ?></div> 		<?php endif; ?>
			<?php if(($load->profile) != ''): ?>	<div id="profile"><?php echo $load->profile[0]; ?></div> 	<?php endif; ?>
		</section>
		<section class="body" id="education">
			<?php foreach($load->schoolname as $i=>$value): ?>
			<ul class="school">
				<?php if(($load->schoolname[$i]) != ''): ?>		<li class="sName"><?php echo $load->schoolname[$i]; ?></li>			<?php endif; ?>
				<?php if(($load->schoolcity[$i]) != ''): ?>		<li class="sCity"><?php echo $load->schoolcity[$i]; ?></li>			<?php endif; ?>
				<?php if(($load->schoolcontry[$i]) != ''): ?>	<li class="sContry"><?php echo $load->schoolcontry[$i]; ?></li>		<?php endif; ?>
				<?php if(($load->schoolstartdate[$i]) != ''): ?><li class="sStartDate"><?php echo $load->schoolstartdate[$i]; ?></li><?php endif; ?>
				<?php if(($load->schoolenddate[$i]) != ''): ?>	<li class="sEndDate"><?php echo $load->schoolenddate[$i]; ?></li>	<?php endif; ?>
				<?php if(($load->maj[$i]) != ''): ?>			<li class="sMajor"><?php echo $load->maj[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->min[$i]) != ''): ?>			<li class="sMinor"><?php echo $load->min[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->gpa[$i]) != ''): ?>			<li class="sGPA"><?php echo $load->gpa[$i]; ?></li>					<?php endif; ?>
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
			<?php foreach ($load->type as $i=>$value): ?>
			<?php if($load->workhere == $i):; ?>
			<ul class="job" id="currentJob">
				<?php if(($load->type[$i]) != ''): ?>				<li class="wCompany"><?php echo $load->type[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->position[$i]) != ''): ?>			<li class="wTitle"><?php echo $load->position[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->workstartdate[$i]) != ''): ?>		<li class="wStartDate"><?php echo $load->workstatedate[$i];; ?></li>	<?php endif; ?>
				<?php if(($load->workcity[$i]) != ''): ?>			<li class="wCity"><?php echo $load->workcity[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->workdescription[$i]) != ''): ?>	<li class="wDescription"><?php echo $load->workdescription[$i]; ?></li>	<?php endif; ?>
			</ul>
			<?php else: ?>
			<ul class="job">
				<?php if(($load->type[$i]) != ''): ?>			<li class="wCompany"><?php echo $load->type[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->position[$i]) != ''): ?>		<li class="wTitle"><?php echo $load->position[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->workstartdate[$i]) != ''): ?>	<li class="wStartDate"><?php echo $load->workstatedate[$i];; ?></li>	<?php endif; ?>
				<?php if(($load->workenddate[$i]) != ''): ?>	<li class="wEndDate"><?php echo $load->workenddate[$i]; ?></li>			<?php endif; ?>
				<?php if(($load->workcity[$i]) != ''): ?>		<li class="wCity"><?php echo $load->workcity[$i]; ?></li>				<?php endif; ?>
				<?php if(($load->workdescription[$i]) != ''): ?><li class="wDescription"><?php echo $load->workdescription[$i]; ?></li>	<?php endif; ?>
			</ul>
			<?php endif; ?>
			<?php endforeach; ?>
		</section>
		<section class="body" id="skills">
			??? doesn't look complete to me
		</section>	
	</body>
</html>