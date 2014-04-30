## Gulp.js Installation Instructions

1. sudo npm install gulp -g (if not already installed on your system; you should only have to do this once, ever)
2. npm install gulp --sav-dev (at the root of your project)
3. npm install gulp-autoprefixer gulp-minify-css gulp-jshint gulp-uglify gulp-rename gulp-clean gulp-notify gulp-util gulp-concat gulp-ruby-sass --save-dev
4. gulp watch (for continuous watching of JS and SCSS)

## Editing Instructions

* All markup should go on index.php.
* All Sass is to be edited in src/sass/*
* All JS is to be edited in src/js/wawf.js
* Plugin JS files go in src/js/plugins (unminified)

Please be sure to always do a "git pull" before editing.  Things that I determine are more "global" may be shifted around as I feel is necessary.
