## Maltego Transform Guide
---
#### Following maltego-trx
* https://github.com/paterva/maltego-trx
* https://docs.maltego.com/support/solutions/articles/15000017605-writing-local-transforms-in-python
* How to create a Maltego Transform:

```bash
# Install the library
pip install maltego-trx
# Create a new project (ctf_transforms can be any other name)
maltego-trx start ctf_tranforms
cd ctf_transforms
# The following command will list all of the correct transform names for local Maltego use
python project.py list
```
* To run a transform locally, pass the following command:

```bash
# See Parameters bullet below
project.py local <transform_name>
```
* To setup in Maltego
  * Navigate to the "Transforms Tab"
  * Select "New Local Transform" and fill in the fields e.g.
    * Page 1
      * Display Name: GreetPerson
      * Description: maltego-trx example
      * Transform ID: GreetPerson
      * Author:
      * Input Entity Type: Person
      * Transform Set:
    * Page 2
      * Command: /usr/bin/python3
      * Parameters: project.py local GreetPerson
      * Working Directory: /root/Documents/Project/group4/ctf_tranforms
  * python project.py local GreetPerson
  
* To run custom transforms from CTFd 
  * Add your transforms to the same folder as GreetPerson.py
  * Follow the same steps in previous section for setting up GreetPerson but swapping in the correct file name
  * Make sure that any dependencies are installed
  	* You can figure out which dependencies or tools are needed by
    	a) inspecting the code, or 
        b) running the transform and checking debug/error logs
  * Make sure you are using python3

