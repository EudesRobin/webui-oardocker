#!/usr/bin/env bash

set -e

echo "Git & curl setup"
apt-get -y install git-core php5-curl

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
