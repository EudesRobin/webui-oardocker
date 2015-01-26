Projet RICM4 - EUDES Robin & ROSSI Ombeline

Webui oar-docker

Pour lancer le projet :

suivre les commandes pour initier l'environnement oar-docker, disponibles à cette adresse :
https://github.com/oar-team/oar-docker

L'environement en place, on peut lancer une architecture minimale ( un seul node en plus du frontend / DB ) 

$ sudo oardocker start -n 1 # nombre de noeuds
$ sudo oardocker connect frontend

Une fois connecté au frontend :

$ cd /var/www/webui-oardocker
$ sudo chmod +x init.sh
$ sudo ./init.sh

Votre webui est accessible à l'adresse : http://localhost:48080/webui-ordocker/
