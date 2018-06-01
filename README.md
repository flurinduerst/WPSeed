
<img src="/assets/images/wpseed.png" width="518"/>

**Version 1.3.12** (01.06.2018)

## What is WPSeed?
WPSeed is a WordPress starter theme following the intention of being able to skip the time-consuming first steps when creating a new theme.
WPSeed uses a variety of pre-built objects that allow kickstarting any kind of theme. These objects consist of:
* basic templates
* basic html/scss structure
* html/scss/javascript presets and essential functions
* responsive functionality including viewport-mixins, rem-based content resizing and a animated mobile menu
* a preset/config scss file managing all colors, fonts and sizes

## Requirements:
  * Node >= 8.0 ([nodejs.org](https://nodejs.org/))
  * npm >=5.0 (`npm install -g npm@latest` - [npm](https://www.npmjs.com/))
  * php >= 5.4 or [short_open_tag](http://php.net/manual/de/ini.core.php#ini.short-open-tag) set `true` on your VM/Webserver

## Installation
* Clone WPSeed `$ git clone git@github.com:flurinduerst/WPSeed.git` into your `themes` directory.

## Workflow
#### General
* you can use any TLD for local development. WPSeed assumes you're using `.vm` for "virtual machine". If you want to use a different TLD make sure to change `.vm` to your preffered TLD in `Vagrantfile`, `gulpfile.js` and `functions-wpsetup.php`.

#### Gulp
WPSeed uses npm to manage development-modules aswell as frontend-modules and [gulp](https://gulpjs.com) to compile assets from `assets` to `dist`. For details see `gulpfile.js`.
  * Install gulp globally with `npm install -g gulp` if you haven't already
  * add your domain/ip to `browsersync_proxy` in `gulpfile.js`
  * in the theme directory run `npm install`
  * you can now use `gulp` to compile and optimize your asset files and run browsersync. Use `gulp watch` to let gulp compile your files automatically whenever you've made changes to the associated files.
  * gulp is handling vendor-requirements (external tools/frameworks) by additionally compiling/bundling the files defined in `gulp-vendors.json`. So, if you add vendors, make sure to add them to `gulp-vendors.json`.
  * for further information about gulp see [gulpjs.com](https://gulpjs.com/)

#### Modernizr
WPSeed uses [modernizr](https://modernizr.com/) to automatically detect the availability of next-generation web technologies.
  * install the modernizr [command line config](https://www.npmjs.com/package/modernizr) with `npm install -g modernizr`
  * create/download your custom modernizr config at [modernizr.com](https://modernizr.com/download?setclasses) and select the `command line config` download option. Move the downloaded `modernizr-config.json` into `assets/scripts`.
  * run `modernizr -c assets/scripts/modernizr-config.json -d assets/scripts` to generate your `modernizr.js`. This file will be compiled by gulp.
  * Note: If you don't want to use modernizr you can just ignore/delete the modernizr files in `assets/scripts/` Everything will work perfectly fine without them.

## Deployment
* when deploying your website using a deployment-environment like [deploybot](https://deploybot.com/) or [deployHQ](https://www.deployhq.com/) run
  * `npm install` to install the frontend-modules/vendors on the deployment-docker (`--no-spin` helps to keep the logfile clean)
  * `gulp` to compile assets
  * Note: the `npm_modules` folder is not needed on the webserver itself. Vendors from npm_modules are compiled into `style.min.css` and `script.min.js`.

## Usage

### General
* All important files provide a description/version at the top. Make sure to read it first.
* Since Version 1.2.0 WPSeed creates cache-busting using [gulp-rev](https://www.npmjs.com/package/gulp-rev). If you're working locally (using the `.vm` TLD) the non-busted stylesheet (style.min.css) is enqueued, to make sure browsersync runs as expected.

### Important Files/Folders

##### Functions
* `functions-access.php` (functions that control access to the site)
* `functions-backend.php` (backend related functions)
* `functions-dev.php` (functions used for development purposes)
* `functions-elements.php` (functions to output ACF flexible elements)
* `functions-wpsetup.php` (WordPress setup)

##### CSS
* `assets/styles/content.scss` (content related styles)
* `assets/styles/general.scss` (re-usable classes and settings)
* `assets/styles/bundle.scss` (gathers all .scss files for compiling with gulp)
* `assets/styles/nav.scss` (navigation)
* `assets/styles/essentials.scss` (required SASS functions and all presets for responsive)
* `assets/styles/fonts.scss` (locally hosted fonts)
* `assets/styles/vars.scss` (manages scaling, all colors, fonts and other presets)

##### Javascript
* `assets/scrips/essentials.js` (re-usable essential javascript/jQuery functions/variables)
* `assets/scrips/functions.js` (javascript/jQuery)


##### Templates
The Wordpress default templates (like page.php, single.php) receive their content from the associated file inside the template folder. This way all templates are grouped together. `index.php` is forwarded to `page.php`.

* `str-footer.php`      footer content that shows up at the bottom of the page (this is content, don't mix this up with `footer.php`)
* `str-elements.php`    template for ACF flexible elements
* `temp-home.php`       displays default content and a full width teaser image
* `temp-subsites.php`   displays default content and content of the respective child pages
* `wp-home.php`         WP blog default
* `wp-page.php`         WP page default
* `wp-single.php`       WP post default

All templates are seperate into three categories recognizable by their prefix:
* **`wp`**: wordpress default templates.
* **`temp`**: individual site templates.
* **`str`**: structure files that have to be included in other sites or the main structure.


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


## About
Author: Flurin Dürst

Contact: [flurin@flurinduerst.ch](mailto:flurin@flurinduerst.ch)

Twitter: [@flurinduerst](https://twitter.com/flurinduerst)

### Contribution
* Fork it
* Create your feature branch
* Commit your changes
* Push to the branch
* Create new Pull Request

Feel free to contact me if you have questions or need any advice.

### License
WPDistillery is released under the MIT Public License.

Note: The "About" section in `README.md` and the author (`@author`) notice in the file-headers shall not be edited or deleted without permission. For Details see [License](LICENSE.md). Thank you.
