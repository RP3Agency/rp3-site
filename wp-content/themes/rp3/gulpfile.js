var gulp			= require('gulp'),
	sass			= require('gulp-ruby-sass'),
	autoprefixer	= require('gulp-autoprefixer'),
	minifycss		= require('gulp-minify-css'),
	jshint			= require('gulp-jshint'),
	uglify			= require('gulp-uglify'),
	rename			= require('gulp-rename'),
	clean			= require('gulp-clean'),
	concat			= require('gulp-concat'),
	notify			= require('gulp-notify'),
	cache			= require('gulp-cache'),
	gutil			= require('gulp-util');

// Styles
gulp.task('styles', function() {
	return gulp.src('src/sass/rp3.scss')
		.pipe(sass({ style: 'expanded' }))
		.on( 'error', gutil.log )
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(gulp.dest('css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('css'))
		.pipe(notify({ message: 'Styles task complete' }));
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
		.pipe(gulp.dest('js'))
		.pipe(notify({message: 'Scripts task complete'}));
});

// Clean
gulp.task('clean', function() {
	return gulp.src(['css'], {read: false})
		.pipe(clean());
});

// Default
gulp.task('default', ['clean'], function() {
	gulp.start('styles');
	gulp.start('scripts');
});

// Watch
gulp.task('watch', function() {
	gulp.start('default');

	// Watch .scss files
	gulp.watch('src/sass/**/*.scss', ['styles']);

	// Watch JavaScript files
	gulp.watch('src/js/*.js', ['scripts']);
});
