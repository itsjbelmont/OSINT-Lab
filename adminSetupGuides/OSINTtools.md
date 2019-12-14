## OSINT tools

### the harvester

1. The harvester gathers emails and subdomain names from public sources.

We can use it to search google for tesla:
```bash
theharvester -d tesla.com -b google
```

The search returns:
```bash
[+] Emails found:
------------------
emdesk@tesla.com
nasales@tesla.com
zkirkhorn@tesla.com <------------------- CHA CHING!!! That's the CFO
accountsupportemea@tesla.com
customersupport@tesla.com
IR@tesla.com
```

2. We can also have the harvester look through linkedin

``` bash
theharvester -d tesla.com -b linkedin
```
to get the following results:
``` bash
Michelle Zhou - Global Supply Manager - Tesla Motors
Steve MacManus - Senior Director - Apple
Adam Hinze - Regional Manager - Tesla
... # results truncated

```

And we can make a csv to pull that information into Maltego
```#!/usr/bin/env bash
sed -i 's/ - /, /g' tesla_emails.txt
mv tesla_emails.txt tesla_emails.csv
```

### recon-ng

1.

First install hackertarget

``` bash
marketplace install hackertarget
modules load hackertarget
options set SOURCE tesla.com
run
```

And we can make a csv to pull that information into Maltego

``` bash
sed -i  's/\[\*\] \[host\]//g' tesla_domains.txt
sed -i 's/ (/, /g' tesla_domains.txt
sed -i 's/)//g' tesla_domains.txt
mv tesla_domains.txt tesla_domains.csv
```
