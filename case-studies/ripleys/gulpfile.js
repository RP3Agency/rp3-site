/**
 * Load up gulp plugins
 */
var	casestudy		= 'ripleys',
	gulp			= require('gulp'),
	sass			= require('gulp-ruby-sass'),
	autoprefixer	= require('gulp-autoprefixer'),
	minifycss		= require('gulp-minify-css'),
	jshint			= require('gulp-jshint'),
	uglify			= require('gulp-uglify'),
	rename			= require('gulp-rename'),
	clean			= require('gulp-clean'),
	concat			= require('gulp-concat'),
	notify			= require('gulp-notify'),
	gutil			= require('gulp-util');

/**
 * SCSS processing
 */
gulp.task('styles', function() {
	return gulp.src('src/sass/' + casestudy + '.scss')
		.pipe(sass({ style: 'expanded' }))
		.on('error', gutil.log)
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(gulp.dest('css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('css'))
		.pipe(notify({ message: 'Styles task complete' }));
});

/**
 * JavaScript processing of the file we wrote
 * (jshint, minification)
 */
gulp.task('scripts', function() {
	return gulp.src('src/js/*.js')
		.pipe(jshint('.jshintrc'))
		.pipe(jshint.reporter('default'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest('js'))
		.pipe(notify({ message: 'Scripts task complete' }));
});

/**
 * JavaScript processing of (mostly) jQuery plugins
 * Place individual, non-minified plugins in src/js/plugins
 * this task will concatenate and minify them (but not
 * bother with JSHint)
 */
gulp.task( 'scripts-plugins', function() {
	return gulp.src( 'src/js/plugins/*.js' )
		.pipe( concat( 'plugins.js' ) )
		.pipe( gulp.dest( 'src/js/plugins' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( uglify() )
		.pipe( gulp.dest( 'js' ) )
		.pipe( notify( { message: 'Scripts (plugins) task complete' } ) );
});

/**
 * Clean task
 */
gulp.task( 'clean', function() {
	return gulp.src( [ 'css/*.css', 'js/*.js' ], { read: false } )
		.pipe( clean() );
});

/**
 * Default task
 */
gulp.task( 'default', ['clean'], function() {
	gulp.start( 'styles', 'scripts', 'scripts-plugins' );
});

/**
 * Watch task
 */
gulp.task( 'watch', function() {
	gulp.start( 'default' );
	gulp.watch( 'src/scss/**/*.scss', ['styles'] );
	gulp.watch( 'src/js/*.js', ['scripts'] );
	gulp.watch( 'src/js/plugins/*.js', ['scripts-plugins'] );
});
