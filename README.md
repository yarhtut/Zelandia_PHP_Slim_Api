# Zelandia_PHP_Slim_Api

##Team
Yar Thet Pan Kyaw Htut(Developer) and Leon Ngatai (BA).

Total 16 weeks long project but actual coding part was only 11 weeks.

This projects had been given to Whitireia for 3 semesters but Yar Htut and Leon Ngatai did not used any of the previous code or design and they had completed the project.

Android App and Web Api had need to do a little bit more work for production.

#Background


The Zealandia Sanctuary is home to New Zealand's most incredible and rare wildlife. For the childeren that visit there it provides a living classroom where they are able to observe and interact with the large number of birds, reptiles and plants that exist there.

##Objective

To adopt Zealandia School activities which currently used in paper type to Android App, simple RESTful Api and Web admin using PHP Slim framework, JQuery(AJAX), bootstrap.

##Outcome
-  An administration website for maintaining wildlife content on the database and for setting up users with logins.​
-  An Android application for school children to use on their visits to Zealandia to record sightings of the various wildlife at the sanctuary.​
-   A REST API for data synchronisation between the Android mobile devices and the webserver.

Zelandia API
===================
This readme will act as temporary documentation for the Zealandia API.

 Calls For Items
===================

----------


All Items
---------

This call will return all items (animals) that are in the database, this will be used for the admin section. 

> **Example:** http://yar.cloudns.org/SlimApi/api/list/birds


All Items - Active
---------
 
This will return all items (animals) that are active, from the database and ignore all inactive items. This will be used for the mobile app to ensure inactive items are not displayed.

> **Example:** http://yar.cloudns.org/SlimApi/api/list/birds/active=1

Insert New Item
---------

This will insert a new item into the database, I have only tested with curl.

> **Example:** curl -i -X POST -d '{"item_id":12345,"item_category":"test insert","item_name": "test insert","item_type":"dead","item_image_file": "filegone","item_description": "dead and gone","item_points":12,"item_active":0}'http://yar.cloudns.org/SlimApi/api/update/:action

 Calls For Schools
===================


All Schools
---------

This call will return all schools from the schools table.

> **Example:** http://yar.cloudns.org/SlimApi/api/schools




#Sancutry View 
<img src="http://imgur.com/IIZ8XSn.png">

#Admin Panel

Admin can add new , update, delete (CRUD) for all categories,students and schools.(All with Ajax)

<img src="http://i.imgur.com/yGBPSAx.png">

<img src="http://i.imgur.com/qRQ3z3P.png">


#Important Notes
##PHP

Currently rewriting the API with auto generation key using PHP Phalcon Framwork because Zealandia would like to use the Android App and Web Admin.
Some fixes of Css for mobile and tablet view ( responsive overwrite css)
will include Minified CSS and JS fixtures which provided by Phalcon Framwrok.


