<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="css/newresume.css">
</head>
<body>
	<?php include('header.php'); ?>

	<section id="canvas">
		<section id="sidemenu">
			<ul>
				<li>
					<a href="#basic-form" class="open active"><i class="fa fa-user fa-fw"></i>Basic Information</a>
				</li>

				<li>
					<a href="#profile-form"><i class="fa fa-star fa-fw"></i>Profile / Objective</a>
				</li>

				<li>
					<a href="#education-form"><i class="fa fa-book fa-fw"></i>Education</a>
				</li>

				<li>
					<a href="#work-form"><i class="fa fa-suitcase fa-fw"></i>Work Experience</a>
				</li>
				<li>
					<a href="#skill-form"><i class="fa fa-tasks fa-fw"></i>Skills</a>
				</li>
			</ul>
		</section><!-- @end #sidemenu -->
		
		<section id="form">
			<form id="basic-form" class="formblock" action="" method="post">
				<p><label>First Name</label><input type="text" name="fname" placeholder="Enter First Name"></p>
				<p><label>Last Name</label><input type="text" name="lname" placeholder="Enter Last Name"></p>
				<p><label>Address Line 1</label><input type="text" name="address1" placeholder="Enter Address Line 1"></p>
				<p><label>Address Line 2</label><input type="text" name="address2" placeholder="Enter Address Line 2"></p>
				<p><label>City</label><input type="text" name="city" placeholder="Enter City"></p>
				<p><label>State</label><input type="text" name="state" placeholder="Enter State"></p>
				<p><label>Zip Code</label><input type="text" name="zip" placeholder="Enter Zip Code"></p>
				<p><label>Phone</label><input type="tel" name="phone" placeholder="Enter Phone"></p>
				<p><label>Email</label><input type="email" name="email" placeholder="Enter Email"></p>
				<p><label>Website</label><input type="url" name="website" placeholder="Enter Website"></p>
			</form>
			<form id="profile-form" class="formblock hidden">
				<p><label>Objective Statement</label><input type="text" name="obj" placeholder="Enter objective statement"></p>
				<p><label>Profile</label><input type="text" name="profile" placeholder="Enter profile"></p>	
			</form>
			<form id="education-form" class="formblock hidden">
				<div class="ed_fields">
					<p><label>Type</label><input type="text" name="type" placeholder="Enter secondary, college etc."></p>
					<p><label>Name</label><input type="text" name="schoolname" placeholder="Enter name of school"></p>
					<p><label>City/State</label><input type="text" name="city" placeholder="Enter city and state of school"></p>
					<p><label>Website</label><input type="text" name="website" placeholder="Enter school website"></p>
					<p><label>Major</label><input type="text" name="maj" placeholder="Enter major if applicable"></p>
					<p><label>Minor</label><input type="text" name="min" placeholder="Enter minor if applicable"></p>
					<p><label>GPA</label><input type="text" name="gpa" placeholder="Enter GPA"></p>
					<p><label>Relevant Course Work</label><input type="text" name="courses" placeholder="Enter relevant course work"></p>
					<p><label>Honors/Achievements</label><input type="text" name="hnrs" placeholder="Enter honors/achievements while at school"></p>
				</div>
				<input type="button" id="addSchool" value="Add School" />
			</form>
			<form id="work-form" class="formblock hidden">
				<h4>Work Information</h4>	
				<input type="button" id="addWork" value="Add Work" />
				<div class="ed_fields">
					<p><label>Company</label><input type="text" name="type" placeholder="Enter Company Name"></p>
					<p><label>Job Title</label><input type="text" name="position" placeholder="Enter position held"></p>
					<label>Start date :</label>
        					<select name="startDateDay" id="startDaydropdown"></select> 
        				  	<select name="startDateMonth" id="startMonthdropdown"></select> 
        					<select name="startDateYear" id="startYeardropdown"></select>
        				<label>End date :</label>
            					<select name="endDateDay" id="endDaydropdown"></select> 
            					<select name="endDateMonth" id="endMonthdropdown"></select> 
            					<select name="endDateYear" id="endYeardropdown"></select>
					<p><label>City</label><input type="text" name="city" placeholder="Enter the city you worked in"></p>
					<p><label>Industry</label><input type="text" name="industry" placeholder="Enter the type of industry company is listed under"></p>
					<p><label>Description</label><input type="text" name="description" placeholder="Enter the job description"></p>
				<input type="radio" name="workhere" value="workhere" /> I currently work here <br>
				<input type="button" id="Work" value="Delete Work" />
				<input type="button" id="Work" value="Add Work" />
				</div>
			</form>
			<form id="skill-form" class="formblock hidden">
				<h4>Skills</h4>	
				<p><label>Relevant Skills</label><input type="text" name="skills" placeholder="Enter relevant skills"></p>
				<p><label>Relevant Expertise</label><input type="text" name="expertise" placeholder="Enter your relevant expertise"></p>
			</form>	
			
			<form id="addl-form" class="formblock hidden">
				<h4>Additional Information</h4>	
				<input type="button" id="addl" value="Add MoreInfo" />
				<div class="ed_fields">
					<p><label>Website URL</label><input type="text" name="website" placeholder="If relevant, enter your website URL"></p>
					<p><label>Interests</label><input type="text" name="interests" placeholder="Enter your interests and hobbies"></p>
					<p><label>Groups and Organizations</label><input type="text" name="groups" placeholder="Enter the organizations you are involved in"></p>
					<p><label>Languages</label><input type="text" name="languages" placeholder="Enter the languages you speak"></p>
				</div>	
			</form>
		</section><!-- @end #form -->
	</section><!-- @end #canvas -->
	
	<footer>
		<p>Resumate © 2013. All Rights Reserved.</p>
	</footer>

</body>
</html>
