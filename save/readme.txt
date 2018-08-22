=== GIU Gallery File Upload ===
Author: Larry Judd Oliver
Author URL: http://tradesouthwest.com

You are using a GPL2 licensed version. Feel free to copy or alter. Leave the link to Tradesouthwest in at least one page. 
Custom Templates and addons are encouraged. 

== Description ==
GIU is mostly a tool to manage the upload of images as well as manage output of images and data to a template system. Output and stored data will be path to image, title of link, link to image, alternative text to image and storyline text. Controls and options such as image width and height plus some template features to control are available in the Controls Panel.

GIU is Open Source and I welcome the community to add to this project.

The ideology of GIU is to provide a simple use application for end users as well as a robust control panel with adequate administrative operations. Folder structures are setup so the public view is in a directory (root or sub directory) and the administrative tasks login is at "yoursite-path.com/gallery/index.php".

There are lots of controls for the image itself in GIU. The size and position of you image is very important so the Control Panel will give you options to put the image on your page just how you want it. As a theme builder you can add options of you own that will manipulate parts of your theme. the default install has control options to: 
* set number of images per row
* set image width
* set margins between image boxes
* set font size of captions
* set the content width of the gallery's page.

Features:
* MySQLi, PHP and HTML5
* upload your image into a directory
* save the file path into the database
* save a caption and an alt text into the database
* stamp the time of upload into db for your convenience
* add a storyline to photo, viewable on image page
* get the url of the file
* wrap the image in an anchor so you can open the image (modal or view mode that you can configure)
* display the caption
* parse the alt text for image
* parse the title text of the anchor
* display controls and options to manage files/images
    delete, list, count, new theme, priority....
* login and logout of admin
* show all images on a quick-view page
* list all images in a table to get info or delete.
* HTML5 grid system to admin and templates.
* simple modal connected to public viewers (Slimbox)
* security functions to callback on every dataset

Minimum requirements are PHP5, MySQL, PHPMyAdmin (or equivalent).

== Instructions ==
1. - Create a database and install the database Tables that are in file "include/giu-tables.txt."
2. - Enter your database parameters into files "include/config.php" to connect to database.
2.5 - Enter your url settings into Options+Controls page of admin to create image paths.
3. - LOGIN FOR ADMIN IS AT: http://gallery-sitepath.com/gallery/index.php
4. - Open menu selection "Options and Controls" to setup the basics of you Gallery. (galleryurl/admin to login.)
5. - Theme templates are in the "themes" folder and can be redirected if you need to display gallery outside of theme directory.
6. - Add users from the registration page and activate by email.*

== Notes ==
theme switching does not function but is in place for those whom want to create a theme switcher. A theme system will be set up if there is enough interest. I have a schema for templates so please email to larry@tradesouthwest or use the sourceforge wiki from this project to collaborate. 

*Initial log in details for set-up:
Found in file: "include/password.txt"

file types = "GIF", "JPEG", "PNG", "SWF", "PSD", "BMP", "TIFF", "TIFF", "PDF"
http://www.cgsecurity.org/wiki/File_Formats_Recovered_By_PhotoRec for more file types.
