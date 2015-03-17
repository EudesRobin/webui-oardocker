#!/usr/bin/env bash

sudo -s;
oarnodesetting -h $1 -p cpu=$2 -p core=$3 -p mem=$4