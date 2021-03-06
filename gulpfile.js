/**
 * Establish our gulp/node plugins for this project.
 */
var gulp			= require('gulp'),

	// Sass/Compass/related CSSy things
	sass			= require('gulp-sass'),
	postcss			= require('gulp-postcss'),
	autoprefixer	= require('autoprefixer'),
	cssnano			= require('gulp-cssnano'),
	sourcemaps		= require('gulp-sourcemaps'),
	kss				= require('kss'),
	csswring        = require('csswring'),

	// JavaScript
	jshint			= require('gulp-jshint'),
	uglify			= require('gulp-uglify'),

	// File system
	concat			= require('gulp-concat'),
	rename			= require('gulp-rename'),
	del				= require('del'),
	livereload		= require('gulp-livereload'),
	shell			= require('gulp-shell'),

	// Notifications and error handling
	gutil			= require('gulp-util'),
	plumber         = require('gulp-plumber');

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
	src_js_admin	= src_js + '/admin',
	src_sass		= src + '/sass',
	src_theme		= src + '/theme',
	src_plugin		= src + '/plugin',

	// Destination files, WordPress
	dest_theme		= __dirname + '/wp-content/themes/' + project,
	dest_theme_js	= dest_theme + '/js',
	dest_theme_css	= dest_theme + '/css',
	dest_plugin		= __dirname + '/wp-content/mu-plugins/' + project;

/**
 * Now, let's do things.
 */

/* ==========================================================================
   CSS
   ========================================================================== */

// Styles

gulp.task( 'styles', function() {

	return gulp.src( src_sass + '/**/*.scss' )
		.pipe( sourcemaps.init() )
		.pipe( plumber( function( err ) {
			gutil.beep();
			var errorText = err.message + '\n\n' + err.source;
			gutil.log( gutil.colors.red( errorText ) );
		} ) )
		.pipe( sass.sync() )
		.pipe( rename( function( path ) { path.extname = '.css' } ) )
		.pipe( postcss( [ autoprefixer( {
			browsers: [ 'last 2 versions', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ]
		}), csswring() ] ) )
		.pipe( rename( function( path ) { path.extname = '.min.css' } ) )
		.pipe( sourcemaps.write( '.' ) )
		.pipe( gulp.dest( dest_theme_css ) )
		.pipe( livereload() );
} );

// KSS
gulp.task( 'kss', function() {

	var kss_node = __dirname + '/node_modules/.bin/kss-node';

	return gulp.src( '' )
		.pipe( shell(
			kss_node + ' --source ' + src_sass + ' --css /wp-content/themes/rp3/css/rp3.css --title "RP3 Agency Web Style Guide"'
		) )
		.pipe( livereload() );

});

/* ==========================================================================
   JavaScript
   ========================================================================== */

// Scripts task: JSHint & minify custom js
// Scripts need to be loaded in a particular order. There's probably a better way of doing this.
gulp.task('scripts-custom', function() {
	return gulp.src([
			src_js + '/rp3.js',
			src_js + '/rp3.backbone.js',
			src_js + '/rp3.backbone.*.js',
			src_js + '/rp3.blog-search.js',
			src_js + '/rp3.google-maps.js',
			src_js + '/rp3.scroll-magic.js',
			src_js + '/rp3.skip-link-focus-fix.js',
			src_js + '/rp3.snapsketch.js',
			src_js + '/rp3.video.js'
		])
		.pipe(jshint(__dirname + '/.jshintrc'))
		.pipe(jshint.reporter('default'))
		.pipe(concat(project + '.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js))
		.pipe( livereload() );
});

// Scripts task: Modernizr
gulp.task( 'scripts-modernizr', function() {
	return gulp.src( '' )
		.pipe( shell(
			'modernizr -c ' + __dirname + '/modernizr-config.json -d ' + src_js_vendor + '/modernizr.js'
		) );
});

// Scripts task: Plugins
gulp.task('scripts-plugins', function() {
	return gulp.src(src_js_plugins + '/*.js')
		.pipe(concat(project + '-plugins.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js))
		.pipe( livereload() );
});

// Scripts task: Vendor
gulp.task('scripts-vendor', [ 'scripts-modernizr' ], function() {
	return gulp.src([
			src_js_vendor + '/modernizr.js',
			src_js_vendor + '/modernizr.clippath-polygon.js',
			src_js_vendor + '/picturefill.js'
		])
		.pipe(concat(project + '-vendor.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js))
		.pipe( livereload() );
});

// Scripts task: Admin
gulp.task('scripts-admin', function() {
	return gulp.src(src_js_admin + '/*.js')
		.pipe(concat(project + '-admin.js'))
		.pipe(gulp.dest(dest_theme_js))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest(dest_theme_js))
		.pipe( livereload() );
});

// Scripts task: run the three other scripts tasks
gulp.task('scripts', function() {
	gulp.start('scripts-custom');
	gulp.start('scripts-plugins');
	gulp.start('scripts-vendor');
	gulp.start('scripts-admin');
});


// Clean
gulp.task('clean', function() {
	del( [dest_theme, dest_plugin, __dirname + '/styleguide'], function() {
		console.log( 'Theme and plugin directories deleted.' );
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
		.pipe(gulp.dest(dest_theme))
		.pipe( livereload() );
});

// build-plugin
gulp.task('build-plugin', function() {
	var filesToMove = [
		src_plugin + '/**/*.*'
	];

	return gulp.src(filesToMove, { base: src_plugin })
		.pipe(gulp.dest(dest_plugin))
		.pipe( livereload() );
});

// build: combine build-theme and build-plugin
gulp.task('build', ['styles', 'scripts'], function() {
	gulp.start('build-theme');
	gulp.start('build-plugin');
});


// Default
gulp.task('default', function() {
	gulp.start('build');
	gulp.start('kss');
});


// Watch: watch our files and do things when they change
gulp.task('watch', function() {
	// Watch .scss files
	gulp.watch( src_sass + '/**/*.scss', ['styles', 'kss'] );

	// Watch custom JavaScript files
	gulp.watch( src_js + '/*.js', ['scripts-custom'] );

	// Watch admin JavaScript files
	gulp.watch( src_js_admin + '/*.js', ['scripts-admin'] );

	// Watch theme template files
	gulp.watch( src_theme + '/**/*.*', ['build-theme'] );

	// Watch plugin files
	gulp.watch( src_plugin + '/**/*.*', ['build-plugin'] );

	livereload.listen();
	gutil.log( 'LiveReload server activated' );
});
