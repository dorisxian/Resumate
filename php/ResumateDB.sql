CREATE DATABASE resumate COLLATE utf8_unicode_ci;

USE resumate;

CREATE TABLE users (
	uid		int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	PRIMARY KEY(uid),
	email	VARCHAR(100),
	pword	VARCHAR(100),
	salt	VARCHAR(100)
);

CREATE TABLE styles (
	rid		smallint(3)	UNSIGNED AUTO_INCREMENT NOT NULL,
	PRIMARY KEY(rid),
	css		VARCHAR(10000)
);

CREATE TABLE resumes (
	xmlid	int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	PRIMARY KEY(xmlid),
	uid		int(10) UNSIGNED NOT NULL,
	FOREIGN KEY (uid) REFERENCES users(uid),
	rid		smallint(3)	UNSIGNED NOT NULL,
	FOREIGN KEY (rid) REFERENCES styles(rid)
);

INSERT INTO `styles` (`rid`, `css`) VALUES
(1, 'body {\r\n	margin: auto;\r\n	background: #FFF;\r\n	border: 5px #000 double;\r\n	padding: 20px;\r\n	width: 800px;\r\n	font-family: Georgia;\r\n	color: #000;\r\n	background: white;\r\n	font-size: 16px;\r\n}\r\nli{\r\n	list-style: none;\r\n	line-height: 24px;\r\n}\r\n.sectiontitle{\r\n	font-variant: small-caps;\r\n	color: #000;\r\n	font-size: 24px;\r\n	padding-bottom: 2px;\r\n}\r\n#header {\r\n	padding-bottom: 10px;\r\n	border-bottom: 5px solid #000;\r\n	text-align: center;\r\n\r\n}\r\n#header ul {\r\n	margin: 0;\r\n}\r\n#firstName, #lastName{\r\n	display: inline-block;\r\n	text-align: center;\r\n	margin: 10px 5px;\r\n}\r\n.fn{\r\n	font-size: 28px;\r\n	font-weight: bold;\r\n	padding-bottom: 20px;\r\n}\r\n#addressInfo li{\r\n	display: inline-block;\r\n}\r\n#email, #website {\r\n	color: #FF6600;\r\n	cursor: pointer;\r\n}\r\n#email:hover, #website:hover{\r\n	text-decoration: underline;\r\n}\r\n#profile li{\r\n	color: #000;\r\n	margin-bottom: 5px;\r\n	list-style: disc;\r\n}\r\n#education ul, #work ul, #addt-info ul {\r\n	padding-left: 0;\r\n}\r\n.sName, .sCity, .sCounty, .sStartDate, .sEndDate, .wStartDate, .wEndDate{\r\n	display: inline-block;\r\n}\r\n.sName, .wTitle{\r\n	margin-right: 15px;\r\n	color: #FF6600;\r\n}\r\n.sCity{\r\n	margin-left: 8px;\r\n}\r\n.dates{\r\n	float: right;\r\n	font-size: 12pt;\r\n	text-align: right;\r\n}\r\n.wCompany{\r\n	color: #303030;\r\n	font-weight: 600;\r\n}\r\n.job:not(:last-child){\r\n	border-bottom: 1px dashed #FF6600;\r\n	padding-bottom: 30px;\r\n	margin: 30px 0;\r\n}\r\n#objective, #education, #work, #skills {\r\n	border-bottom: 2px dotted #000;\r\n}\r\n#skills {\r\n	padding-top: 10px;\r\n	padding-bottom: 10px;\r\n}'),
(2, 'body{\r\n	font-family: ''Lusitana'', "Times New Roman", Georgia, Serif;\r\n	color: #2B2A27;\r\n	width: 85%;\r\n	margin: auto;\r\n	background: white;\r\n	font-size: 16px;\r\n}\r\n#inner{\r\n	padding: 35px;\r\n}\r\nli{\r\n	list-style: none;\r\n	line-height: 24px;\r\n}\r\nul{\r\n	padding-left: 0;\r\n}\r\n#header{\r\n	display: block;\r\n	text-align: center;\r\n	padding-bottom: 10px;\r\n	border-bottom: double 4px;\r\n}\r\n#firstName, #lastName{\r\n	display: inline-block;\r\n	margin: 10px 5px;\r\n}\r\n.fn{\r\n	font-weight: 700;\r\n	font-size: 50px;\r\n	font-variant: small-caps;\r\n	padding-bottom: 20px;\r\n}\r\n#header ul{\r\n	margin: 0;\r\n}\r\n#addressInfo li{\r\n	display: inline-block;\r\n}\r\n#email, #website{\r\n	color: #3C599C;\r\n	text-decoration: none;\r\n	cursor: pointer;\r\n}\r\n#email:hover, #website:hover{\r\n	text-decoration: underline;\r\n}\r\n.sName, .sCity, .sCounty, .sStartDate, .sEndDate, .wStartDate, .wEndDate{\r\n	display: inline-block;\r\n}\r\n.sName, .wTitle{\r\n	margin-right: 15px;\r\n	font-weight: 600;\r\n	color: #666666;\r\n}\r\n.sCity{\r\n	margin-left: 8px;\r\n}\r\n.dates{\r\n	float: right;\r\n	font-size: 12pt;\r\n	text-align: right;\r\n}\r\n.wCompany{\r\n	color: #666666;\r\n	font-weight: 300;\r\n}\r\n.job:not(:last-child){\r\n	border-bottom: 2px dotted #89867E;\r\n	padding-bottom: 30px;\r\n	margin: 30px 0;\r\n}\r\n'),
(3, 'body {\r\n	font-family: ''Lato'', Calibri, sans-serif;\r\n	color: #89867e;\r\n	width: 75%;\r\n	margin: auto;\r\n	background: white;\r\n	font-size: 16px;\r\n}\r\nli{\r\n	list-style: none;\r\n	line-height: 24px;\r\n}\r\n#inner{\r\n	background: #f9f9f9; \r\n	padding: 30px;\r\n}\r\n#header{\r\n	display: block;\r\n	text-align: center;\r\n}\r\n.sectiontitle{\r\n	color: #317ABB;\r\n	font-weight: 300;\r\n	font-size: 28px;\r\n	padding-bottom: 2px;\r\n	border-bottom: 1px solid #317ABB;\r\n}\r\n#header ul{\r\n	margin: 0;\r\n}\r\n#firstName, #lastName{\r\n	display: inline-block;\r\n	margin: 10px 5px;\r\n}\r\n.fn{\r\n	font-weight: 300;\r\n	font-size: 52px;\r\n	font-variant: small-caps;\r\n	color: #317ABB;\r\n	padding-bottom: 20px;\r\n}\r\n#addressInfo li{\r\n	display: inline-block;\r\n}\r\n#email, #website{\r\n	color: #459FD8;\r\n	text-decoration: none;\r\n	cursor: pointer;\r\n}\r\n#email:hover, #website:hover{\r\n	text-decoration: underline;\r\n}\r\n#profile li{\r\n	color: #666666;\r\n	margin-bottom: 5px;\r\n	font-weight: 600;\r\n	list-style: circle;\r\n}\r\n#education ul, #work ul{\r\n	padding-left: 0;\r\n}\r\n.sName, .sCity, .sCounty, .sStartDate, .sEndDate, .wStartDate, .wEndDate{\r\n	display: inline-block;\r\n}\r\n.sName, .wTitle{\r\n	margin-right: 15px;\r\n	font-weight: 600;\r\n	color: #666666;\r\n}\r\n.sCity{\r\n	margin-left: 8px;\r\n}\r\n.dates{\r\n	float: right;\r\n	font-size: 12pt;\r\n	text-align: right;\r\n}\r\n.wCompany{\r\n	color: #666666;\r\n	font-weight: 300;\r\n}\r\n.job:not(:last-child){\r\n	border-bottom: 2px dotted #89867E;\r\n	padding-bottom: 30px;\r\n	margin: 30px 0;\r\n}\r\n');
