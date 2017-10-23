PlayInn
-----------------

Easy Installation
-----------------
**Requirements**
- Apache server
- php>=5.6
- MySQL
- composer

**Steps**
- Clone this repository: `$ git clone git@github.com:alvibd/playinn.git`
- cd to project directory: `$ cd playinn`
- checkout to dev branch: `$ git checkout -b dev`
- pull latest dev: `$ git pull oringin dev`
- create _.env_: `$ cp .evn.example .env`
- set database configurations in _.env_
- install all the requirements: `$ composer install`
- generate key: `$ php artisan key:generate`
- run `$ php artisan serve` enjoy start the server and enjoy