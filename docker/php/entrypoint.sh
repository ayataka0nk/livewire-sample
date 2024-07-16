#!/bin/bash
set -e
sudo service supervisor start
docker-php-entrypoint "$@"
