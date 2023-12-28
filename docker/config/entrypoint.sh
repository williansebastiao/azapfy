#!/usr/bin/env bash
/usr/local/bin/composer install
chmod -R 777 storage
chmod -R 777 bootstrap
/usr/bin/supervisord
