/*
 * GULP CONFIG
 *
 * Desciption:  Clean gulpfile for web development workflow containing
 *              - compiling/optimization of sass, javascript and images from assets to dist and vendors
 *              - browsersync
 *              - cache-busting
 *
 * Usage:       - gulp (to run the whole process)
 *              - gulp watch (to watch for changes and compile if anything is being modified)
 *
 * Author:      Flurin Dürst (https://flurinduerst.ch)
 *
 * Version:     2.0.0
 *
*/


/* SETTINGS
/===================================================== */
var browsersync_proxy = "wpseed.vm";


/* DEPENDENCIES
/===================================================== */
// general
var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var concat = require('gulp-concat');
var rename = require("gulp-rename");
// var clean = require('gulp-clean');
// css
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var autoprefixer = require('gulp-autoprefixer');
// cache busting
var rev = require('gulp-rev');
// js
var uglify = require('gulp-uglify');
// images
var imagemin = require('gulp-imagemin');
// error handling with notify & plumber
var notify = require("gulp-notify");
var plumber = require('gulp-plumber');
// watch
var watch = require('gulp-watch');
// delete
var del = require('del');


/* TASKS
/===================================================== */

/* CLEAN
/------------------------*/
// delete compiled files/folders (before running the build)
// css
gulp.task('clean:css', function() {
  return del(['dist/*.css', 'dist/rev-manifest.json']);
});
// cachebust
gulp.task('clean:cachebust', function() {
  return del(['dist/style-*.min.css']);
});
// javascript
gulp.task('clean:javascript', function() {
  return del(['dist/*.js']);
});
// images
gulp.task('clean:images', function() {
  return del(['dist/images']);
});


/* BROWSERSYNC
/------------------------*/
// initialize Browser Sync
gulp.task('browsersync', function() {
  browserSync.init({
    proxy: browsersync_proxy,
    notify: false,
    open: false,
    snippetOptions: {
      whitelist: ['/wp-admin/admin-ajax.php'],
      blacklist: ['/wp-admin/**']
    }
  });
});


/* CSS
/------------------------*/
// from:    assets/styles/main.css (+ optional vendors)
// actions: compile, minify, prefix, rename
// to:      dist/style.min.css
gulp.task('css', ['clean:css'], function() {
  return gulp.src([
    //main
    'assets/styles/bundle.scss',
    // vendors
    'node_modules/hamburgers/dist/hamburgers.min.css', // https://jonsuh.com/hamburgers/
    'node_modules/animate.css/animate.min.css' // https://daneden.github.io/animate.css/
  ])
  .pipe(plumber({errorHandler: notify.onError("<%= error.message %>")}))
  .pipe(concat('style.min.css'))
  .pipe(sass())
  .pipe(autoprefixer('last 2 version', { cascade: false }))
  .pipe(cleanCSS())
  .pipe(rename('dist/style.min.css'))
  .pipe(gulp.dest('./'))
  .pipe(browserSync.stream());
});


/* CSS CACHE BUSTING
/------------------------*/
// from:    dist/style.min.css
// actions: create busted version of file
// to:      dist/style-[hash].min.css
gulp.task('cachebust', ['clean:cachebust', 'css'], function() {
  return gulp.src('dist/style.min.css')
    .pipe(rev())
    .pipe(gulp.dest('dist'))
    .pipe(rev.manifest({merge: true}))
    .pipe(gulp.dest('dist'))
});


/* JAVASCRIPT
/------------------------*/
// from:    assets/scripts/ (+ optional vendors)
// actions: concatinate, minify, rename
// to:      dist/script.min.css
gulp.task('javascript', ['clean:javascript'], function() {
  return gulp.src([
    // main
    'assets/scripts/*.js',
    // vendors
    'node_modules/wowjs/dist/wow.min.js' // https://github.com/matthieua/WOW
  ])
  .pipe(plumber({errorHandler: notify.onError("<%= error.message %>")}))
  .pipe(concat('script.min.js'))
  .pipe(uglify())
  .pipe(rename('dist/script.min.js'))
  .pipe(gulp.dest('./'))
  .pipe(browserSync.stream());
});


/* IMAGES
/------------------------*/
// from:    assets/images/
// actions: minify
// to:      dist/images
gulp.task('images', ['clean:images'],  function() {
  return gulp.src('assets/images/*.*')
    .pipe(imagemin())
    .pipe(gulp.dest('dist/images'))
    // .pipe(browserSync.stream()); // currently bugged (18.12.2017)
});


/* WATCH
/------------------------*/
// watch for modifications in
// styles, scripts, images, php files, html files
gulp.task('watch',  ['browsersync'], function() {
  gulp.watch('assets/styles/*.scss', ['css', 'cachebust']);
  gulp.watch('assets/scripts/*.js', ['javascript']);
  gulp.watch('assets/images/*.*', ['images']);
  gulp.watch('*.php', browserSync.reload);
  gulp.watch('*.html', browserSync.reload);
});


/* DEFAULT
/------------------------*/
// default gulp tasks executed with `gulp`
gulp.task('default', ['css', 'cachebust', 'javascript', 'images']);
