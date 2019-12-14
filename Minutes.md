## Meeting Minutes
---
#### 12/3/2019
###### Time: 8pm - 1am
###### Location: Photonics 305
* Pierre-Francois and Maha physically present, Jack remote presence
* Worked on custom tranforms
	* Pierre-Francois wrote a transform to idenfity email connections for a target from email log
    * Maha wrote a transform to run theharvester on multiple data sources and return emails matching a domain
* Made changes to CTFd server
	* Added more questions on custom transforms
	* Reassigned points for questions to better track progress
* Made changes to the lab VM
	* Added vpn certificate
    * Set it up to run on openvpn on boot
* Review and edited video presentation to fix mistakes
* Edited various readme files to fix mistakes and remove stale information
* Tested lab VM functions
	* checked that it boots correctly
    * checked that openvpn is run on setup
    * checked that servers launch correctly
* Tested lab server
	* made sure it could handle multiple users/sessions at once without unexpected behavior
* Tested custom Maltgeo transforms
	* teammates tried to replicate each other's steps to find points of failure
	* discovered issue with different theharvester versions that caused the transform to fail
    * fixed the transform code to be work with mutliple versions

---
#### 12/1/2019
###### Time: 12pm - 7pm
###### Location: Photonics 305
* Pierre-Francois and Maha physically present, Jack remote presence
* Addressed CTFd server questions
	* Added some questions
	* Improved hints and some answer flags
* Completed slides for video presentation
* Looked at some more improvements to potentially include for Maltego
* Recorded audio for video presentation
* Note: two commits accidentally under Maha's name authored by P-F on Dec 1 (CTFd additions)

---
#### 11/24/2019
###### Time: ~11:00am to ~6:00pm
###### Location: Photonics 305
* Group meeting with all members present
	* Reviewed all peer feedback and created todo list
	* Worked on draft of final report (with revision feedback)
	* Identified which revisions to address
	* Jack worked on making some improvements to the webserver
	* Started work on slides for video presentation

---
#### 11/12/2019
###### Time: ~11:00am to 2:00pm and 4:00pm to 12:00am
###### Location: Photonics 305
* All members worked collaboratively on the following tasks
	* Testing the lab, fixing bugs and rewriting CTF questions for clarity
	* Setting up the final VM to be shared with the class
		* Setting up VM in a shareable location
		* Configuring VM to launch servers when it boots
	* Updating all documentation (we have a lot)
	* Updating the final report
	* Final touches for submission!

---
#### 11/11/2019
###### Time: ~10:00am to 10:00pm
###### Location: Photonics 305
* Jack Belmont
	* Cleaned up minor errors with the login portal for the employees
	* Added information and cleaned up the website
	* Added more users to the websites database
	* Designed series of questions around h8mail and John the ripper
		* Created an email list and hid a few key emails
		* Created a breach compilation folder of email password-hash pairs.
			* Hid the key emails with a password hash in the breach files
		* If the user takes the email list on kpetersons home page and runs it against h8mail with the local breach file, it will return the hashes associated with the username which can be cracked by John The Ripper.
* Maha Ashour
	* Worked an email communication csv that when run through a data visualization software like maltego generated interesting patterns that can be used as flags and to guide the users through their CTFd questions.
		* Email network graph
	* Added CTFd questions to the CTFd site
		* Added OSINT challenges to CTFd
			* theharvester
			* metagoofil
* Pierre-Francois Wolfe
	* Worked on README clearity
	* Worked on script fixes for data generation
	* Created explanative documentation for the Instructor (setup guides) and for the Students (use guides)
	* More advanced maltego transforms
		* CTFd questions for basic custom transform
		* Work on more advanced custom transforms for later integration (Revised report?)


---
#### 11/10/2019
###### Time: ~10:00am to 7:30pm
###### Location: Photonics 305
* Jack Belmont
	* Finished functionality of the admin and employee proxies for login
    * Added forgot my password feature with fully functioning usage
    * Tested CTFd maltego questions to ensure their clarity
    	* Still some work needed for complete clarity
    * Still has some issues displaying images via the proxy
