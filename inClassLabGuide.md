## Student Guide For In Class Lab
*Authors: Maha Ashour, Jack Belmont, Pierre-Francois Wolfe*

### Overview
This lab will focus on providing a better understanding of how OSINT can be used to exploit non-technical vulnerabilities. Concepts such as contact analysis and exploiting "forgot my password" features will be explored.


You will be using tools such as the following:
* [h8mail](https://github.com/khast3x/h8mail)
    * Helps with finding breached email accounts
    * Install with: ```$ pip3 install h8mail```
* [maltego](https://www.paterva.com/)
    * Link analysis for pattern finding
* [metagoofil](https://tools.kali.org/information-gathering/metagoofil)
    * Extract document metadata for a domain
* [theharvester](https://tools.kali.org/information-gathering/theharvester)
    * Email collection


You can find more information that we have prepared in [this document.](./studentGuides/labGuideStudent.md)

### Getting up and running
This lab will be up and running on the class' server. Connect to the VPN, the server will be located at "10.8.0.3"

In your Kali Linux VM you can:
* access the lab server by navigating to 10.8.0.3:80
* access the CTFd server by navigating to https://agile.bu.edu:8421

~ Note that some information can be found via the word wide web rather than our server. You will need to toggle the vpn on and off to access the internet ~

---

### CTFd Sections

#### "Maltego Setup and Maltego Intro" in CTFd
These are some more approachable questions that will help to provide some familiarity with using specific tools in the OSINT cycle. Completing these questions will provide the background needed when exploring the scenario ahead. For questions on the CTFd site, flags will be entered in the format ```%OSINT{"<flag>"}%```
* Maltego (Data Analysis)
  * CTFd label: Maltego Setup
    * You need to make sure that you can run the software
    * Try to find out some information about it while setting up
  * CTFd label: Maltego Intro
    * Some simple questions about sample data to help gain familiarity

##### "Maltego Transform" in CTFd
These questions are answerable as you work through creating your first transform in Maltego. This lab will focus on using Paterva's [maltego-trx](https://github.com/paterva/maltego-trx) library for python. Either python or python3 should work but we will be using python3 for consistency. Read the instructions on the git repo if you want additional detail while working through this section.
* Install the library (using pip3 instead of pip for python3...look at the maltego-trx repository if you don't know what command to use)
* Create a new project where you will keep your transforms (you can pick any name, not just "new_project" as given in the example on the git repo page)
* There are two examples provided. Let's look at the GreetPerson.py transform
* After reading the brief code work on importing the GreetPerson transform into Maltego
  * Navigate to the "Transforms" tab and select "New Local Transform"
  * Enter the data needed to call the transform
  * Test the transform on an appropriate entity (drag and drop a default entity of the correct type into a graph in Maltego)

##### "Information Gathering" in CTFd
* Some tools that will be used in this section include
  * metagoofil
  * theharvester
* If they are missing from Kali, they should be installed using ```apt-get install _______```

##### "Corporate Hacking" in CTFd
* Explore the website served on port 80
* Use the tools previously explored in other sections to solve the questions
* Note, h8mail is introduced in this section as well
* A few other tools introduced in class may be of use while completing these problems
* Most important will be critical thinking about the information gathered...
