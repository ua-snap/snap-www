# SNAP web site development

These directions give an overview of the site's major components and how to set up and use a development environment.

## Creating development environment

### Getting virtual machine working

 1. Download and install Vagrant.
 1. Download and install VirtualBox.
 1. Obtain and unzip the "vagrant-snapwww.zip" file from the tech team.
 1. Open a terminal session, navigate to the directory you just unzipped.  We'll call this directory "the snapwww vagrant directory".
 1. Build & start the VM: ```vagrant up```
 1. Wait a while (10-30 minutes).  It's going to download a VM and configure it for you.  When it's done...
 1. Connect to the instance: ```vagrant ssh```
 1. Verify you get a new terminal prompt, then exit by typing: exit
 1. Stop the VM with: ```vagrant halt```

The VM is now set up with PHP/Apache/MySQL.  A few things to know:
vagrant creates shared folders between the host OS and the VM in the directory where you ran ```vagrant up```.  so you can copy files there, edit files, etc, without having to fuss with SSH/SCP.  Vagrant takes care of most of the network hoo-haw so you can access the site after only a little bit more configuration (below).

### Setting up SNAP web site

 1. Open terminal, navigate to the snapwww vagrant directory.
 1. Clear the placeholder directory where the source code will go: ```rmdir snap-www```
 1. Get the source code installed:  ```git clone https://github.com/ua-snap/snap-www.git```
 1. Create and update the config file for the site: ```cp snap-www/src/Config.php.example snap-www/src/Config.php```
 1. Edit the src/Config.php file and change the database info to: username=snapwww, password=snapwww, database=snapwww
 1. Configure your computer to see the site in a nice way
    * Add the hostname for the local dev site to your computer: ```sudo nano /etc/hosts```
    * Add a line at the bottom: ```192.168.56.101 www.snap-www.dev snap-www.dev```
    * Save and exit that file: ```control-o```
 1. Load the database
    * Download the snapwww.zip file attached to this email, unzip it and copy the snapwww.sql file to the snapwww vagrant folder.
    * Start the VM: ```vagrant up```
    * Connect to the VM: ```vagrant ssh```
    * In that new terminal, load the database: ```mysql -u snapwww -p snapwww < /var/www/snapwww.sql```
    * When prompted, enter password 'snapwww'

Everything should be working.  Try it out by opening a browser and going to: http://www.snap-www.dev/

Notes/caveats:

 * It's expected there will be some errors, missing pictures, etc on various pages; some functionality (particularly in the community charts exports) may not work without further configuration.  The errors we can clean up (the VM is configured to have somewhat more aggressive error reporting than the production server), missing pictures aren't an issue.
 * We used [PuPHPet to basically](https://puphpet.com/) make the whole configuration file.  Awesome tool.

## Overview of layout & common maintenance tasks

The SNAP web site is a PHP/MySQL application, with static content coded in standalone PHP files and dynamic content stored in the database.  Below, the different code and content areas are outlined, along with common maintenance tasks.

### Static content

The top level directory of the repostiory has a number of ```.php``` files that contain most of the content seen on various pages on the site.

 * Content inside these pages can be edited simply by updating the relevant HTML, with the various CSS dwelling in the top-level ```css``` directory.
 * The page template is split into two areas: most of the HTML for the template is in the top-level ```template.php``` file, and some additional functionality (menus and javascript/CSS inclusions) are in the ```src/Template.php``` file.
 * Images that are directly referenced from source code (```img``` tags and the like) should be checked into source control, and should be put in the ```images``` directory.

### Dynamic content

The site content that is database-driven is mainly the *projects*, *resources*, and *people* sections.  Content in these areas should be edited by connecting to the database and updating the relevant tables.

 * Most HTML/markup for database content is generated by scripts in the ```src/``` directory.
 * Files and Images referenced from the database should *not* be put into source control, and instead should be directly deployed on the production server in the ```images``` or ```attachments``` folders.
 * Relational connections between entities in the database (usually, projects/attachments/people/resources) is pretty straightforward, but ask the team if you have questions.
 * Inline HTML should be OK in the database, even though it makes us weep a little bit.  It may be being filtered in some spots, so test locally before updating production database.

### Application content

Two areas of the site&mdash;map tool and community charts&mdash;are more application&ndash;like in nature than the other areas of the site, meaning that there's a lot more code happening around areas where content may need to be updated.  Check with the team before updating content in these areas if you're unsure how to proceed.