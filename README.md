# OpenPDD

WordPress project for the [Portaal Digitale Diensten](https://openwebconcept.nl/bouwblokken/).

## ✅ Getting started

1. Set up your local environment with [Lando](https://lando.dev/) or [Local](https://localwp.com/)
2. Create and configure an `.env` file based on `.env.example`
3. Run `composer install` to install PHP dependencies

## ⚙️ Deployment

This project does not include a deployment mechanism (`deploy.php`). There is a [separate private repository](https://github.com/yardinternet/openpdd-deployer) for this purpose.

## 🎨 Theme development

1. Run `nvm use` to automatically use the correct Node version
2. Copy `.npmrc.example` to `.npmrc` and add a FontAwesome Pro token
3. Run `npm install` to install dependencies
4. Run `npm start` to compile assets

[You need to configure a FontAwesome Pro token](https://fontawesome.com/v6/docs/web/setup/packages#set-up-npm-token-for-all-projects), to make all fonts work as intended. However, using the intended fonts is optional and you don't need a paid license. After you have configured a token, run `npm install` again.

## ⚙️ Theme structure

All new logic should be developed within the parent theme `owc-formulieren`, including the creation of new Gutenberg blocks. This ensures that newly developed components are automatically available in all themes.

Centralize color customization by creating color variables in the parent theme's `_color.scss` and overriding them in the child themes' `_color.scss`.

## 🔔 Troubleshooting

T.B.A.

## 🔒 Premium plugins

This repository requires GravityForms and also uses a number of premium add-ons most of which are optional. You can identify the premium plugins by their `ypackagist` prefix inside the `composer.json`. We use our own packagist to manage and download premium plugins powered by [SatisPress](https://github.com/cedaro/satispress). Omit the plugins you don't need or simply change the repository to your own Satis instance.

## 📜 License

Licensed under the EUPL-1.2 license.
