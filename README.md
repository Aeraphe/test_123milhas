
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
 
 - Copy the default .env.example to .env

 - Create laravel Key by : 
    ```
     sudo docker-compose exec app php artisan key:generate
     sudo docker-compose exec app php artisan config:cache
    ```

### Install with deploy.sh (shell command file) 

 - Download deploy.sh file from git: https://github.com/Aeraphe/test_123milhas.git 
   copy to a folder
 
 - In source folder type:  
  ```
  sudo chmod +x deploy.sh
  ```
 - Then type: 
 ``` 
  sudo ./deploy.sh
 ```
## License

This Laravel Api  is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



