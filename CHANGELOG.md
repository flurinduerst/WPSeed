# CHANGELOG

## 0.7.0 | WPSeed | 18.05.2016
* renamed to WPSeed
* admin bar is now only shown on hover
* added font-size variable for default font-size on all elements
* added basic table styling and sanitizing
* changed versioning of main.js to full-file-version instead of seperate versions per function

## 0.6.0 | 27.04.2016
* added animated hamburger icons to mobile nav (thanks to https://jonsuh.com/hamburgers/)
* re-added responsive css classes `.desktop` and `.mobile`
* added general variables and presets (isTouch / $vpWidth) to main.js
* fixed bower-config & moved normalize into bower
* added pointer-event attributes to predefined hidden/shown classes
* added variables to functions
* renamed some variables
* unified file-versions (1.02.15 => 1.2.15)
* fixed tab indents
* cleanup & documentation

## 0.5.0 | 25.02.2016 | public beta
* added custom styles dropdown for tinymce
* added `current-page-ancestor` to active class in nav css
* added subnav structure template
* simplified navigation to use the the same <nav> for desktop & mobile
* removed `scrolling mobile nav`
* removed `IEHACK` - could add [dino](https://github.com/CLUS-Werbeagentur/dino) in the future
* condition for google maps API
* bugfixes

## 0.4.0 | 23.02.2016
* moved paragraph default-styling from vars.scss to content.scss
* added forward template
* multiple cleanups/re-structuring
* reworked version numbers from now on: [main].[sub].[fix/cleanup/minimal-change] => 0.5.2, 0.14.3, 1.25.19

## 0.32 | 21.01.2016
* added first version of README.md
* reworked responsive mixins
* cleanup & update composer
* update gulpfile
* added iehack

## 0.31 | 21.1.2016
* added flexbox fillup function `flexfill()`

## 0.3 | 05.11.2015
* re-organized theme enviroment (based on sage workflow)
    * new folder structure
    * splitting files into assets (dev) and dist (output)
    * new gulpfile
    * bower
    * wiredep
    * asset-builder
* reworked responsive functionality
* added new plugins
* added theme language support
* cleaned up stuff

### 0.21 | 23.10.2015
* added home template
* changed admin bar handling to plugin "Better Admin Bar"
* added the_post_thumbnail_url function
* several bug fixes (mobilemenu and others)

### 0.2 | 22.10.2015
* added demo functionality
* added footer
* added template "team"
* added additional styling-presets
* deleted template "subcontent" (because new template "team")
* renamed template "googlemaps" to contact
* adjusted csscomb

### 0.18 | 22.10.2015
* added blog/post functionality

### 0.17 | 21.09.2015
* updated comment-structure
* cleanups

### 0.16 | 21.09.2015
* added css variable $fs_text for text-size

### 0.15 | 21.09.2015
* re-organized functions

### 0.14 | 18.09.2015
* added urlcontains function
* re-organized general functions

### 0.13 | 14.09.2015
* added google map API config
* added googlemap templae

### 0.12  | 11.09.2015
* added mobile navigation
* re-worked responsive mixins
* added function to disable html-hardcoded thumbnail-dimensions on images
* multiple cleanups

### 0.11
* multiple cleanups
