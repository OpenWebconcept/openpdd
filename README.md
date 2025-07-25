# OpenPDD

WordPress project for the [Portaal Digitale Diensten](https://openwebconcept.nl/bouwblokken/).

> [!IMPORTANT]  
> Please read this README carefully, as it contains important information about the OpenPDD project and how to set it up.

## 👋 Introduction

This repository defines the required and optional plugins that together constitute the OpenPDD project
The idea behind this is that every individual organization *must* use the required plugins but can for themselves decide what optional plugins they need.

This branch serves solely as a *demo*. You are encouraged to use your own WordPress setup; however, to implement OpenPDD, you must include all the required plugins listed here.

### Required plugins

See this projects wiki: [Required plugins](https://github.com/OpenWebconcept/openpdd/wiki/Required-plugins).

> [!NOTE]  
> Please note that packages prefixed with `ypackagist` are paid, and you should provide your own source for them. E.g. GravityForms.

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