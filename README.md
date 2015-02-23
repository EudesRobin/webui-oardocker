Projet RICM4 - EUDES Robin & ROSSI Ombeline

Quick install :
  * Requirements :
  Follow the instructions given on [oar-docker github](https://github.com/oar-team/oar-docker) to init the environment

  Be careful about docker, if you are using Ubuntu 14.04, the package name is docker.io ( and notre juste only docker !).
  Some help to install the latest docker version is available on the wiki.

Once the environment is setup, we can start a simulation.
```
sudo oardocker start -n <nb> 2 <nb> # start a simulation with 2 nodes.
```
To setup the webui, you must execute the following command on the same directory as the oar-docker environment.

```
sudo oardocker exec frontend "wget https://raw.githubusercontent.com/EudesRobin/webui-oardocker/master/custom_setup/init.sh && chmod +x init.sh && sudo ./init.sh"
```
The webui is now available at : [http://localhost:48080/webui-oardocker/](http://localhost:48080/webui-oardocker/)

Soon, the installation of the webui will be merge with the build process.