* Maha Ashour
	* Tested additional OSINT data collection tools (theHarvester, Metagoofil, recon-ng)
	* Searched for Tesla related information that could be scraped online using the tools above
	* Results of the above research and testing:
		* For metagoofil, determined it cannot be used to scrap data from our site since it relies on a google search to obtain the metadata
			* it can otherwise be used to obtain interesting documents & document metadata from other sites such as algorithmics.bu.edu
			* the results can be also obtained by doing a manual google search and specifying some search parameters, but then the files have to be individually downloaded and then the metadata needs to be scraped.
		* For theHarvester, used it search for information about tesla using multiple sources. Most promising were:
			* google search: returned email addresses of chief financial officer and chief legal counsel
			* linkedin search: returned a list of all tesla employees with public profiles
			* main problem is the replicability of these approaches since they rely on other sources like google which cannot be guaranteed to return the same result each time
	* Tested some data imports into Maltego using the results provided by the tools above
* Pierre-Francois Wolfe
	* Tested Introductory Maltego CTFd questions on Jack and Maha
	* Revised questions based on feedback
	* Improved Student and Instructor Guides for Maltego Introductory Questions
	* Tested several different visualizations of test data
		* Either to be hidden on the "tesla" site
		* Or to be retrieved with some other tool (Metagoofil? theHarvester?) and analyzed
	* More advanced transforms still to be incorporated with compelling data for lab

---
#### 11/09/2019
###### Time: ~11:00am to ~7:00pm
###### Location: Photonics 305
* Jack Belmont
	* Additional Features in website
		* How to maintain state when admin or employee logs in
			* Session variable
		* Restricting files so they can not be reached via URL. Employee must be logged in
			* Can do this for static HTML files 100% success
			* Issues arise when pages are dynamic and might require additional post or get requests.
		* Started working on the forgot my password flag feature
	* Tested CTFd question import
* Pierre-Francois Wolfe
	* Working on Student and Instructor lab guides
	* Generating passwords for incorporation into fake dataset in lab
	* Tested some transform ideas in Maltego
		* Integration with webscraper?
		* Connection to john or h8mail for password retrieval for specific targets?
	* Planning scenario/motivation
		* Idea: Elon had a call recently, the students are trying to find out who it was with
			* Depending on who it was, perhaps Elon was trying to mess with short traders?
			* Is there some other big news? New company direction or designs?
		* Potentially Finding information about someone with privilege (sysadmin?)
		* Then accessing further parts of the site with the information retrieved
		* Using information discovered be able to answer password recovery question...
		* Figure out who else to look at? Is someone (Elon) using an alias?

---
#### 11/08/2019
###### Time:
###### Location: Photonics 307
* Maha Ashour
	* Tested VM creation instructions
	* Tested website (apache2) setup instructions
	* Tested CTFd setup instruction
	* Improved documentation for repeatability
* Pierre-Francois Wolfe
	* Worked on randomized data generation for lab
	* Crafted some Malteo intro questions for CTFd
	* Tested additional features in Maltego
		* Created some simple Transforms
		* Planning transforms guide/problems for integration into the lab (harder questions)

---
#### 11/06/2019
###### Time: ~9:00am to ~9:30pm (with gaps for classes & food)
###### Location: Photonics 305
* Jack Belmont
	* Continued work on website for lab
		* Database integration for registration, login, logout
