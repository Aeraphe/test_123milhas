
# Test for 123Milhas

[![N|Solid](https://123milhas.com/img/logo123.svg)](https://123milhas.com/)
Test for 123Milhas


## This is an Api Test with Laravel for request flights from 123Milhas, arrenge and group thens by:
   - Price
   - Inbound
   - Outbound
   - Fare
  
 ## API Routes 

  -  For local machine:

   - Get Flights By Groupe: http://localhost/api/v1/flights
   
  -  For online:
  
   - Get Flights By Groupe: http://3.17.16.92/api/v1/flights

  Get Routes Colletion on Postman : [https://www.getpostman.com/collections/5db2a0026dc96f440c78] (https://www.getpostman.com/collections/5db2a0026dc96f440c78)

## Instalation

 ### Manual instalation
 - This app uses Docker and Docker Compose  for run the larevel in container  
   if you dont know how to install click here [DockerInstall] (https://docs.docker.com/engine/install/)

 - After install docker you have to install Docker Compose see [Instrutions] (https://docs.docker.com/compose/install/) 

 - Download or Clone the App source code form git: https://github.com/Aeraphe/test_123milhas.git 
   see git acount for more [details] (https://github.com/Aeraphe/test_123milhas)

 - Now open the bash in the app source folder and type: sudo docker-compose -f docker-compose.prod.yml up

 - Then install compose dependecies with command: sudo docker-compose exec app  composer install

 - Create environment file with command: sudo touch .env 
 
 - Copy the default env config in the bottom of the page

 - Create laravel Key by : 
    - sudo docker-compose exec app php artisan key:generate
    - sudo docker-compose exec app php artisan config:cache

### Install with deploy.sh (shell command file) 

 - Download or Clone the App source code form git: https://github.com/Aeraphe/test_123milhas.git 
   see git acount for more [details] (https://github.com/Aeraphe/test_123milhas)
 
 - In source folder type:  sudo chmod +x deploy.sh
 - Then type: sudo ./deploy.sh

## License

This Laravel Api  is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



## Default .env config

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
