#!/usr/bin/env bash

set -e

echo "Git & curl setup"
apt-get -y install git-core php5-curl
service apache2 restart

echo " Node.js setup"
wget -O /tmp/node-v0.12.0-linux-x64.tar.gz http://nodejs.org/dist/v0.12.0/node-v0.12.0-linux-x64.tar.gz
cd /usr/local && tar --strip-components 1 -xzf /tmp/node-v0.12.0-linux-x64.tar.gz
rm /tmp/node-v0.12.0-linux-x64.tar.gz

echo "Boostrap setup"
cd /var/www
npm install bootstrap
npm install -g grunt-cli
cd node_modules/bootstrap/
npm install
grunt dist

# Finally, we clone the webui :)
cd /var/www
git clone https://github.com/EudesRobin/webui-oardocker.git

echo "Creation compte apache"
echo " username : docker "
htpasswd -c /etc/apache2/.htpasswd docker
