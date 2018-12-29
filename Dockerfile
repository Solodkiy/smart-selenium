FROM selenium/standalone-chrome:3.6.0-copper

RUN sudo apt-get update
RUN sudo apt-get install -y php


COPY cmd.php /home/seluser/cmd.php
COPY entry_point.sh /opt/bin/entry_point.sh



