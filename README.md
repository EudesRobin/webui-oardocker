Projet RICM4 - EUDES Robin & ROSSI Ombeline

Webui oar-docker

Pour lancer le projet :

suivre les commandes pour initier l'environnement oar-docker ( dans votre home, par exemple ).

ensuite :

sudo oardocker start -n 1 # nombre de noeuds
sudo oardocker connect frontend

Une fois connecté au frontend :

se placer dans /var/www
rendre le script executable ( sudo chmod +x script.sh )
executer le script ( sudo ./script.sh)
