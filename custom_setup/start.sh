#!/usr/bin/env bash

#VARS
workdir=$HOME"/oardocker/"


set -e


if [ ! -d $workdir".oardocker" ]then
echo "Création de l'environement oardocker"
mkdir -p $workdir
cd $workdir
oardocker init
cd $workdir".oardocker/images/frontend"
rm "custom_setup.sh"
wget https://raw.githubusercontent.com/EudesRobin/webui-oardocker/master/custom_setup/frontend/custom_setup.sh
cd $workdir
oardocker build
oardocker install http://oar-ftp.imag.fr/oar/2.5/sources/testing/oar-2.5.4.tar.gz
elif[ $# -eq 1];then
	echo "environement found, start oardocker..."
	echo "webui directory is shared between host and oardocker..."
	echo "Access webui to this url : http://localhost:48080/webui-oardocker"
	oardocker start -v $workdir/webui-oardocker:/var/www/ -n $1;else

	echo "This script ask only one thing : how many node you want to start the simulation with ?"
	echo "You will be able to add resources trought the webui";
	fi;
fi;