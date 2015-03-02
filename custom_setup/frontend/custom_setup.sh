#!/usr/bin/env bash

set -e

echo "Git & curl setup"
apt-get -y install git-core php5-curl

echo " Node.js setup"
wget -O /tmp/node-v0.10.1-linux-x64.tar.gz http://nodejs.org/dist/v0.10.1/node-v0.10.1-linux-x64.tar.gz
cd /usr/local && tar --strip-components 1 -xzf /tmp/node-v0.10.1-linux-x64.tar.gz
rm /tmp/node-v0.10.1-linux-x64.tar.gz

echo "Boostrap setup"
cd /var/www
npm install bootstrap
npm install -g grunt-cli
cd node_modules/bootstrap/
npm install
grunt dist

echo " Clone webui"
cd /var/www
git clone https://github.com/EudesRobin/webui-oardocker.git

echo "Creation compte apache"
echo " username : oar & password : docker "
echo -e "docker\ndocker" | htpasswd -c /etc/apache2/.htpasswd docker

echo " custom apache config "
echo "<Directory \"/var/www\">
        AuthType Basic
        AuthName \"Authentification Required\"
        AuthUserFile \"/etc/apache2/.htpasswd\"
        Require valid-user
        Order allow,deny
        Allow from localhost
</Directory>

<Directory \"/var/www/webui-oardocker/custom_setup\">
        deny from all
</Directory>

<Directory \"/var/www/webui-oardocker/.git\">
        deny from all
</Directory>" >> /etc/apache2/apache2.conf
