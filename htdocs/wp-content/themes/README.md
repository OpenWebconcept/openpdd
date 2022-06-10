# Gemeente Whitelabel

> This file is a work in progress

## Directory structure

```md
.
├── /config (webpack / wp-scripts configuration)
├── /theme-fusion (parent theme)
├── /child (child theme)
└── cli.js (cli to run tasks, see package.json)
```

## Theming

It is essential that all newly created logic is done within the parent theme. This means; when you create a new Gutenberg block you'll do this within the `theme-fusion` folder. This way all newly developed components are automatically available within each theme.

Color customizations are done within the themes. As soon as a certain component needs to look different in another theme, you'll create color variables within the parent theme's `_color.scss` and will then override them within the child themes `_color.scss`.

## Deploy

Deploy through deployer with "dep deploy accept" or "dep deploy production"
