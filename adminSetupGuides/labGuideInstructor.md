## OSINT Lab Guide for Instructor

#### Suggested Structure
* Students should be challenged to earn 50 points in a 20-30 minute lab session.

#### Introducing Some Tools
* Refer to the labGuideStudent document for some reference material on Maltego and other tools

#### "Maltego Setup" in CTFd
* Software Access?
  * Students need to register to use Maltego. The solution is the webpage for registration.
* Versions
  * There are 4 client versions of Maltego and Three server versions. Students should find this when looking at the website.
* Intro 0
  * After creating an account for Maltego and logging in, students need to open the example graph. This is accomplished through Main Menu -> Tools -> Open Example Graph
* Intro 1
  * The root Maltego entity in this example is a "Domain" node
* Intro 2
  * The "maltego" phrase entity can be identified by color or shape after looking at the entity pallet on the left sidebar or seeing the reference key on the graph when zoomed out sufficiently. After finding this, looking at the child nodes and exploring their details (right side bar) will reveal that they were created with "To Website [using Search Engine]"
* Intro 3
  * This question should make students think about what makes a result interesting. In this case, the transform returns websites with a weight value. Looking through the different children coming from the "maltego" phrase they should identify that the child node with the largest weight is "docs.maltog.com" with the value 279
* Intro 4
  * In the Maltego terminology, multiple transforms used together in a macro are machine(s)
* Intro 5
  * Students should try out the tools in the "Investigate" tab and discover that "Add Path" will select all the nodes along the shortest path between two entities. These can then either be counted manually or the value shown in the very bottom right corner of Maltego will show how many entities are currently selected out of all the entities in a graph
* Intro 6
  * Running the "Mirror: Email Addresses Found" transform on website entity "www.maltego.com" will among other results produce the email "howard.johnson@mail.com"
* Intro 7
  * Looking at the "Info" section of the "Detail" view when email entity "howard.johnson@mail.com" is selected will reveal a number of source pages where the name was found. These can be visited and the student will realize that this name was actully part of the email placeholder. They should use any of the URLs and answer that "NO" this person is not particularly interesting

#### "Maltego Transform" in CTFd
* Transform 0
  * When using python3, use pip3 to install maltego-trx otherwise use pip
* Transform 1
  * The student should examine the example python transform and determine that the entities are "person" and "phrase"
* Transform 2
  * The entire command to be run is "python3 project.py local GreetPerson" so the parameters should be easily obtainable by the student (They must enter then into a specific box in Maltego)
* Transform 3
  * The students can either find this by running the transform on the default entity or by reading the message in the example transform and knowing the default name of the person entity in Maltego (and crafting the phrase manually)
* Harvesting
  * The students have to look at the code to see which tool it is running. 
  * Note: This transform takes a Maltego domain entity as input and runs theharvester multiple times with different data sources (Google, Bing) and then looks through the combined results to find any email addresses related to that domain. The output is a graph with all the email addresses that were exposed in the search
* More Harvesting
  * The students can inspect the code to identify the correct data structure. They do not have to run the transform to complete this part.
 
#### "Information Gathering" in CTFd
* Harvesting Connections
  * The simplest command to use theharvester to search linkedin for tesla.com relies on the "-d" and the "-b" flags for domain of interest and the search source to use
* Metagoofy
  * The fact that metagoofil uses google can be found with a simple search online or by looking at the tools documentation
* Forgotten Files
  * Using metagoofil which was previously introduced, students are able to search the algorithmics website and find a file from a past class that is visible (but not easy to find by hand)

#### "Corporate Hacking" in CTFd
* Unhelpful Desk
  * It is possible to enter the helpdesk account by using the "Forgot your password?" link and answering the question (The name of the IT guy is on the home page) once in the account, an email log is visible and can be downloaded and the name used to answer this question.
* Welcome intern
  * There is a welcome message for an intern on the home page. By guessing a correct email format for him, the students can discover the flag (kpeterson@tesla.com)
* MVP
  * Importing the data discovered in "Unhelpful Desk" into Maltego (and being careful to not condense multiple links into a single link) it is then possible to see which email has the most traffic (helpdesk@tesla.com)
* Incoming
  * Students can use information on the site to determine who the CFO is and then examine the information in Maltego to determine the number of incoming emails he has received
* Which Musk
  * There is a quick search option in Maltego that can be used to look for specific nodes (searching for musk would work here). Alternately, finding Elon Musk and looking at his connections is another viable approach
* Breach
  * Here, a breach file is provided and h8mail can be used to search for emails. It is probably best to use the contacts list retrieved from kepeterson to search for compromised accounts. Then, known executives can be identified from the results returned
* Contacts
  * The contacts.txt file can be obtained from kpeterson after guessing the solution to his "forgotten password" question (it involves the license plate in a picture of one of Elon Musk's cars on the site)
* More h8
  * One of the emails that was found with h8mail should be skim@tesla.com it should be trivial for a student to find that she is HR Manager from the website
* Family comes first
  * While easy to figure out the role for skim@tesla.com in the "More h8" question, even without h8mail, correctly using h8mail makes it easy to find a hash for a compromised password she has. Using john to crack this password (using the rockyou.txt list) should provide a result
* Help Desk
  * The answer is visible from the home page (helpdesk@tesla.com)
* Password?
  * Students can attempt logging in with any incorrect username or password combination and a link with the flag text will appear below
* More Vulnerabilites?
  * Students should successfully install the haveibeenpwned transform and run it on emusk@tesla.com. At this time the target is involved in one breach only.
* Compromised
  * Students can use the "Add Neighbors" feature in Maltego and then run the haveibeenpwned transform. Alternatively they can run the transform for each person emusk@tesla.com corresponds with by examining the graph. The "List view" can be helpful as an alternative way of examining the data. 
* Custom Transform
  * The students have to look at the code to see the name of the file being read by the csv 
  * Note: this transform takes a Maltego email entity as input and looks through a csv email log to find all connections for the target entity. The output is a graph with all email entities and showing the connections to the target (including direction of the correspondence). The csv provided consists of email pairs of the form <senderEmail, receiverEmail> , each on a new line.  
