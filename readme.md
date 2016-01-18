# Julep: WordPress Bourbon Neat starter theme (work in progress)

A bare bones, lightweight Bourbon Neat starter theme for WordPress inspired by Some Like it Neat.

Julep is set up with:

* [Bourbon](https://github.com/thoughtbot/bourbon)
* [Bourbon Neat](https://github.com/thoughtbot/neat)
* [Bourbon Bitters](https://github.com/thoughtbot/bitters)
* [Gulp](http://gulpjs.com/)
* [Browsersync](http://www.browsersync.io/)
* [Browserify](http://browserify.org/)
* [Bower](http://bower.io/)
* Some template code from [Underscores](http://underscores.me/)

## Project setup

* Dev domain:
* Use the "default" gulp task to compile SCSS/JS, activate Browsersync, etc.

### Prerequisites

* Node and SASS are required

### [Gulp](http://gulpjs.com/)

#### 1. Install gulp globally if you haven't previously done so:

```sh
$ npm install --global gulp
```

#### 2. Install gulp and project devDependencies:

```sh
$ npm install
```

### [Bower](http://bower.io/)

#### 1. Install Bower globally if you haven't previously done so:

```sh
$ npm install -g bower
```

#### 2. Install Bower Dependencies:

```sh
$ bower install
```

### Config

Open gulpfile.js and set the "url" variable to the development url so that Browsersync will function correctly. Also, 
note the source and adminSource variables if you happen to change the directory structure of the theme for some reason.

## Notes

* Programmed with [WPCS](https://codex.wordpress.org/WordPress_Coding_Standards) enabled

### JavaScript Structure

The Browserify Gulp task is set up to watch the assets/js/app/app.js file. It's recommended to add your JS files into
assets/js/inc/ and include them with require() from app.js. When WP_DEBUG is set to true in the wp-config.php file the
unminified development.js file will be enqueued. When WP_DEBUG is set to false, the minified production-min.js file
is enqueued.

### CSS

* The initial classes are set up following the BEM methodology
* Responsive rules are not separated out into separate files

### Admin dashboard

* The welcome panel can be updated in admin/init.php
* The dashboard company widget can be updated with your company's contact information in admin/init.php
