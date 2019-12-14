## Generate Data
#### Random Users Generation
* Data downloaded from Project Gutenberg
* This is "Moby Word Lists" by Grady Ward

```bash
wget http://www.gutenberg.org/files/3201/files.zip
unzip files.zip
```
* Run generatePerson.py to create a generated.csv
  * Currently outputs FIRSTNAME, LASTNAME, EMAIL
* Run generateEmailLog.py to create a emails.csv
  * This creates pairs of emails from the generated.csv file
  * The generated file starts with a timestamp to make managing multiple files easier
* For hand crafted sets of people data (without a timestamp)
  * generateEmailLog.py will pick a new seed time and create emails

```bash
python3 generatePerson.py
python3 generateEmailLog.py generated.csv
```
* Data for Tesla Theme
  * Taking [board of director](https://ir.tesla.com/corporate-governance/board-of-directors) names
    * Elon Musk - emusk@tesla.com
    * Robyn M. Denholm - rdenholm@tesla.com
    * Ira Ehrenpreis - iehrenpreis@tesla.com
    * Larry Ellison - lellison@testla.com
    * Antonio J. Gracias - agracias@tesla.com
    * Steve Jurvetson - sjurvetson@tesla.com
    * James Murdoch - jmurdoch@testla.com
    * Kimbal Musk - kmusk@tesla.com
    * Kathleen Wilson-Thompson - kwilson-thompson@tesla.com
  * Create emails, perhaps in the same style
  * Create "hidden emails" that speak with specific people...
    * Maybe Elon has a hidden account under another name?
      * saigy@tesla.com is a 14 character Caesar Cipher of his email...
      * Or maybe something more complex (so that char number doesn't give it away)


---
#### To Import into Maltego
* Using the "Import Graph from Table" is the most basic option
* With the tables produced from this approach...
  * Select sequential connectivity
  * Make sure to label all of the columns with proper entities
  * Make sure to merge with current graph (if we are trying to combine datasets)

#### Some Possible Questions
* For a given dataset (currently emails)
  * Leaf-Nodes
    * Find how many there are...
    * Determine information about one of the specific leaf nodes
  * Data flow inspection
    * Neighbors, Children, Parents...
* Need to add more variation to the data being inspected...
  * Somehow create some nodes with large incoming/outgoing communication
* Generate passwords similarly to the user accounts
  * Perhaps use a list like rockyou but add some extra variation
    * We want hard and weak passwords
    * Perhaps add in some passwords manually...
* Other data...
  * Phone numbers or extensions (if work numbers)
  * Address
  * Desk/office number
  * Make some of this data only available if the website is compromised?
    * Store in sql database so that students have to retrieve it and inspect?
* Plan data on the website that requires students to:
  * Find out some information about links/individuals with Maltego
  * Retrieve data from website
  * Use h8mail to find specific accounts (of interest)
    * Then use john to crack passwords
    * If john is used on all of the data, make it so that there are too many accounts to brute force...
  * Have some real information that once found, can have Maltego transforms run to answer other questions...
* EXTRA CHALLENGE
  * Ask some harder questions that are based off a real dataset
  * Perhaps based on the Paterva case study using the "Trump World" dataset from BuzzFeed
  * Alternately, perhaps use the default example graph for some questions
