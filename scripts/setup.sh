#! /usr/bin/env bash
set -e # exit if something goes wrong

cd ./bedrock && composer install && cd ../ && docker compose up