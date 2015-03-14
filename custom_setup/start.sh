#!/usr/bin/env bash

#VARS
workdir=$HOME"/oardocker/"


set -e
if [ ! -d $workdir".oardocker" ]
	then
echo "Création de l'environement oardocker"
mkdir -p $workdir
cd $workdir
oardocker init
cd $workdir".oardocker/images/frontend"
rm "custom_setup.sh"
cd $workdir
echo "clone webui"
git clone https://github.com/EudesRobin/webui-oardocker.git
echo "copy custom_setup script"
cp ${workdir}webui-oardocker/custom_setup/frontend/custom_setup.sh ${workdir}.oardocker/images/frontend

oardocker build
oardocker install http://oar-ftp.imag.fr/oar/2.5/sources/testing/oar-2.5.4.tar.gz
oardocker start -v ${workdir}webui-oardocker:/var/www/webui-oardocker -n $1

elif [ $# -eq 1 ]
	then
	cd $workdir
	oardocker start -v ${workdir}webui-oardocker:/var/www/webui-oardocker -n $1
else
	echo "This script ask only one thing : How many node you want to start the simulation with ?"
fi