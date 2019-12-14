# Peer Review Summary

## Drew Boodhan

* Operation
  * Had trouble booting the VM, realized all files had not yet been copied over
    * Maybe we can have a command that verifies when everything is copied? Or just provide a reminder to check?
  * The path & file (*.vmx) do not exactly match the real path in the instructions
    * Hopefully we can get the exact path for the final, otherwise we should make it even clearer that this path will need to be slightly modified...
* Results
  * Most interesting
    * "real life, practice material"
      * Maybe he didn't realize that lots of our data was generated for the lab?
  * Least interesting
    * VM setup
      * Suggested potentially adding some CTF flags as a reward for successful setup
  * Problematic
    * "home terminal command wasnt working for me"

## Ashley Cui

* Operation
  * Easy operation and good user experience. Liked having the instructor guide too.
* Results
  * Most interesting
    * Enjoyed the tools: Maltego, metagoofil, etc.
    * More introduction to web scraping would be helpful (how the tools work and how links are displayed in Maltego)
  * Least interesting
    * Corporate Hacking had questions that didn't have to do with the tools introduced
      * Provide data right away instead of making students collect it from the website?
  * Problematic
    * Provide clearer instructions on how to install the transform library and complete setup
    * Don't hide the 'forgot your password' otherwise it's too easy a target to miss
    * CTF is too long for target timespan
      * Mostly as a result of the webpage... maybe de-emphasize?
      * We need to clearly express what should be accomplished in class and what is good to work on outside of class...

## Ethan McIlhenny

* Operation
  * Was able to configure the VM and most CTF challenges using labGuideStudent.md
    * Minor path discrepancies to be fixed
  * labGuideInstructor.md was useful when stuck or to verify solutions
* Results
  * Most interesting
    * Enjoyed "Corporate Hacking" section especially exploring the website for hints
    * Had issues with importing csv file into Maltego causing VM to freeze
      * Potentially imported the file without commas? Maybe picked wrong import settings?
  * Least interesting
    * Maltego Transform section in CTF does not lead anywhere
      * More relatable example with data and output
      * Better explanation of the python code...
      * Potentially provide an interesting transform and craft questions that require reverse engineering to explain it...
  * Problematic
    * Provide more exact answers in the labGuideInstructor
      * Okay, initially we avoided this so that student reviewers couldn't just use those answers but we can add in the exact answers from the CTF
    * Trouble saving the csv file after logging into the helpdesk account (no right click option)
    * Tools aside from Maltego (metagoofil, theharvester, h8mail) are not well introduced

## Harshavardhan Ogoti

* Operation
  * Had trouble accessing bitbucket but this was fixed 11/14/19
  * Modified path for vmrun getGuestIPAddress command
* Results
  * Most interesting
    * metagoofil and theharvester were interesting tools
    * README and maltego tutorial were interesting
  * Least interesting
    * Found everything interesting, good tool to question correlation
  * Problematic
    * Nothing too problematic
    * Potentially clearer description of CTF flag answer format
      * Potentially make some of the flags more flexible (especially the url ones)

## Hongyu Pan

* Operation
  * Was able to run the VM and access with Kali
  * Liked the vmrun getGuestIPAddress command
* Results
  * Most interesting
    * Enjoyed exploring the email data, hadn't experienced working with "large" data sets such as this before
    * Information gathering is interesting, would be even better with more connection to Maltego
    * Use more existing Maltego tranforms... potentially haveibeenpwned.com questions?
  * Least interesting
    * Information Gathering section not interesting, can be done with Google
    * Maybe use Maltego transforms for information gathering?
    * Current website can be searched manually (and questions answered that way)
      * This makes it less interesting (does not emphasize Maltego enough)
  * Problematic
    * Specify more clearly that Maltgo CE version is needed
      * Potentially say: "what is the sender of the Maltego CE Account Confirmation email"
    * Rephrase "Into 4" question, would have thought it was a "script"
    * "Intro 7" has three answers potentially
      * I believe these are all valid options in the CTF but check
      * Suggests splitting YES/NO portion of this question into its own flag
    * Contacts vs contacts.txt (only txt one is the solution)
      * We should maybe allow both, explain better, or do something else
    * Move "hints" into description for some questions?
    * Change some of the flags since they were available to students?
    * Mention that the example transform is located in the new project in relevant question
    * Merge maltegoTransformGuide.md into primary instructions
    * OSINTtools.md indicates that some of the data can be found off the local website
      * We need to clarify where students should be looking and potentially merge/eliminate this file
    * MySQL is not that useful for this lab (could use file storage) but doesn't hurt to have it.
    * Remove the installation cds from VM (since they are not accessible)

## Chenjie Zhao

* Operation
  * Couldn't access CTF server
* Results
  * Most interesting
    * Enjoyed Corporate Hacking but would like more advanced scenarios
  * Least interesting
    * Was not able to access the CTF server
  * Problematic

## Yaying Zheng

* Blank Review
