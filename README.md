<img src="/assets/images/wpseed.png" width="518"/>

**Version:** 0.14.0

## What is WPSeed?
WPSeed is a WordPress starter theme following the intention of being able to skip the time-consuming first steps when creating a new theme.
WPSeed uses a variety of pre-built objects that allow kickstarting any kind of theme. These objects consist of:
* basic templates
* basic html/scss structure
* html/scss/javascript presets and essential functions
* responsive functionality including viewport-mixins, rem-based content resizing and a animated mobile menu
* a preset/config scss file managing all colors, fonts and sizes

## Requirements:
  * Node >= 0.12.x ([nodejs.org](https://nodejs.org/))
  * npm >=2.11.x (`npm install -g npm@latest`)
  * php >= 5.4.0 or [short_open_tag](http://php.net/manual/de/ini.core.php#ini.short-open-tag) set `true` on your VM/Webserver

## Installation
#### WPSeed Theme:
* Clone WPSeed `$ git clone git@github.com:flurinduerst/WPSeed.git` into your `themes` directory.

#### Workflow
WPSeed uses bower to manage vendors and [gulp](https://gulpjs.com) to compile assets from `assets` to `dist`. For details see `gulpfile.js`.
  * Install gulp and Bower globally with `npm install -g gulp bower` if you haven't already
  * in the theme directory run `npm install && bower install && gulp`
  * done - you can now use gulp (run `gulp watch` in your theme directory) to compile and optimize your asset files

## Usage

### General
* All important files provide a description/version at the top. Make sure to read it first.

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
* `assets/styles/main.scss` (gathers all .scss files for compiling with gulp)
* `assets/styles/nav.scss` (navigation)
* `assets/styles/essentials.scss` (required SASS functions and all presets for responsive, **this file is not meant to be changed**)
* `assets/styles/vars.scss` (manages scaling, all colors, fonts and other presets)

##### Javascript
* `assets/scrips/essentials.js` (re-usable essential javascript/jQuery functions/variables)
* `assets/scrips/main.js` (javascript/jQuery)


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

## Contribution
Feel free to contact me or add pull-requests/issues.

## License
WPSeed is released under the terms of the GNU General Public License
