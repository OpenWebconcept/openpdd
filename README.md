# OpenPDD

WordPress project for the [Portaal Digitale Diensten](https://openwebconcept.nl/bouwblokken/).

## ✅ Getting started

1. Set up your local environment with [Lando](https://lando.dev/) or [Local](https://localwp.com/)
2. Create and configure an `.env` file based on `.env.example`
3. Run `composer install` to install PHP dependencies

## 🎨 Theme development

1. Run `nvm use` to automatically use the correct Node version
2. Copy `.npmrc.example` to `.npmrc` and add a FontAwesome Pro token
4. Run `npm install` to install dependencies
5. Run `npm start` to compile assets

A FontAwesome Pro token is required to install dependencies. If you don't have one, remove the `@fortawesome/fontawesome-pro` dependency from `package.json` and then run `npm install` again.

## ⚙️ Theme structure

All new logic should be developed within the parent theme `owc-formulieren`, including the creation of new Gutenberg blocks. This ensures that newly developed components are automatically available in all themes.

Centralize color customization by creating color variables in the parent theme's `_color.scss` and overriding them in the child themes' `_color.scss`.

## 🔔 Troubleshooting

T.B.A.

## 🗎 License

Licensed under the EUPL-1.2 license.
