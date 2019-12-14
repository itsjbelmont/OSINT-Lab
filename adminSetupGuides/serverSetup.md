# Server Setup

---*Skip step 0 if you do not need to set up a VM for the server*---


0. Set up a VM using VMware
   * Download [VMware Workstation Pro](https://my.vmware.com/en/web/vmware/info/slug/desktop_end_user_computing/vmware_workstation_pro/15_0). We're using the following version:
      * VMware Workstation 15 Pro
      * 15.1.0 build-13591040
   * Download the Ubuntu Server 18.04.3 LTS [image](https://ubuntu.com/download/server)
   * Set up a VM using VMware Workstation
      * File > New Virtual Machine...
      * Select "Typical" and click next
      * Select "use ISO image" and select the image you downloaded in the previous step
      * use any username/password combination you want
      * follow default options for remaining steps
   * Set up Ubuntu
      * Continue with default settings except until prompted to select username
      * Enter "group4ctf" as server name
      * Enter "group4" as username
      * Select any password you like
      * Check the OpenSSH option and continue with default options
      * Select "reboot" to launch the VM
      * Login with the username and password you created

1. Set up apache
```bash
    $ sudo apt-get install apache2
```
1. Allow the use of .htaccess
```bash
    $ sudo service apache2 stop
    $ sudo vim /etc/apache2/apache2.conf
    # Look for part of file that is:
    #	<Directory /var/www/>
    #    	Options Indexes FollowSymLinks
    #    	AllowOverride None
    #   	Require all granted
    #	</Directory>

    # Change 'AllowOverride None' to 'AllowOverride All'
    $ sudo service apache2 restart
```
1. Set up SQL Server and enter the values below at the prompts
```bash
    $ sudo apt-get install mysql-server
    $ sudo /usr/bin/mysql_secure_installation
```
  * Prompts:
    * VALIDATE PASSWORD PLUGIN: no
    * Enter password for user root: jmpfEC521
    * Remove anonymous users? yes
    * Disallow root login remotely? no
        * This should be dissalowed for security reasons
    * Remove test database and access to it? yes
    * Reload privilege tables now? yes
1. The following steps will allow mysql login without using sudo
```bash
    $ sudo mysql -u root
    mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'jmpfEC521';
    mysql> quit;
    $ sudo service mysql restart
    $ sudo apt-get install php libapache2-mod-php
    $ sudo apt-get install php-mysql
    $ sudo /etc/init.d/apache2 restart
    $ mysql -u root -p
    # Enter password: jmpfEC521
    mysql> CREATE USER 'admin'@'localhost' IDENTIFIED BY 'adminEC521';
    mysql> GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';
    mysql> flush privileges;
    mysql> quit;  
```
1. Install php on the server
```bash
    $ sudo apt-get install php
```

1. Clone the github repository for this lab to get access to the web files
```bash
    $ cd ~
    $ git clone https://agile.bu.edu/bitbucket/scm/ec521fin19/group4.git
```
1. There is a script in the cloned directoy that will copy over all of the web server files into the apache folder. We now need to run that script
```bash
    $ cd group4 #This is the directory that got cloned
    $ ./copyToWebsite
```

1. Next we should initialize the SQL database so that there is functionality on the website
```bash
    # if this is not your first time initializing the database 
    # and the goal is to reset the database instead, then open
    # up the employeesDatabase.sql and uncomment the first line
    $ cat employeesDatabase.sql | mysql -u root -p
    Password: jmpfEC521
```

1. Finaly restart the apache service
```bash
    sudo service apache2 restart
```

