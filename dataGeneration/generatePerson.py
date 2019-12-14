# Generate random First Name Last Name Pairs and matching email address
# Convention of first letter last name
# Data downloaded from: http://www.gutenberg.org/ebooks/3201
import sys
from datetime import datetime
import random

arguments = len(sys.argv) - 1

if arguments == 1:
	arg1=sys.argv[1]
	if arg1.isnumeric() == False:
		print("Number of users passed is not numeric")
		sys.exit()
	numpeople=int(arg1)
	print("Using the users passed")
else:
	numpeople=1000
	print("Using the default number of users")

now=datetime.now()
# Use now to seed random so that this is recreatable if needed
# Just remember to rename the file to not give away the seed...
random.seed(now)

timestr=now.strftime("%Y-%m-%d-%H-%M-%S-")
firstname_m="files/NAMES-M.TXT"
firstname_f="files/NAMES-F.TXT"
lastnames="files/NAMES.TXT"
domain="tesla.com"
fileout=timestr+"generated.csv"

f = open(fileout,'w+')

with open(firstname_m,'r',errors='ignore') as f1:
	lines_m = f1.readlines()

with open(firstname_f,'r',errors='ignore') as f2:
	lines_f = f2.readlines()

with open(lastnames,'r',errors='ignore') as f3:
	lines_l = f3.readlines()

# randomly select male and female names and last names and generate emails
for i in range(numpeople):
	flip = random.randint(0,1)

	if flip == 0:
		n1=random.choice(lines_m).rstrip()
	else:
		n1=random.choice(lines_f).rstrip()

	n2=random.choice(lines_l).rstrip()
	n3=n1[0]+n2+"@"+domain
	f.write(n1+", "+n2+", "+n3.lower()+"\n")

f.close();
