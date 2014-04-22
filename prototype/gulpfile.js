// Define our Gulp plugins
var gulp = require( 'gulp' ),
	sass = require( 'gulp-ruby-sass' ),
	autoprefixer = require( 'gulp-autoprefixer' ),
	minifycss = require( 'gulp-minify-css' ),
	jshint = require( 'gulp-jshint' ),
	uglify = require( 'gulp-uglify' ),
	rename = require( 'gulp-rename' ),
	clean = require( 'gulp-clean' ),
	concat = require( 'gulp-concat' ),
	notify = require( 'gulp-notify' );

// Sass & CSS processing
gulp.task( 'styles', function() {
	return gulp.src( 'src/scss/**/*.scss')
		.pipe( sass( { style: 'expanded' } ) )
		.pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ) )
		.pipe( gulp.dest( 'css' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( minifycss() )
		.pipe( gulp.dest( 'css' ) )
		.pipe( notify( { message: 'Styles task complete' } ) );
});

// JavaScript processing
gulp.task( 'scripts', function() {
	return gulp.src( 'src/js/main.js' )
		.pipe( jshint( '.jshintrc' ) )
		.pipe( jshint.reporter( 'default' ) )
		.pipe( gulp.dest( 'src/js' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( uglify() )
		.pipe( gulp.dest( 'js' ) )
		.pipe( notify( { message: 'Scripts task complete' } ) );
});

gulp.task( 'scripts-vendor', function() {
	return gulp.src( 'src/js/vendor/*.js' )
		.pipe( gulp.dest( 'js/vendor' ) )
		.pipe( notify( { message: 'Scripts (vendor) task complete' } ) );
});

gulp.task( 'scripts-plugins', function() {
	return gulp.src( 'src/js/plugins/*.js' )
		.pipe( concat( 'plugins.js' ) )
		.pipe( gulp.dest( 'src/js/plugins' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( uglify() )
		.pipe( gulp.dest( 'js' ) )
		.pipe( notify( { message: 'Scripts (plugins) task complete' } ) );
});

// Image processing
// gulp.task( 'images', function() {
// 	return gulp.src( 'src/images/**/*' )
// 		.pipe( cache( imagemin( { optimizationLevel: 5, progressive: true, interlaced: true } ) ) )
// 		.pipe( gulp.dest( 'images' ) )
// 		.pipe( notify( { message: 'Images task complete' } ) );
// });

// Clean task
gulp.task( 'clean', function() {
	return gulp.src( ['css', 'js' ], { read: false } )
		.pipe( clean() );
});

// "Default" task
gulp.task( 'default', ['clean'], function() {
	gulp.start( 'styles', 'scripts', 'scripts-vendor', 'scripts-plugins' );
});

// "Watch" task
gulp.task( 'watch', function() {
	gulp.start( 'default' );
	gulp.watch( 'src/scss/**/*.scss', ['styles'] );
	gulp.watch( 'src/js/*.js', ['scripts'] );
	gulp.watch( 'src/js/vendor/*.js', ['scripts-vendor'] );
	gulp.watch( 'src/js/plugins/*.js', ['scripts-plugins'] );
	// gulp.watch( 'src/images/**/*', ['images'] );
});
