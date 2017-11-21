# course-service
Simple PHP RESTful Web Service

## Important Files
---
**.htaccess**
* Disables indexing directory contents so that files will not be listed if a user types in a directory path in his browser.
* Pretty URLs.
* Let PHP handle the URL processing, so "disable" it in Apache and redirect all requests to index.php (where URLs are handled manually).
* Process the .phtml extension in a way that makes it impossible for anyone to view our templates' source code. .phtml files behave just like .php files.
---
**index.php**

All of the communication will take place here, as well as all of the URL address redirections. Register a function *(autoloadFunction)* that is called every time an unloaded class is used. 
Load the class in using function so that classes are loaded automatically when needed. Two types of classes are loaded: **models** (from the models folder) and **controllers** (from the controllers folder). 
Views will not be classes but rather more like HTML pages. The auto-load function will  determine whether the class being loaded is a model or a controller and look through the appropriate folder based on that.

When controllers are added, they are able to be used regularly (without any includes/requires):

````PHP
    $router = new RouterController();
````    

Since PHP hasn't loaded the RouterController.php class from the controllers folder, it will call the autoload function. The autoload function will in turn (internally) execute the following command:

````PHP
    require('controllers/RouterController.php');
````    

---
**config/app-config.ini**

Supported application specific configurations. Refer to documentation within the file for each property.

---
**config/creds.ini**

Sample database properties configuration. If the *_credential.file.location_* property in the app-config.ini is not set then the application will use this file. **It is strongly recommended that you place live system's database configuration elsewhere and set the *_credential.file.location_* it.**

---
**config/sample-key.pem**

Sample initializing vector used data encryption/decryption. If the *_app.encrypt.key_* property in the app-config.ini is not set then the application will use this file. **It is strongly recommended that you place live system's secrets elsewhere and set the *_app.encrypt.key_* it.**

---
**config/sample-iv.txt**

Sample secret key used for data encryption/decryption. If the *_app.init.vector_* property in the app-config.ini is not set then the application will use this file. **It is strongly recommended that you place live system's secrets elsewhere and set the *_app.init.vector* it.**

---
## Project Structure
```
 |--.htaccess
 |--index.php
    |--config
    |--controllers
    |--logs
    |--misc
    |--models
```
**config** folder - Location of application specific properties. 

**controllers** folder - All application Controllers must be placed in this folder.

**logs** folder - Location of application log files. If the *_app.error.log.file_* property is set in the config/app-config.ini file then all error messages will be logged in this location.  If not set, then errors will be logged to the default Apache error log file.

**misc** folder - Miscellaneous files. Do not deploy this folder or its contents.

**models** folder - Location of all model classes must be placed in this folder.


---
## Tech Stacks
This implementation can be deployed on the following technology stacks:
* Apache Web Server 2.2.31
* PHP 7.1.1
* MySQL 5.6


---
## Deployment

Copy all files/folders to your www (or htdoc) folder.
 * config folder and all sub-folders/files
 * controllers folder and all sub-folders/files
 * logs folder and all sub-folders/files
 * models folder and all sub-folders/files
 * index.php
 * .htaccess
 
Update the config/creds.ini to match the Database you are using if you do not intended to place credential files else where. 

Update the config/app-config.ini to match your system's needs.
 
Start the web server. Type in the url *http://YOUR_SITE_NAME* in a web browser, where YOUR_SITE_NAME is your web address. On a local machine it would be: _http://localhost_ (assuming your server is listening on port 80).