* Pierre-Francois Wolfe
	* Randomized data generation to create "users" for the lab
		* Inspired by [random-name](https://github.com/dominictarr/random-name.git) project on Github
		* Retrieved data directly from [Project Gutenberg](http://www.gutenberg.org/ebooks/3201)
		* Used some python to generate random first and last name pairs and matching email address
	* Testing data analysis in Maltego on some of these generated datasets

###### Time: 3:15pm to 3:30pm (15 minutes)
###### Location: Photonics 427
* Meeting with Prof. Trachtenberg
	* Discussed use of tutorial code when creating website for lab
		* Check for any restrictions on license (if available)
		* Ensure proper attribution in lab write-up
	* Some sites to note:
		* [tutorialrepublic](https://www.tutorialrepublic.com/terms-of-use.php)
			* "You are free to use the examples/code snippets for personal or commercial projects."
		* Make sure to note other sites where code is re-used in the future
		* Verify all material for fair-use if explicit license is not available
	* One recommended approach if we need a specific network topology is to nest multiple VMs
	* Another approach is to provide the configuration for the CTFd server and one VM with our site
		* Currently, this seems like the best approach for what we want to make available in our lab

---
#### 11/04/2019
###### Time 11:00am to 11:30am (30 minutes)
###### Location: Prof. Trachtenberg's office

* In attendance: Pierre Francois, Maha Ashour

* Discussion with professor about project progress

	* Maltego problems, and discussed ways to get around it
		* can't do a deep dive into Maltego for this lab
		* ok to add a few interesting challenges and focus on other tools

	* Webscraping is fine
		* no need to reinvent the wheel
		* think about exposing some ready made scraping tools
		* could be interesting depending on how it is set up
		* don't make it a web scraping lab

	* CTF server
		* important to have everything working for peer evaluation
		* download open source ctf software and set it up locally
		* export set up and send to professor 1-2 days (ideally) before deadline

	* Overall feedback
		* OSINT is very broad, be wary of scope creep
		* totally ok to come up with new challenges/tools/ideas as needed
		* just be ready to justify why we deviated from original plan
		* good idea to break it into: collecting data, processing data, analyzing data
		* have several pathways to get to a flag/answer

---
#### 11/02/2019
###### Time: 12:30pm to 8:00pm (7.5 hours)
###### Location: Photonics 305
* Jack Belmont
	* Attempted for find employee emails from real domain name websites using theHarvestor
		* Issues with openSSL configuration on the lab machines. More work required
			* As is, theHarvestor finds some emails, but it is inefficient because any site with ssl is not being read
	* Began development on the web server files - Currently have a landing page with some challenge flag ideas, but no dynamic web services
		* index.html
		* careers page
		* founder page
		* employee login page
* Maha Ashour
	* Created simple custom breach compilation for use with h8mail
		* Tested different h8mail search functionality on the custom breach compilation
	* Attempted to augment breach compilation by writing a python web scraper for PasteBin
		* Difficulties with webscraping without paid API for PasteBin
	* Challenge idea is for the user to reverse engineer a python bytecode file (.pyc)
		* Student should notice that the .pyc file is webscraping from PasteBin
		* Student should modify the reverse engineered file to scrape desired target on PasteBin and fix some minor bugs
		* Use newly scraped files to supplement the breach compilation file to get passwords
* Pierre-Francois Wolfe
	* Tested Maltego features on self and celebrity targets
		* Challenges with HaveIBeenPwned transform (API issues -> Purchase?)
		* Limitations with community edition may cause challenges with lab use
		* Paterva case study examples for data import ideas (Trump World Example)
			* Possibly make students develop transform in language of choice to retrieve specific parts of data
			* Use imported data to find important nodes leading to other data selection for furthering attack
* Collective Work
	* Discussed strategy for project completion/work roles for the coming week
	* Brainstormed ideas for chaining challenges together and making them more interesting
		* Considered and researched celebrity targets: Beto O'Rourke, Elon Musk
		* Decided on Tesla/Elon Musk target/theme
		* Discussed possible use of PasteBin with H8Mail
	* Set up an Ubuntu Server VM
	* Installed and configured Apache2
	* Wrote setup scripts for launching and running server
	* Set up script to manage/sync github server files into server /var/www/html directory

	* Started README.md and Minutes.md to keep track of our future and current progress
