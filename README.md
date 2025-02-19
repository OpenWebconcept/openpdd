# OpenPDD

WordPress project for the [Portaal Digitale Diensten](https://openwebconcept.nl/bouwblokken/).

## 🚨 In progress

This branch is currently being developed on - for the stable version check out the [master](https://github.com/OpenWebconcept/openpdd/blob/master/) branch.

## 👋 Introduction

This repository outlines the required and optional plugins which when used together form what is called the OpenPDD.
The idea behind this is that every individual organization *must* use the required plugins but can for themselves decide what optional plugins they need.

This means you can use your own WordPress setup but must use at least use the required plugins to establish the OpenPDD.

### Required plugins

See this projects wiki: [Required plugins](https://github.com/OpenWebconcept/openpdd/wiki/Required-plugins).

### Optional plugins

There are a bunch of optional plugins which you can find at the [Open Webconcept](https://github.com/OpenWebconcept) organization, or you can preview an existing installation at this: [master](https://github.com/OpenWebconcept/openpdd/blob/master/) branch.

## 🚘 Test drive

We have included a Dockerfile which you can use to quickly test drive the OpenPDD.

**Requirements:**

- Docker
- PHP and Composer, alternatively you can run composer inside Docker with `docker compose run composer <command>`

Please note that packages prefixed with `ypackagist` are paid, and you should provide your own source for them.

```sh
# 1. install composer dependencies
sh ./scripts/setup.sh

# 2. import test database
sh ./scripts/import.sh

# 3. you can now access the installation at https://localhost:8082 and the admin at https://localhost:8082/wp/wp-admin
```
