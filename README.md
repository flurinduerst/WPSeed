<img src="/assets/images/wpegg.png" width="350"/>

## What is WPegg?
WPegg is a WordPress starter theme following the intention of being able to skip the time-consuming first steps when creating a new theme.
WPegg uses a variety of pre-built objects that allow kickstarting any kind of theme. These objects consist of:
* basic templates
* basic html/scss structure
* responsive functionality including full rem-based content resizing and a mobile menu
* a single scss file managing all colors, fonts and re-sizing

## Installation
* WPegg Theme: Clone WPegg `$ git clone --depth=1 git@github.com:flurinduerst/WPegg.git` into your themes directory.
* Workflow: WPeggs enviroment (Gulp, Bower, Browsersync, asset-builder) is based on the [sage](https://roots.io/sage/) workflow.
For Instructions please visit [sage theme development](https://roots.io/sage/docs/theme-development-and-building/).

## Usage

### General
* All important files have a description/version on the top. Make sure to read it first.

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
WPegg is published under the GNU GENERAL PUBLIC LICENSE.
