<?php
	session_start();
	if(isset($_GET['num'])) {
		try {
			$dbname = 'resumate';
			$user = 'root';
			$pass = '';
			$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
			$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			$err = "Error: " . $e->getMessage();
		}
		$select = $dbconn->prepare("SELECT xmlid, rid FROM resumes WHERE uid=:uid");
		$select->execute(array(":uid"=>$_SESSION['uid']));
		$result = $select->fetchAll();
		$xmlid = $result[$_GET['num']]['xmlid'];
		$rid = $result[$_GET['num']]['rid'];
		$load = simplexml_load_file("php/xml/".$xmlid.".xml");
	} else {
		$rid = 1;
		$load = simplexml_load_file("php/xml/0.xml");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('php/head.php'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="css/newresume.css">
	<script type="text/javascript" src="js/newresume.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
  	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>
<body>
	<?php
	function get_countries(){
		return array("AF" => "Afghanistan", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "IO" => "British Indian Ocean Territory", "BN" => "Brunei Darussalam", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo", "CD" => "Congo, the Democratic Republic of the", "CK" => "Cook Islands", "CR" => "Costa Rica", "CI" => "Cote D'Ivoire", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands (Malvinas)", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island and Mcdonald Islands", "VA" => "Holy See (Vatican City State)", "HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran, Islamic Republic of", "IQ" => "Iraq", "IE" => "Ireland", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KP" => "Korea, Democratic People's Republic of", "KR" => "Korea, Republic of", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Lao People's Democratic Republic", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libyan Arab Jamahiriya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macao", "MK" => "Macedonia, the Former Yugoslav Republic of", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "MX" => "Mexico", "FM" => "Micronesia, Federated States of", "MD" => "Moldova, Republic of", "MC" => "Monaco", "MN" => "Mongolia", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territory, Occupied", "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RU" => "Russian Federation", "RW" => "Rwanda", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa", "SM" => "San Marino", "ST" => "Sao Tome and Principe", "SA" => "Saudi Arabia", "SN" => "Senegal", "CS" => "Serbia and Montenegro", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and the South Sandwich Islands", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syrian Arab Republic", "TW" => "Taiwan, Province of China", "TJ" => "Tajikistan", "TZ" => "Tanzania, United Republic of", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States", "UM" => "United States Minor Outlying Islands", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VE" => "Venezuela", "VN" => "Viet Nam", "VG" => "Virgin Islands, British", "VI" => "Virgin Islands, U.s.", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe" );
	}
	?>
	<?php include('php/header.php'); ?>

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
			<?php if(isset($_GET['num'])): ?>
			<form method="POST" action="php/edit.php?num=<?php echo $_GET['num'] ?>">
			<?php else:?>
			<form method="POST" action="php/newResume.php">
			<?php endif; ?>
				<div id="basic-form" class="formblock">
					<p><label>First Name</label><input type="text" name="fname" placeholder="Enter First Name"				value="<?php echo $load->fname ?>" ></p>
					<p><label>Last Name</label><input type="text" name="lname" placeholder="Enter Last Name"				value="<?php echo $load->lname ?>" ></p>
					<p><label>Address Line 1</label><input type="text" name="address1" placeholder="Enter Address Line 1"	value="<?php echo $load->address1 ?>" ></p>
					<p><label>Address Line 2</label><input type="text" name="address2" placeholder="Enter Address Line 2"	value="<?php echo $load->address2 ?>" ></p>
					<p><label>City</label><input type="text" name="city" placeholder="Enter City"							value="<?php echo $load->city ?>" ></p>
					<p><label>State</label><input type="text" name="state" placeholder="Enter State"						value="<?php echo $load->state ?>" ></p>
					<p><label>Zip Code</label><input type="text" name="zip" placeholder="Enter Zip Code"					value="<?php echo $load->zip ?>"></p>
					<p><label>Phone</label><input type="tel" name="phone" placeholder="Enter Phone"							value="<?php echo $load->phone ?>"></p>
					<p><label>Email</label><input type="email" name="email" placeholder="Enter Email"						value="<?php echo $load->email ?>"></p>
					<p><label>Website</label><input type="url" name="website" placeholder="Enter Website URL"				value="<?php echo $load->website ?>"></p>
				</div>
				<div id="profile-form" class="formblock hidden">
					<p><label>Objective Statement</label><input type="text" name="obj" placeholder="Enter objective statement" 	value="<?php echo $load->obj ?>"></p>
					<p><label>Profile</label><textarea id="profile" name="profile" placeholder="Enter profile"					value="<?php echo $load->profile ?>"></textarea></p>	
				</div>
				<div id="education-form" class="formblock hidden">
					<div class="ed_fields">
						<?php foreach($load->schoolname as $i=>$value): ?>
						<p><label>Name</label><input type="text" name="schoolname[]" placeholder="Enter name of school"			value="<?php echo $load->schoolname[$i] ?>"></p>
						<p><label>City</label><input type="text" name="schoolcity[]" placeholder="Enter the city of school"		value="<?php echo $load->schoolcity[$i] ?>"></p>
						<p>
							<label>Country</label>
							<select name="schoolcountry[]" onchange="this.className=this.options[this.selectedIndex].className" class="selected">
								<option value="<?php echo $load->schoolcountry[$i] ?>">Choose the country</option>
								<?php foreach(get_countries() as $country_key => $country_name): ?>
									<option value="<?php echo $country_key; ?>"><?php echo $country_name; ?></option>
								<?php endforeach; ?>
							</select>
						</p>
						<p><label>Start Date</label><input name="schoolstartdate[]" type="text" id="startDatepicker" placeholder="Choose start date (MMYY)"						value="<?php echo $load->schoolstartdate[$i] ?>"/></p>
						<p><label>Graduation Date</label><input name="schoolenddate[] "type="text" id="endDatepicker" placeholder="Choose (Estimated) Graduation Date (MMYY)"	value="<?php echo $load->schoolenddate[$i] ?>"/></p>
						<p><label>Major</label><input type="text" name="maj[]" placeholder="Enter major if applicable"	value="<?php echo $load->maj[$i] ?>"></p>
						<p><label>Minor</label><input type="text" name="min[]" placeholder="Enter minor if applicable"	value="<?php echo $load->min[$i] ?>"></p>
						<p><label>GPA</label><input type="text" name="gpa[]" placeholder="Enter GPA"					value="<?php echo $load->gpa[$i] ?>"></p>
						<p><label>Relevant Course Work</label><input type="text" name="courses[]" placeholder="Enter relevant course work"	value="<?php echo $load->courses[$i] ?>"></p>
						<?php endforeach; ?>
					</div>
					<input type="button" id="addSchool" value="Add School" />
					<input type="button" id="deleteSchool" value="Delete School" />
				</div>
				<div id="work-form" class="formblock hidden">
					<h4>Work Information</h4>	
					<div class="w_fields">
						<?php foreach ($load->type as $i=>$value): ?>
						<p><label>Company</label><input type="text" name="type[]" placeholder="Enter Company Name"									value="<?php echo $load->type[$i] ?>"></p>
						<p><label>Job Title</label><input type="text" name="position[]" placeholder="Enter position held"							value="<?php echo $load->position[$i] ?>"></p>
						<p><label>Start Date</label><input type="text" name="workstartdate[]" id="startDatepicker" placeholder="Enter start date"	value="<?php echo $load->workstartdate[$i] ?>"/></p>
						<p><label>End Date</label><input type="text" name="workenddate[]"id="endDatepicker" placeholder="Enter end date"			value="<?php echo $load->workenddate[$i] ?>"/></p>
						<p><label>City</label><input type="text" name="workcity[]" placeholder="Enter the city you worked in"						value="<?php echo $load->workcity[$i] ?>"></p>
						<p><label>Description</label><input type="textarea" name="workdescription[]" placeholder="Enter the job description"		value="<?php echo $load->workdescription[$i] ?>"></p>
						<input type="radio" name="workhere" value="1" />I currently work here <br>
						<input type="button" id="deleteWork" value="Delete Work" />
						<input type="button" id="addWork" value="Add Work" />
						<?php endforeach; ?>
					</div>
				</div>
				<div id="skill-form" class="formblock hidden">
					<h4>Skills</h4>	
					<? foreach($load->skills as $i=>$value): ?>
					<li><label>Relevant Skills</label><input type="text" name="skills[]" placeholder="Enter relevant skills"				value="<?php echo $load->skills[$i] ?>"></li>
					<li><label>Relevant Expertise</label><input type="text" name="expertise[]" placeholder="Enter your relevant expertise"	value="<?php echo $load->expertise[$i] ?>"></li>
					<? endforeach; ?>
					<input type="button" id="addSkill" value="Add Skill" />
				</div>	
				
				<div id="addl-form" class="formblock hidden">
					<h4>Additional Information</h4>	
					<input type="button" id="addl" value="Add MoreInfo" />
					<div class="w_fields">
						<p><label>Website URL</label><input type="text" name="website" placeholder="If relevant, enter your website URL"					value="<?php echo $load->website ?>"></p>
						<p><label>Interests</label><input type="text" name="interests" placeholder="Enter your interests and hobbies"						value="<?php echo $load->intrests ?>"></p>
						<p><label>Groups and Organizations</label><input type="text" name="groups" placeholder="Enter the organizations you are involved in"value="<?php echo $load->groups ?>"></p>
						<p><label>Languages</label><input type="text" name="languages" placeholder="Enter the languages you speak"							value="<?php echo $load->languages ?>"></p>
					</div>	
				</div>
				<input type="number" name="rid" value="1">
				<input type="submit" value="Submit">
			</form>
		</section><!-- @end #form -->
	</section><!-- @end #canvas -->
	
	<footer>
		<p>Resumate © 2013. All Rights Reserved.</p>
	</footer>

</body>
</html>
