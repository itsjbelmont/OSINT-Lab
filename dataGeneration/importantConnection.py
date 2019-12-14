# Create important email connections for Maltego analysis
# Select emails from people generated using generatePerson.py
# Inputs : List of emails
# Outputs: List of email pairs representing email traffic

import sys
from datetime import datetime
import random
import re

arguments = len(sys.argv) - 1

if arguments == 1:
	print("Using the users passed")
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

fileout=time+"extra-emails.csv"

f = open(fileout,"w+",errors='ignore')

with open(people,'r',errors='ignore') as f1:
	people_l = f1.readlines()

emails=[]
for l in people_l:
	emails.append(l.split(' ')[2].rstrip()) # note, this relies on the third column being emails

for i in range(random.randint(30,50)):
	email1 = "skim@tesla.com"
	email2 = random.choice(emails)
	inbound = True
	for n in range(random.randint(1,5)):
		if inbound:
			f.write(email1+", "+email2+"\n")
		else:
			f.write(email2+", "+email1+"\n")
		inbound = not inbound

for i in range(random.randint(5,10)):
	email1 = "emusk@tesla.com"
	email2 = random.choice(emails)
	inbound = True
	for n in range(random.randint(20,50)):
		if inbound:
			f.write(email1+", "+email2+"\n")
		else:
			f.write(email2+", "+email1+"\n")
		inbound = not inbound

for i in range(random.randint(50,100)):
	email1 = "helpdesk@tesla.com"
	email2 = random.choice(emails)
	inbound = True
	for n in range(random.randint(5,20)):
		if inbound:
			f.write(email1+", "+email2+"\n")
		else:
			f.write(email2+", "+email1+"\n")
		inbound = not inbound

email1 = "zkirkhorn@tesla.com"
email2 = "kPeterson@tesla.com"
inbound = True
for n in range(128):
	f.write(email1+", "+email2+"\n")


email1 = "kPeterson@tesla.com"
email2 = "zkirkhorn@tesla.com"
inbound = True
for n in range(653):
	f.write(email1+", "+email2+"\n")


email1 = "emusk@tesla.com"
email2 = "zkirkhorn@tesla.com"
inbound = True
for n in range(13):
	if inbound:
		f.write(email1+", "+email2+"\n")
	else:
		f.write(email2+", "+email1+"\n")
	inbound = not inbound


email1 = "emusk@tesla.com"
email2 = "kmusk@tesla.com"
inbound = True
for n in range(187):
	if inbound:
		f.write(email1+", "+email2+"\n")
	else:
		f.write(email2+", "+email1+"\n")
	inbound = not inbound

f.close();
