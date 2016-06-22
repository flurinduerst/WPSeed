<img src="/assets/images/wpseed.png" width="518"/>

Note: As requested, extended documentation will be provided soon at wpseed.org.

## What is WPSeed?
WPSeed is a WordPress starter theme following the intention of being able to skip the time-consuming first steps when creating a new theme.
WPSeed uses a variety of pre-built objects that allow kickstarting any kind of theme. These objects consist of:
* basic templates
* basic html/scss structure and presets
* responsive functionality including viewport-mixins, rem-based content resizing and a animated mobile menu
* a preset/config scss file managing all colors, fonts and sizes

## Installation
#### WPSeed Theme:
* Clone WPSeed `$ git clone --depth=1 git@github.com:flurinduerst/WPSeed.git` into your `themes` directory.

#### Workflow
WPSeeds environment (Gulp, Bower, Browsersync, asset-builder) uses the [sage](https://roots.io/sage/) workflow.

**Quick-Instructions:** (For Additional instructions and usage please visit [sage theme development](https://roots.io/sage/docs/theme-development-and-building/).)
  * Requirements:
    * Node >= 0.12.x ([nodejs.org](https://nodejs.org/))
    * npm >=2.1.5 (`npm install -g npm@latest`)
    * [short_open_tag](http://php.net/manual/de/ini.core.php#ini.short-open-tag) set to true on your VM/Webserver
  * Installation
    * Install gulp and Bower globally with `npm install -g gulp bower`
    * in the theme directory run `npm install && bower install && gulp`
    * done - you can now use gulp to compile and optimize your asset files

## Usage

### General
* All important files provide a description/version at the top. Make sure to read it first.

### Important Files/Folders

##### Functions/Templates
* `templates` (Wordpress Default Templates (like page.php, single.php) get their content from the associated file inside the template folder. This way all templates are grouped together.)
* `header.php` (Metadata, Navigation)
* `functions/dev` (Functions used for development purposes)
* `functions/general` (general functions that are not WordPress related )
* `functions/wp` (WordPress related functions)
* `functions/wpsetup` (WordPress Setup including menus, theme supports and general settings)

##### CSS
* `assets/styles/vars.scss` (this is where you start styling. This file manages all colors, fonts and re-sizing)
* `assets/styles/nav.scss` (Navigation, Top-Bar)
* `assets/styles/content.scss` (basically everything else)

##### Javascript
* `assets/scrips/main.js` (javascript/jQuery goes here. It will be minimized to dist/scripts/main.js along with all bower components)


### Template prefixes
* **`wp`**: wordpress default templates. examples: `wp-page.php`, `wp-single.php`
* **`temp`**: individual site templates. examples: `temp-team.php`, `temp-contact.php`
* **`str`**: structure files that have to be included (typically multiple types) in other sites or the main structure. examples: `str-footer.php`, `str-sidebar.php`


### Responsive mixins/classes
##### defined by variables
* The width of the two available variables `mobile` and `desktop` are defined in vars.scss. Usage (with default values):
* min 800px `@include desktop {...}`
* max 799px`@include mobile {...}`

##### defined by individual pixel widths
* at least 750px: `@include vpw_min(750px)`
* at most 500px: `@include vpw_max(500px)`
* between 1000px and 1200px: `vpw(1000px, 1200px)`

##### defined by ascepct-ratio
* at least 16:9: `@include asr_min(16,9) { ... }`
* at most 4:3: `@include asr_max(4,3) { ... }`

##### defined by css-class
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
