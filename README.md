__Projet RICM4 - EUDES Robin & ROSSI Ombeline__


[![Stories in Ready](https://badge.waffle.io/eudesrobin/webui-oardocker.svg?label=ready&title=Ready)](http://waffle.io/eudesrobin/webui-oardocker)

[![Throughput Graph](https://graphs.waffle.io/eudesrobin/webui-oardocker/throughput.svg)](https://waffle.io/eudesrobin/webui-oardocker/metrics)


**Quick install**
  * Requirements :
    * Follow instructions given on [oar-docker github](https://github.com/oar-team/oar-docker) to install oar-docker.
    * Be careful about docker, if you are using Ubuntu 14.04, the package name is docker.io ( and notre juste only docker !).
      Some help to install the latest docker version is available on the wiki.
    * You should also add your user to the docker group, to avoid any "sudo" commands with oardocker ([some help](https://docs.docker.com/installation/ubuntulinux/#giving-non-root-access) )


Here, an example to install your oar-docker environment ( you must have install docker.io and oar-docker ):
```
# Download this script
wget https://raw.githubusercontent.com/EudesRobin/webui-oardocker/master/custom_setup/start.sh

#Make it executable
chmod +x start.sh

# use it ;) <n> is the number of node for your simulation
./start.sh <n>
```
This script install a oardocker environment in \$workdir ( a variable with the value  "\$HOME/oardocker", you can modify it..), then launch a simulation. If the environment is already setup in \$workdir, it just lauch the simulation.


The webui is now available at : [http://localhost:48080/webui-oardocker/](http://localhost:48080/webui-oardocker/)

__Security__

Like oar-docker, this webui for oar-docker is in no way secure.It's a project for development and testing.

