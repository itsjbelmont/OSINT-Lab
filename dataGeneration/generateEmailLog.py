# Create random "conversation" pairs of emails
# Select emails from people generated using generatePerson.py
import sys
from datetime import datetime
import random
import re

arguments = len(sys.argv) - 1

if arguments == 1:
	print("Using the users passed")
	numemails=2500 # default
elif arguments == 2:
	arg2=sys.argv[2]
	if arg2.isnumeric() == False:
		print("Number of emails passed is not numeric")
		sys.exit()
	numemails=int(arg2)
	print("Using the users and number of emails passed")
else:
	print("Make sure to pass the file to read in")
	sys.exit()

people=sys.argv[1]

if people.endswith("generated.csv"):
	time=people.replace("generated.csv","")
else:
	printf("Passed file does not end with generated.csv")
	sys.exit()

# Use time from file if it exists or select a new time if not
if re.match("^[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-$",time,flags=0):
	now=datetime.strptime(time,"%Y-%m-%d-%H-%M-%S-")
	random.seed(now)
	print("Using existing time for seed")
else:
	now=datetime.now()
	random.seed(now)
	time=now.strftime("%Y-%m-%d-%H-%M-%S-")
	print("Using new time for seed")

fileout=time+"emails.csv"

f = open(fileout,"w+",errors='ignore')

with open(people,'r',errors='ignore') as f1:
	people_l = f1.readlines()

emails=[]
for l in people_l:
	emails.append(l.split(' ')[2].rstrip()) # note, this relies on the third column being emails

for i in range(numemails):
	email1 = random.choice(emails)
	email2 = random.choice(emails)
	inbound = True
	for n in range(random.randint(1,5)):
		if inbound:
			f.write(email1+", "+email2+"\n")
		else:
			f.write(email2+", "+email1+"\n")
		inbound = not inbound

f.close();
