#! /bin/bash

apt update
apt upgrade

apt install apache2 -y
apt install npm -y

cd ..
cd ..
cd ..
cd ..
cd ..
cd ..
cd ..

cd var/www/html/

wget https://unpkg.com/xterm/lib/xterm.js

npm install ws child_process

rm index.html

wget https://github.com/CuzImGeorg/TALCOW/blob/c9e7c1ecfb1cdcdc0cae995c7e47c842b5da9b8a/www/view/rsrc/tib/index.html
wget https://github.com/CuzImGeorg/TALCOW/blob/c9e7c1ecfb1cdcdc0cae995c7e47c842b5da9b8a/www/view/rsrc/tib/server.js

node server.js

#############################
# open localhost in Browser #
#############################
