---------------------------------------------COREY----------------------------------------------

Hey all!

just thought I'd update you on what's going on and how to make all this work

First, take ResumateDB.txt, and query your local host with it. This will create an 
empty copy of the database on your end. 

Second, understand how to call the database functions to use them:
 -- Post the form from NewResume.php to newResume.php (NOT NewResume.php) (note the capital N, 
lowercase names on php files are /functions/ and uppercaseare /pages/) and the rest is handled 
for you! The users data is saved, and the database is altered.
 -- To load a resume, simply post with name='num' to resume.php which resume you want from a 
list of all resumes (its in an array, i. e. posting 0 will return the first resume a user submited,
posting 1 will return the second, ect.) This is based of the session cookie, so its based of 
the user's id number (if this is confusing, imagine I have a collection of all the resumes user a
submitted, and I post to resume.php 2, I will be returned the html for that users 3rd resume)
 -- fetchResumes will give you a php function which has all the styles a user has picked for 
his resumes, in order those resumes were created. My thought process was this would allow use to 
thumbnail their resumes to allow them to pick one.

I restructed the NewResumes page, it doesnt affect and styling or logic wise. Where should I land
the uer after they;ve sumbitted the information? I think they're should be a page where user
can see a list of resumes. Also you'll notice the unsightly number input and submit button at the 
bottom. Thats for the resume id, and form submission, itll take you into the inner workings of the 
sight, but that can be fixed easily.


What I need: 
I changed the post methods to be with [] so it returns an array of the objects with identical names,
so I could work with it easier

-------------------------------------------------------------------------------------------------





-------

(Rob)
Other changes to make:
-header change to "logout" instead of "login/signup" when a user is logged in
	-- I have this on my version
-The Contact Us page requires mail server functionality (need to add it to local machines)
-add "reply to my email" checkbox
