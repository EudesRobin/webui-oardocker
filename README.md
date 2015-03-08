__Projet RICM4 - EUDES Robin & ROSSI Ombeline__


[![Stories in Ready](https://badge.waffle.io/eudesrobin/webui-oardocker.svg?label=ready&title=Ready)](http://waffle.io/eudesrobin/webui-oardocker)

**Quick install**
  * Requirements :
    * Follow instructions given on [oar-docker github](https://github.com/oar-team/oar-docker) to install oar-docker.
    * Be careful about docker, if you are using Ubuntu 14.04, the package name is docker.io ( and notre juste only docker !).
      Some help to install the latest docker version is available on the wiki.
    * You should also add your user to the docker group, to avoid any "sudo" commands with oardocker ([some help](https://docs.docker.com/installation/ubuntulinux/#giving-non-root-access) )


Here, an example to install your oar-docker environment ( you must have install docker.io and oar-docker ):
```
# Create a directory for your oar-docker environment
mkdir ~/oardocker
cd ~/oardocker

# oar-docker init
oardocker init

# Custom frontend install, to include our webui
cd ~/oardocker/.oardocker/images/frontend
rm custom_setup.sh #delete original & empty script
wget https://raw.githubusercontent.com/EudesRobin/webui-oardocker/master/custom_setup/frontend/custom_setup.sh

# oar-docker build
cd ~/oardocker/.oardocker/
oardocker build

# now, we install oar
oardocker install http://oar-ftp.imag.fr/oar/2.5/sources/testing/oar-2.5.4.tar.gz

```

Once the environment is installed, we can start a simulation.

```
sudo oardocker start -n <nb> # start a simulation with <nb> nodes.

```
The webui is now available at : [http://localhost:48080/webui-oardocker/](http://localhost:48080/webui-oardocker/)

__Security__

Like oar-docker, this webui for oar-docker is in no way secure.It's a project for development and testing.
User : docker  / password : docker (  submitting jobs...) in order to generate nodes, the user is oar ( password : docker )
