RED=`tput setaf 1`
GREEN=`tput setaf 2`
BLU=`tput setaf 4`
NC=`tput sgr0`


echo "${RED}###########################################################${NC}"
echo "              ${GREEN}START DEPLOY API 123MILHAS${NC}                   "
echo "${RED}###########################################################${NC}"

sleep 2.0

sudo apt-get update -y
sudo apt-get install  apt-transport-https  ca-certificates  curl  gnupg-agent software-properties-common -y

sleep 1.0
echo "${RED}###########################################################${NC}"
echo "                        ${GREEN}START INSTALL DOCKER${NC}               "
echo "${RED}###########################################################${NC}"

curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

sudo apt-get install docker-ce docker-ce-cli containerd.io -y

apt-cache madison docker-ce

sudo apt-get install docker-ce docker-ce-cli containerd.io -y

sudo apt install docker.io -y

sudo apt install docker-compose -y

sudo apt-get update -y && apt-get install -y openssl zip unzip git

sleep 1.0
echo "${RED}###########################################################${NC}"
echo "                        ${GREEN}START Clone API${NC}                    "
echo "${RED}###########################################################${NC}"

sudo git clone https://github.com/Aeraphe/test_123milhas.git

cd test_123milhas

echo "                        ${GREEN}CREATE .Env File${NC}                    "

sudo touch .env

sudo cp .env.example .env

sudo chmod -R 777 .env

sleep 1.0

echo "${RED}###########################################################${NC}"
echo "                      ${GREEN}START BUILD CONTAINER${NC}              "
echo "${RED}###########################################################${NC}"
sudo docker-compose -f docker-compose.prod.yml build

sleep 2.0

echo "${RED}###########################################################${NC}"
echo "                        ${GREEN}START RUN CONTAINER${NC}              "
echo "${RED}###########################################################${NC}"
sudo docker-compose -f docker-compose.prod.yml up -d

sleep 1.0

echo "${RED}###########################################################${NC}"
echo "               ${GREEN}INSTALL COMPOSER DEPENDECIES${NC}              "
echo "${RED}###########################################################${NC}"

sudo docker-compose exec app  composer install

sleep 1.0

echo "${RED}###########################################################${NC}"
echo "                    ${GREEN}GENERETE KEY${NC}                         "
echo "${RED}###########################################################${NC}"

sudo docker-compose exec app php artisan key:generate

sleep 1.0

echo "${RED}###########################################################${NC}"
echo "                    ${GREEN}CACHE CHANGES${NC}                        "
echo "${RED}###########################################################${NC}"

sudo docker-compose exec app php artisan config:cache

sleep 1.0

echo "${RED}###########################################################${NC}"
echo "                        ${GREEN}FINISH DEPLOY${NC}              "
echo "${RED}###########################################################${NC}"


echo " ${BLU}FINISH DEPLOY${NC}"

echo ' alias d="sudo docker"  dc="sudo docker-compose" it="sudo docker exec -it" '
echo ' alias build="sudo docker-compose -f docker-compose.prod.yml build" '
echo ' alias run="sudo docker-compose -f docker-compose.prod.yml up -d" '
