#!/bin/bash

# requirements
sudo apt-get install git-core php5-curl;

# Install of precompiled 64bits binaries of node.js
wget http://nodejs.org/dist/v0.10.36/node-v0.10.36-linux-x64.tar.gz;
cd /usr/local && sudo tar --strip-components 1 -xzf /home/docker/node-v0.10.36-linux-x64.tar.gz;
rm /home/docker/node-v0.10.36-linux-x64.tar.gz;

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
