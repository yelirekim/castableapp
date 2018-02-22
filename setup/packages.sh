#!/bin/bash

sudo apt-get install software-properties-common python-software-properties

sudo add-apt-repository ppa:ondrej/php

sudo apt-get update

sudo apt-get install \
  git subversion mercurial \
  vim tree screen \
  build-essential \
  mysql-server-5.7 apache2 php7.2 \
  php7.2-mysql php7.2-mbstring php7.2-curl php7.2-gd \
  php-apcu
