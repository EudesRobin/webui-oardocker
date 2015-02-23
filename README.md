[![Stories in Ready](https://badge.waffle.io/EudesRobin/webui-oardocker.png?label=ready&title=Ready)](https://waffle.io/EudesRobin/webui-oardocker)
__Projet RICM4 - EUDES Robin & ROSSI Ombeline__

**Quick install**
  * Requirements :
    * Follow instructions given on [oar-docker github](https://github.com/oar-team/oar-docker) to install oar-docker.
    * Be careful about docker, if you are using Ubuntu 14.04, the package name is docker.io ( and notre juste only docker !).
      Some help to install the latest docker version is available on the wiki.


Here, an example to install your oar-docker environment ( you must have install docker.io and oar-docker ):
```
# Create a directory for your oar-docker environment
mkdir ~/oardocker
cd ~/oardocker

# oar-docker init
oardocker init

# Custom frontend install, to include our webui
cd ~/oardocker/.oardocker/images/frontend
wget https://raw.githubusercontent.com/EudesRobin/webui-oardocker/master/custom_setup/frontend/custom_setup.sh

# oar-docker build
oardocker build

# now, we install oar
oardocker install http://oar-ftp.imag.fr/oar/2.5/sources/testing/oar-2.5.4.tar.gz

```

Once the environment is installed, we can start a simulation.

```
sudo oardocker start -n <nb> 2 <nb> # start a simulation with 2 nodes.
```
The webui is now available at : [http://localhost:48080/webui-oardocker/](http://localhost:48080/webui-oardocker/)

__Security__

Like oar-docker, this webui for oar-docker is in now way secure.It's a project for development and testing.
The apache user and password are "docker" . [http://localhost:48080/webui-oardocker/](http://localhost:48080/webui-oardocker/)
is bind to localhost (by apache ), and should not be used by external stations.
