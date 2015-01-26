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

cd /var/www;
sudo npm install bootstrap;
sudo npm install -g grunt-cli;
cd node_modules/bootstrap/;
sudo npm install;
sudo grunt dist;
