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

If you have Lando installed you can take this project for a test drive:

### 1. Setup and run the environment

```sh
sh scripts/setup.sh
```

### 2. On subsequent runs you'll only need to start Lando

```sh
lando start
```

The wp-admin can be accessed at https://openpdd-new.lndo.site/wp/wp-admin

##

Please note that packages prefixed with `ypackagist` are paid, and you should provide your own source for them.