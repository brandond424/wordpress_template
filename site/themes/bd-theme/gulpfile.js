'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var minify = require('gulp-minify');
var pump = require('pump');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var gulpFilter = require('gulp-filter');
var mainBowerFiles = require('gulp-main-bower-files');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

var sassInput = 'library/scss/*.scss';
var sassOutput = 'library/css';
var javascriptDir = 'library/js/';

var jsFiles = [
  'library/js/libs/jquery-ui.min.js',
  'bower_components/jquery-hoverintent/jquery.hoverIntent.min.js', 
  'bower_components/bootstrap/dist/js/bootstrap.min.js', 
  'bower_components/slick-carousel/slick/slick.min.js',
  'bower_components/urijs/src/URI.min.js',
  'library/js/libs/fontawesome-all.js',
  'library/js/libs/matchHeight.min.js',
  'library/js/interactive-tool.js',
  'library/js/scripts.js'
];

var watchFiles = [
  "library/scss/**", 
  "library/images/**", 
  "library/js/**",
  "../landa-theme/*.php"
];

var sassOptions = {
	errLogToConsole: true,
	outputStyle: 'expanded'
}

var sassOptionsPROD = {
	errLogToConsole: false,
	outputStyle: 'compressed'
}

gulp.task('sass', function () {
    gulp.src(sassInput)
    .pipe(sourcemaps.init())
   	.pipe(sass(sassOptions).on('error', sass.logError))
   	.pipe(sourcemaps.write())
    .pipe(gulp.dest(sassOutput));
    browserSync.reload();
});

gulp.task('sass-prod', function () {
    gulp.src(sassInput)
    .pipe(sourcemaps.init())
   	.pipe(sass(sassOptionsPROD).on('error', sass.logError))
   	.pipe(sourcemaps.write())
    .pipe(gulp.dest(sassOutput));
});

gulp.task('javascript', function() {
  return gulp.src(jsFiles)
      .pipe(concat('bootstrap.js'))
      .pipe(gulp.dest(javascriptDir));
      browserSync.reload();
});

gulp.task('javascript-prod', function () {
  return gulp.src(jsFiles)
    .pipe(concat('bootstrap.js'))
    .pipe(gulp.dest(javascriptDir))
    .pipe(minify())
    .pipe(gulp.dest(javascriptDir));
});


gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: "localhost"
  });
});


gulp.task('watch', function () {
  gulp.watch(watchFiles, ['sass', 'javascript']);
});

gulp.task('default', ['sass', 'watch', 'browser-sync']);

gulp.task('prod', ['sass-prod', 'javascript-prod']);











