var gulp			= require('gulp'),
	// sass			= require('gulp-ruby-sass'),
	compass			= require('gulp-compass'),
	autoprefixer	= require('gulp-autoprefixer'),
	minifycss		= require('gulp-minify-css'),
	jshint			= require('gulp-jshint'),
	uglify			= require('gulp-uglify'),
	rename			= require('gulp-rename'),
	rimraf			= require('gulp-rimraf'),
	concat			= require('gulp-concat'),
	gutil			= require('gulp-util');

// Styles
gulp.task('styles', function() {
	return gulp.src('src/sass/*.scss')
		.pipe(compass({
			config_file: './config.rb',
			css: 'wp-content/themes/rp3/css',
			sass: 'src/sass'
		}))
		.on( 'error', gutil.log )
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(gulp.dest('wp-content/themes/rp3/css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('wp-content/themes/rp3/css'));
});

// Scripts task: JSHint & minify
gulp.task('scripts', function() {
	return gulp.src('src/js/*.js')
		// .pipe(jshint('.jshintrc'))
		// .pipe(jshint.reporter('default'))
		.pipe(concat('rp3.js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest('wp-content/themes/rp3/js'));
});

// Scripts task: Plugins
gulp.task('scripts-plugins', function() {
	return gulp.src('src/js/plugins/*.js')
		.pipe(concat('rp3-plugins.js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest('wp-content/themes/rp3/js'));
});

// Scripts task: Vendor
gulp.task('scripts-vendor', function() {
	return gulp.src('src/js/vendor/*.js')
		.pipe(concat('rp3-vendor.js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.on('error', gutil.log)
		.pipe(gulp.dest('wp-content/themes/rp3/js'));
});

// Clean
gulp.task('clean', function() {
	return gulp.src(['wp-content/themes/rp3/css', 'wp-content/themes/rp3/js'], { read: false })
		.pipe(rimraf());
});

// Default
gulp.task('default', ['clean'], function() {
	gulp.start('styles');
	gulp.start('scripts');
	gulp.start('scripts-plugins');
	gulp.start('scripts-vendor');
});

// Watch
gulp.task('watch', function() {
	gulp.start('default');

	// Watch .scss files
	gulp.watch('src/sass/**/*.scss', ['styles']);

	// Watch JavaScript files
	gulp.watch('src/js/*.js', ['scripts']);
	gulp.watch('src/js/plugins/*.js', ['scripts-plugins']);
	gulp.watch('src/js/vendor/*.js', ['scripts-vendor']);
});
