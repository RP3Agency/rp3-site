/**
 * Establish our gulp/node plugins for this project.
 */
var gulp			= require('gulp'),

	// Sass/Compass/related CSSy things
	sass			= require('gulp-ruby-sass'),
	autoprefixer	= require('gulp-autoprefixer'),
	minifycss		= require('gulp-minify-css'),
	sourcemaps		= require('gulp-sourcemaps'),

	// JavaScript
	jshint			= require('gulp-jshint'),
	uglify			= require('gulp-uglify'),

	// File system
	concat			= require('gulp-concat'),
	rename			= require('gulp-rename'),
	del				= require('del'),

	// Notifications and error handling
	gutil			= require('gulp-util');

/**
 * Set our source and destination variables
 */
var // Project
	project			= 'rp3',	// a short code for establishing things like
								// the resulting JavaScript file, etc.

	// Source files
	src				= __dirname + '/src',
	src_js			= src + '/js',
	src_js_vendor	= src_js + '/vendor',
	src_js_plugins	= src_js + '/plugins',
	src_sass		= src + '/sass',
	src_theme		= src + '/theme',
	src_plugin		= src + '/plugin',

	// Destination files, WordPress
	dest_theme		= __dirname + '/wp-content/themes/' + project,
	dest_theme_js	= dest_theme + '/js',
	dest_theme_css	= dest_theme + '/css',
	dest_plugin		= __dirname + '/wp-content/plugins/' + project;

/**
 * Now, let's do things.
 */


// Styles
gulp.task('styles', function() {
	return gulp.src(src_sass + '/*.scss')
		.pipe(sass({
			bundleExec: true,
			require: ['susy', 'breakpoint']
		}))
		.on( 'error', gutil.log )
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(autoprefixer({
			browsers: ['last 2 versions', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(dest_theme_css))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest(dest_theme_css));
});


// Scripts task: JSHint & minify custom js
gulp.task('scripts-custom', function() {
	return gulp.src(src_js + '/*.js')
		.pipe(jshint(__dirname + '/.jshintrc'))
		.pipe(jshint.reporter('default'))
		.pipe(concat(project + '.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js));
});

// Scripts task: Plugins
gulp.task('scripts-plugins', function() {
	return gulp.src(src_js_plugins + '/*.js')
		.pipe(concat(project + '-plugins.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js));
});

// Scripts task: Vendor
gulp.task('scripts-vendor', function() {
	return gulp.src(src_js_vendor + '/*.js')
		.pipe(concat(project + '-vendor.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js));
});

// Scripts task: run the three other scripts tasks
gulp.task('scripts', function() {
	gulp.start('scripts-custom');
	gulp.start('scripts-plugins');
	gulp.start('scripts-vendor');
});


// Clean
gulp.task('clean', function() {
	// del( [dest_theme, dest_plugin], function(err) {
	del( [dest_theme], function( err ) {
		// console.log( 'Theme and plugin directories deleted.' );
		console.log( 'Theme directory deleted.' );
	});
});


// build-theme: build template files to the wp-content directory
// In the process, run our CSS & JS processing
gulp.task('build-theme', function() {
	var filesToMove = [
		src_theme + '/**/*.*',
		src_theme + '/**/.htaccess'
	];

	return gulp.src(filesToMove, { base: src_theme })
		.pipe(gulp.dest(dest_theme));
});

// build-plugin
// on hold for this project
// gulp.task('build-plugin', function() {
// 	var filesToMove = [
// 		src_plugin + '/**/*.*'
// 	];

// 	return gulp.src(filesToMove, { base: src_plugin })
// 		.pipe(gulp.dest(dest_plugin));
// });

// build: combine build-theme and build-plugin
gulp.task('build', ['styles', 'scripts'], function() {
	gulp.start('build-theme');
	// gulp.start('build-plugin');
});


// Dist: much like build, except clean our destination first.
gulp.task('dist', ['clean'], function() {
	gulp.start('build');
});

// Default: right now, just running build
gulp.task('default', function() {
	gulp.start('build');
});


// Watch: watch our files and do things when they change
gulp.task('watch', function() {
	// Watch .scss files
	gulp.watch( src_sass + '/**/*.scss', ['styles'] );

	// Watch custom JavaScript files
	gulp.watch( src_js + '/*.js', ['scripts-custom'] );

	// Watch theme template files
	gulp.watch( src_theme + '/**/*.*', ['build-theme'] );
});
