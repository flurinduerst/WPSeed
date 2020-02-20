<img src="/assets/images/wpseed.png" width="480">

**Version 2.1.1** (09.01.2020)

## 🧐  What is WPSeed?
Planting trees? Why waste your time digging a hole each time when you can just plant a seed instead? Even better, you can use the same seed for every tree you're planting from now on. WPSeed is your blueprint for modern WordPress theme development.

Following the [D.R.Y.](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) principle, WPSeed comes with everything you'll need for 90% of your themes, but nothing more, keeping it clean and simple.

I’m putting a lot of time into maintaining WPSeed. So if you like it, please consider supporting it:

[![BMC](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/flurinduerst)
[![Patreon](https://files.flurinduerst.ch/patreon.jpg)](https://www.patreon.com/bePatron?u=10089926)

## Table of contents
* [🥳 Features](#-features)
* [🚦 Requirements](#-requirements)
* [📦 Installation](#-installation)
* [🚀 Get Started](#-get-started)
* [🧠 Workflow](#-workflow)
* [📚 HTML Structure](#-html-structure)
* [🛠 Development](#-development)
* [🏖 About](#-about)
* [🤝 Contribution](#-contribution)
* [⚖️  License](#--license)


## 🥳 Features
🗞 **MADE FOR GUTENBERG**

WPSeed is made to work with the Gutenberg editor and has all the tools to adapt it to your needs.

🚀 **COMPILING LIKE A BAWS**

Seriously. Your code will be cleaned, modernized, optimized, minified and previewed in real time.

🕶 **SASS, DEAL WITH IT**

The SCSS-code is cleanly structured, nested and supplemented with meaningful variables and mixins.

♻️ **CACHE? BUSTED!**

WPSeed comes with cachebusting out of the box. You don't have to setup anything.

📦 **PRESETS SO YOU D.R.Y.**

You'll find the presets you actually need, so you **d**on’t **r**epeat **y**ourself.

🧙 **RESPONSIVE, FOR REAL**

WPSeed comes with features like viewport-scaling, responsive logo breakpoint-mixins and much more.

🧽 **CLEAN & SIMPLE**

Every file is built as minimal as possible to make sure you can add your custom code right away.

💚 **100% FREE**

WPSeed is 100% free and will always be.


## 🚦 Requirements
  * Node >= 10.0 – see [nodejs.org](https://nodejs.org/)
  * npm >=6.0 (`npm install -g npm@latest`) – see [npmjs.com](https://www.npmjs.com/)
  * php >= 7.1 – make sure [short_open_tag](http://php.net/manual/de/ini.core.php#ini.short-open-tag) is set to `true` on your VM/Webserver.
  * gulp >= 3.9.0 (`npm install -g gulp`) – see [gulpjs.org](https://gulpjs.com/)

## 📦 Installation
* Clone WPSeed `$ git clone git@github.com:flurinduerst/WPSeed.git` into your `themes` directory.
* in the theme directory run `npm install`
* in the theme directory run `gulp`
* add your domain/ip to `browsersync_proxy` in `gulpfile.js`

## 🚀 Get Started
This is a quick `TL;DR` on how to get started, below you'll find detailed informations about the [`🧠 Workflow`](#-workflow), [`📚 HTML Structure`](#-html-structure) and the [`🛠 Development`](#-development).

* install the workflow-environment → `npm install`
* run gulp → `gulp && gulp watch`
* access your Browsersync-powered local website at `localhost:3000` (or use your domain/ip to access it without Browsersync)
* start developing your website
  * open `functions/functions-setup.php` and add your custom settings
  * open `assets/styles/vars.scss` and add your custom sizes, breakpoints, colors, and so on
  * add your templates inside `templates/` or use `wp-page.php` with the Gutenberg-editor
  * add your custom css to `assets/styles/content.scss` and `assets/styles/structure.scss`
  * add your custom scripts to `assets/scripts/functions.js`


## 🧠 Workflow
### Local TLD
* you can use any TLD for local development. WPSeed assumes you're using `.vm` for "virtual machine". If you want to use a different TLD make sure to change `.vm` to your prefered TLD in `gulpfile.js` and `functions-wpsetup.php`. FYI: Browsersync sometimes has [issues](https://github.com/BrowserSync/browser-sync/issues/1346) with `.local`.

### Gulp
WPSeed uses [gulp](https://gulpjs.com) to compile assets from `assets` to `dist`. Here's what it will do:
* CSS: checks for errors, then adds browser-prefixes before cleaning, compiling, minifying and bundling all .scss-files into a cache-busted version of `style.min.css`
* JavaScript: checks for errors, then concatinates and minifies all javascript files into `script.min.js`
* Images: optimize all images using [imagemin](https://www.npmjs.com/package/gulp-imagemin) and move them to the `dist` (distribution) directory
* Fonts: get all fonts inside `assets/fonts/` and move them to the `dist` directory

Run `gulp` or `gulp watch` to execute the develoment workflow:
* `gulp` →  run all tasks (see above) once.
* `gulp watch` → let gulp compile your files automatically whenever you've made changes to the associated files.
* gulp is handling vendor-requirements (external tools/frameworks) by additionally compiling/bundling the files defined in `gulp-vendors.json`. So, if you add vendors, make sure to add them to `gulp-vendors.json`.

For more details on everything that is done (minifying, compiling, adding prefixes and much more) see `gulpfile.js`.

### NPM
WPSeed uses npm to manage development-modules as well as frontend-modules. Everything in `package.json` will be installed on `npm install`. You'll find two categories inside it:
* **dependencies** contains all modules that need to be loaded into the frontend of the website like css and javascript frameworks. Feel free to add/remove whatever you need. They're merged into the compiled files through `gulp-vendors.json`.
* **devDependencies** contains only modules that are needed for the local development.
* You'll never need to upload the `npm-modules` folder to your live-server.

### Browsersync
You don't have to reload your browser when changing your CSS. Simply use the local address provided after executing `gulp watch` (usally localhost:3000) to access your website via Browsersync. Changes to your CSS are now injected to your browser in real time every time you save a file.

### Modernizr
WPSeed uses [modernizr](https://modernizr.com/) to automatically detect the availability of next-generation web technologies. This is totally optional. You can safely ignored it if you don't need it.
  * install the modernizr [command line config](https://www.npmjs.com/package/modernizr) with `npm install -g modernizr`
  * create/download your custom modernizr config at [modernizr.com](https://modernizr.com/download?setclasses) and select the `command line config` download option. Move the downloaded `modernizr-config.json` into `assets/scripts`.
  * run `modernizr -c assets/scripts/modernizr-config.json -d assets/scripts` to generate your `modernizr.js`. This file will be compiled by gulp.
  * Note: If you don't want to use modernizr you can just ignore/delete the modernizr files in `assets/scripts/` Everything will work perfectly fine without them.
  * Add the class `modernizr-of` to every image you're using the object-fit class with. If the current browser does not support the `object-fit` attribute, all images with the class `modernizr-of` will be replaced with a div with the image-url set to background to ensure browser-compatibility. Also make sure to add the background-position to the image so it can be use within the generated div.

## 📚 HTML Structure
In WPSeed the following semantical structure is used on every site:
``` html
<header>           the page header containing the navigation and the logo
  <nav>            the main navigation
<main>             contains everything but navigation, footer and aside-elements
  <section>        serves as a structural container and/or fullwidth-background (repeatable)
    <article>      contains the content when the use of an article tag is semantically correct (repeatable)
<footer>           the page footer, can contain additional links and informations like address or logos
```

To be able to create simple containers within the Gutenberg editor check out [WPSeed Container Block](https://wordpress.org/plugins/wpseed-container-block/).

## 🛠 Development

### General
* All important files provide a description/version at the top. Make sure to read it first.
* WPSeed creates cache-busting using [gulp-rev](https://www.npmjs.com/package/gulp-rev). If you're working locally (using the `.vm` TLD) the non-busted stylesheet (style.min.css) is enqueued, to make sure browsersync runs as expected.
* WPSeed knows the currently used browser and adds it as a class to the `<html>`-Tag. See `compatibility.scss` for details.

### Important Files/Folders

#### Functions
```
functions-custom.php      space for your own custom functions
functions-dev.php         functions used for development purposes
functions-gutenberg.php   space for functions to create custom Gutenberg-blocks with ACF, contains a preset
functions-settings.php    theme-settings and general functions that normally don't need much editing
functions-setup.php       the starting point for setting up a new theme, most settings are here
```

#### CSS
```
# used for development
assets/styles/vars.scss         this is your starting-point, it manages scaling, colors, fonts and other presets.
assets/styles/content.scss      content related styles
assets/styles/structure.scss    contains everything that is not content related like (header, footer and main navigations)
assets/styles/fonts.scss        locally hosted fonts

# normally don't need changes
assets/styles/essentials.scss   required SASS functions and all presets for responsive
assets/styles/general.scss      defaults and presets, inherits most of the variables from vars.scss
assets/styles/bundle.scss       gathers all .scss files for compiling with gulp
```

#### JavaScript
```
assets/scrips/essentials.js   re-usable essential javascript/jQuery functions/variables
assets/scrips/functions.js    javascript/jQuery
modernizr-config.json         Modernizr configuration, see the "Modernizr" section above
modernizr.js                  Modernizr modules, see the "Modernizr" section above
```

#### Templates
The Wordpress default templates (like page.php, single.php) receive their content from the associated file inside the template folder. This way all templates are grouped together. `index.php` is forwarded to `page.php` to make it the default.

All templates should be seperated into two categories recognizable by their prefix:
* **`temp`**: individual site templates (none by default, an example would be `temp-contact.php`)
* **`wp`**: wordpress default templates.
* **`block`**: custom Gutenberg-blocks created with ACF.

```
blocks/block-*          if you want to create custom Gutenberg-blocks using acf, create them here and add them in functions-gutenberg.php.
wp-home.php             WP blog default
wp-page.php             WP page default
wp-single.php           WP post default
```


### Responsive/Fluid presets

#### Scaling
By default, the layout will scale with the viewport-width as all units are `rem` based and `html` uses font-size as the root unit.
This scaling can be configured at the `SIZE/SCALING` section in `vars.scss`. It is also possible to stop the scaling at a certain viewport-width. See instructions inside `vars.scss`.

#### Mixins/Classes
**defined by variables**
* The width of the two available variables `mobile` and `desktop` are defined in vars.scss. Usage (with default values):
* min 800px `@include desktop {...}`
* max 799px`@include mobile {...}`

**defined by individual pixel widths**
* at least 750px: `@include vpw_min(750px)`
* at most 500px: `@include vpw_max(500px)`
* between 1000px and 1200px: `vpw(1000px, 1200px)`

**defined by ascepct-ratio**
* at least 16:9: `@include asr_min(16,9) { ... }`
* at most 4:3: `@include asr_max(4,3) { ... }`

**defined by css-class**
the two available classes `mobile` and `desktop` perform as followed (with default values):
```SCSS
.desktop {
	// hidden while < 800px;
}
.mobile {
	// hidden while > 799;
}
```


## 🏖 About
Author: Flurin Dürst

Contact: [flurin@flurinduerst.ch](mailto:flurin@flurinduerst.ch)

Twitter: [@flurinduerst](https://twitter.com/flurinduerst)

## 🤝 Contribution
* Fork it
* Create your feature branch
* Commit your changes (please consider writing commits using https://github.com/flurinduerst/WPSeed-Emoji-Log (optional))
* Push to the branch
* Create new Pull Request

Feel free to contact me if you have questions or need any advice.

## ⚖️  License
WPSeed is released under the MIT Public License.

Note: The "About" section in `README.md` and the author (`@author`) notice in the file-headers shall not be edited or deleted without permission. For Details see [License](LICENSE). Thank you.
