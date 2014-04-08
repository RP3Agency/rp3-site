var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	jshint = require('gulp-jshint'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	rename = require('gulp-rename'),
	clean = require('gulp-clean'),
	concat = require('gulp-concat'),
	notify = require('gulp-notify'),
	cache = require('gulp-cache'),
	livereload = require('gulp-livereload'),
	lr = require('tiny-lr'),
	server = lr();

gulp.task('styles', function() {
	return gulp.src('src/sass/rp3.scss')
		.pipe(sass({ style: 'expanded' }))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(gulp.dest('src/sass'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('css'))
		.pipe(livereload(server))
		.pipe(notify({ message: 'Styles task complete' }));
});

// Clean
gulp.task('clean', function() {
	return gulp.src(['css'], {read: false})
		.pipe(clean());
});

gulp.task('default', ['clean'], function() {
	gulp.start('styles');
});

gulp.task('watch', function() {
	gulp.start('default');

	// Watch .scss files
	gulp.watch('src/sass/**/*.scss', ['styles']);
});
