#!/bin/bash

# requirements
sudo apt-get install git-core;

# Install of node.js
wget http://nodejs.org/dist/v0.10.36/node-v0.10.36-linux-x64.tar.gz;
sudo tar -xzvf ./node-v0.10.36-linux-x64.tar.gz;
rm ./node-v0.10.36-linux-x64.tar.gz;

# Install of Boostrap
cd /var/www;
sudo npm install bootstrap;
sudo npm install -g grunt-cli;
cd node_modules/bootstrap/;
sudo npm install;
sudo grunt dist;

# Now that everything is installed, we clone the "www" directory from our git repository
cd /var/www;
sudo git clone https://github.com/EudesRobin/webui-oardocker.git;
