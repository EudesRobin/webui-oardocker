#!/usr/bin/env bash

set -e

echo "Git & curl setup"
apt-get -y install git-core php5-curl

echo " custom apache config "

echo " <Directory \"/var/www/webui-oardocker/custom_setup\">
        deny from all
</Directory>

<Directory \"/var/www/webui-oardocker/.git\">
        deny from all
</Directory>" >> /etc/apache2/apache2.conf

# A very dirty way to add rsc to a node , bypassing the API /resources POST...
# Then, this cmd is executed by php.
echo "www-data ALL=(ALL) NOPASSWD:/usr/local/sbin/oarnodesetting" >> /etc/sudoers
