# OpenPDD

WordPress project for the [Portaal Digitale Diensten](https://openwebconcept.nl/bouwblokken/).

## 🚨 In progress

This branch is currently being developed on - for the stable version check out the [master](https://github.com/OpenWebconcept/openpdd/blob/master/) branch.

## 👋 Introduction

This repository outlines the required and optional plugins which when used together form what is called the OpenPDD.
The idea behind this is that every individual organization *must* use the required plugins but can for themselves decide what optional plugins they need.

This means you can use your own WordPress setup but must use at least use the required plugins to establish the OpenPDD.

### Required plugins

See the composer.json file for an example.

### Optional plugins

## 🚘 Test drive

We have included a dockerfile which you can use to quickly test drive the OpenPDD.

**Requirements:**

- Docker
- PHP and Composer, alternatively you run composer inside Docker with `docker compose run composer <command>`

```sh
# 1. install composer dependencies
cd bedrock && composer install

# 2. run the docker container
cd ../ && docker compose up

# 3. you can now access the installation at https://localhost:8082
```
