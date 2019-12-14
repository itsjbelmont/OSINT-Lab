## CTFd Server Setup
---
The following is the approach we chose for setting up CTFd; there are several other ways to host including using docker.

1. Setup a VM with Ubuntu Server 18.04.3 LTS (see Step 0 of serverSetup.md)

1. Updated Server
  ```bash
  sudo apt-get update
  sudo apt-get upgrade
  sudo apt autoclean
  sudo apt autoremove
  ```
1. Install a desktop environment, vm guest integration support, and Firefox
  * This is the easiest way to access the admin setup page for CTFd server on localhost
  * To avoid getting all of the extra software along with the desktop use the --no-install-recommends flag

  ```bash
  sudo apt-get install ubuntu-desktop --no-install-recommends
  sudo apt-get install open-vm-tools open-vm-tools-desktop
  sudo apt-get install firefox
  reboot  # this is necessary so you can see the desktop
  ```

1. Cloned CTFd server from Github
  ```bash
  git clone https://github.com/CTFd/CTFd.git
  ```
1. Setup necessary software using the prepare.sh script (RECOMMENDED).

	Alternatively, you can follow the [Getting Started Guide](https://github.com/CTFd/CTFd/wiki/Getting-Started).
  ```bash
  cd CTFd
  ./prepare.sh
  ```

1. Launch CTFd server
  ```bash
  python serve.py
  ```
  * Note: by default this uses python2, if there is some reason perhaps revisit and try python3

1. CTFd server configuration
  * Visit http://localhost:4000 using Firefox
  * Register an admin user
  * Enter any username/password/email you want for the registration
  * Note: the default admin user was set for "admin@example.com" with password "jmpfEC521!"
1. Now the administrator panel should be accessible from the menu in the top left corner
  * CTF questions can be added and configuration changed to make the site accessible to others
1. (Optional) To import a saved CTFd:
  * Go to Admin > Config > Backup > Import
  * Our saved CTFd is under https://agile.bu.edu/bitbucket/projects/EC521FIN19/repos/group4/browse/ctfdConfig/

---
Continuing configuration, adding questions and making the server accessible

1. Using the Challenges tab on the site created an initial challenge
  * Remember that if you set points for hints, students actually have to have points to use them (not good on an initial question)
  * Make sure to set the visibility correctly for problems to be solved
  * Start and End times can be set under the configurations tab
1. Modifications to make the site visible externally
  * While not an ideal production setup, simply changing the ip address in serve.py makes the site accessible from the VM host
  * Change from:

  ```python2
  app.run(debug=True, threaded=True, host="127.0.0.1", port=4000)
  ```
  * To:

  ```python2
  app.run(debug=True, threaded=True, host="0.0.0.0", port=4000)
  ```
  * Tested by accessing the site on the VM guest from Firefox on the VM host computer
  * Can also access the site on the Ubuntu VM from the Kali VM (as long as a matching virtual network is set for both VMs in the VMware settings)
