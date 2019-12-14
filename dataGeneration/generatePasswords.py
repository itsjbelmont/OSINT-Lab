# Generate passwords for list of users
import sys
from datetime import datetime
import random
import crypt

arguments = len(sys.argv) - 1

if arguments == 0:
    print("Creating the default number of passwords")
    numpass=100 # default
elif arguments == 1:
    arg1=sys.argv[1]
    if arg1.isnumeric() == False:
        print("Number of passwords is not numeric")
        sys.exit()
    else:
        numpass=int(arg1)
        print("Using the number of passwords specified")
else:
    print("Make sure to pass no argument or an integer")
    sys.exit()

# Initialize random seed
now=datetime.now()
random.seed(now)
time=now.strftime("%Y-%m-%d-%H-%M-%S-")

# Using rockyou.txt from standard location in Kali
input = "/usr/share/wordlists/rockyou.txt"
output = "password_hash.csv"
method = crypt.METHOD_MD5 #crypt.METHOD_SHA512 <- this could make things take too long...

f = open(time+output,"w+")

with open(input,'r',errors='ignore') as f1:
    password_list = f1.readlines()

for i in range(numpass):
    # randomly pick a word
    passw = random.choice(password_list).rstrip()
    # randomly decide to rotate or note
    flip = random.randint(0,1)
    if flip == 0:
        # if rotating, decide by how many characters
        r = random.randint(0,len(passw)-1)
        passw2 = passw[-r:] + passw[:-r]
    else:
        passw2 = passw
    # hash the password
    hash = crypt.crypt(passw,crypt.mksalt(method))
    f.write(passw+":"+passw2+":"+hash+"\n")

f.close()
