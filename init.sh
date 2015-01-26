#!/bin/bash

# prerequis
sudo apt-get install python g++ make git-core;

# node.js & npm
sudo apt-get install python g++ make git-core;
cd /usr/local/src
wget http://nodejs.org/dist/node-latest.tar.gz
tar zxvf node-latest.tar.gz
cd node-v0.1*
./configure
make
sudo make install



cd /var/www & sudo git clone https://github.com/EudesRobin/Mini_datacenter_webui.git;

# On recup les fichiers du répertoire, on les place à la racine du serveur web, on supprime tt fichiers non necessaires.
ls  /var/www/Mini_datacenter_webui/* |
while read fname
do
  sudo mv $fname /var/www/
done;
sudo rm -rf .git README.md Mini_datacenter_webui;

cd /var/www;
sudo npm install bootstrap;
sudo npm install -g grunt-cli;
cd node_modules/bootstrap/;
sudo npm install;
sudo grunt dist;
