/**
 * Project Setup
 *
 * Setting up variables for project name and directories
 */

// Project configuration
var url = '',// Development URL. Example: julep.dev
	source = './assets/', // Public assets
	adminSource = './admin/assets/'; // Admin assets

// Load plugins
var autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync'),
	browserify = require('browserify'),
	concat = require('gulp-concat'),
	filter = require('gulp-filter'),
	gulp = require('gulp'),
	minifycss = require('gulp-uglifycss'),
	notify = require('gulp-notify'),
	plugins = require('gulp-load-plugins')({camelize: true}),
	plumber = require('gulp-plumber'),
	reload = browserSync.reload,
	rename = require('gulp-rename'),
	sass = require('gulp-scss'),
	sourcemaps = require('gulp-sourcemaps'),
	sourcestream = require('vinyl-source-stream'),
	streamify = require('gulp-streamify'),
	uglify = require('gulp-uglify');

/**
 * Browser Sync
 */
gulp.task('browser-sync', function () {
	var files = [
		'**/*.php',
		'**/*.{png,jpg,gif}'
	];
	browserSync.init(files, {
		proxy: url
	});
});

/**
 * Styles
 */
gulp.task('styles', function () {
	return gulp.src([source + 'scss/**/*.scss'])
		.pipe(plumber({
			errorHandler: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle    : 'nested',
			precision      : 10
		}))
		.pipe(sourcemaps.write({includeContent: false}))
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(sourcemaps.write('.'))
		.pipe(plumber.stop())
		.pipe(gulp.dest(source + 'css'))
		.pipe(filter('**/*.css'))
		.pipe(reload({stream: true}))
		.pipe(rename({suffix: '-min'}))
		.pipe(minifycss({
			maxLineLen: 80
		}))
		.pipe(gulp.dest(source + 'css'))
		.pipe(reload({stream: true}))
});

/**
 * Admin styles
 */
gulp.task('adminStyles', function () {
	return gulp.src([adminSource + 'scss/**/*.scss'])
		.pipe(plumber({
			errorHandler: function (err) {
				console.log(err);
				this.emit('end');
			}
		}))
		.pipe(sass({
			errLogToConsole: true,
			outputStyle    : 'nested',
			precision      : 10
		}))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(plumber.stop())
		.pipe(gulp.dest(adminSource + 'css'))
		.pipe(filter('**/*.css'))
		.pipe(rename({suffix: '-min'}))
		.pipe(minifycss({
			maxLineLen: 80
		}))
		.pipe(gulp.dest(adminSource + 'css'))
});

/**
 * Scripts
 *
 * Concatenate scripts
 */

gulp.task('js', function () {
	return browserify(source + 'js/app/app')
		.bundle()
		.pipe(sourcestream('development.js'))
		.pipe(gulp.dest(source + 'js/'))
		.pipe(rename({
			basename: "production",
			suffix  : '-min'
		}))
		.pipe(streamify(uglify()))
		.pipe(gulp.dest(source + 'js/'))
});


// ==== TASKS ==== //
/**
 * Gulp Default Task
 *
 * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
 *
 */

// Watch Task
gulp.task('default', ['styles', 'adminStyles', 'js', 'browser-sync'], function () {
	gulp.watch('scss/**/*.scss', {cwd: source}, ['styles']);
	gulp.watch('scss/**/*.scss', {cwd: adminSource}, ['adminStyles']);
	gulp.watch('js/app/*.js', {cwd: source}, ['js', browserSync.reload]);
	gulp.watch('js/app/**/*.js', {cwd: source}, ['js', browserSync.reload]);
	gulp.watch('js/inc/*.js', {cwd: source}, ['js', browserSync.reload]);
});