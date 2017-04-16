#!/bin/bash

# See https://gist.github.com/gbaman/50b6cca61dd1c3f88f41 for more info

echo "dtoverlay=dwc2" | sudo tee -a /boot/config.txt
echo "dwc2" | sudo tee -a /etc/modules