DoneDeal Web and Api
===============================

Done Deal offers the best deals on services in Uganda. Done Deal gives you an opportunity to try out new experiences to a greatly
discounted price. Discover new restaurants,spoil yourself with a spa treatment or surprise your beloved one with a romantic getaway, all
in a simple and secure way. 

This repository will/contains new code for the product, the web app will replace the current wordpress installation while the API will
connect the mobile apps to the data store.

How To Set Up
------------------
1. Clone repository
2. Run ```init```
3. Edit ```common/config/main-local.php``` and add the db name
4. Run ```yii migrate``` to run the migrations and set up the database
5. Set the document root to point to ```frontend/web``` and you are good to start using the web app.
6. To set up an api endpoint, create a sub-domain e.g ```api.domain.com``` then set its document root to ```api/web```
then refer to the API documentation on which calls are available for you

Change Log
-----------------


DIRECTORY STRUCTURE
-------------------

```
api 
    config/              contains configuration files
    modules/             contains the api modules, makes versioning easy
    runtime/             contains files generated during runtime
    tests/               contains test files
    web/                 contains the etnry script for the Api resources
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```
Help?!!
------------------------
If you need any assistance, please contact developer@donedeal.ug