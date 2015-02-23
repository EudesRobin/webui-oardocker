#!/usr/bin/env bash

set -e

echo "Git & curl setup"
apt-get -y install git-core php5-curl

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

echo " modification of oarpi-priv auth file ( same as webui...) "
echo "ScriptAlias /oarapi-priv /usr/local/lib/cgi-bin/oarapi/oarapi.cgi
ScriptAlias /oarapi-priv-debug /usr/local/lib/cgi-bin/oarapi/oarapi.cgi

<Location /oarapi-priv>
 Options ExecCGI -MultiViews FollowSymLinks
 AuthType      basic
 AuthUserfile  /etc/apache2/.htpasswd
 AuthName      \"OAR API authentication\"
 Require valid-user
 #RequestHeader set X_REMOTE_IDENT %{REMOTE_USER}e
 RewriteEngine On
 RewriteCond %{REMOTE_USER} (.*)
 RewriteRule .* - [E=MY_REMOTE_IDENT:%1]
 RequestHeader add X-REMOTE_IDENT %{MY_REMOTE_IDENT}e
</Location> " > /etc/oar/apache2/oar-restful-api-priv.conf

echo " modification oar so we can generate resources "
echo "API_RESOURCES_LIST_GENERATION_CMD=\"/usr/sbin/oar_resources_add -Y\"" >> /etc/oar/oar.conf
