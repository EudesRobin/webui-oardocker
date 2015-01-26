Projet RICM4 - EUDES Robin & ROSSI Ombeline

Voir le wiki ur Github pour plus de détails.

Quick install :
  * Prérequis : 
  -> suivre les commandes pour initier l'environnement oar-docker, disponibles à cette adresse :
    https://github.com/oar-team/oar-docker

  L'environement en place, on peut lancer une simulation :

$ sudo oardocker start -n <nb> # <nb> nb nodes

Pour installer la webui, lancer la commande suivante dans le même répertoire que la commande précédante ( sinon l'environment initialisé n'est pas trouvé par oardocker ).

$ sudo oardocker exec frontend "wget https://raw.githubusercontent.com/EudesRobin/webui-oardocker/master/init.sh && chmod +x init.sh && sudo ./init.sh"

Votre webui est accessible à l'adresse : http://localhost:48080/webui-ordocker/
