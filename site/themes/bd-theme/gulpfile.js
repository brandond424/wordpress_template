'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var pump = require('pump');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var gulpFilter = require('gulp-filter');
var mainBowerFiles = require('gulp-main-bower-files');
var clean = require('gulp-clean');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

var sassInput = 'library/scss/*.scss';
var sassOutput = 'dist/css';
var javascriptDir = 'library/js/';
var javascriptOutput = 'dist/js';

var jsFiles = [
  'bower_components/bootstrap/dist/js/bootstrap.min.js', 
  'bower_components/slick-carousel/slick/slick.min.js',
  'bower_components/jquery-hoverintent/jquery.hoverIntent.min.js', 
  'bower_components/urijs/src/URI.min.js',
  // 'bower_components/font-awesome/svg-with-js/js/fontawesome-all.js',
  'bower_components/matchHeight/dist/jquery.matchHeight-min.js',
  'library/js/scripts.js'
];

var watchFiles = [
  "library/scss/**", 
  "library/images/**", 
  "library/js/**",
  "../bd-theme/*.php"
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
  return gulp.src(sassInput)
  .pipe(sourcemaps.init())
  .pipe(sass(sassOptions).on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest(sassOutput));
});

gulp.task('sass-prod', function () {
  return gulp.src(sassInput)
  .pipe(sourcemaps.init())
  .pipe(sass(sassOptionsPROD).on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest(sassOutput));
});

gulp.task('javascript', function() {
  return gulp.src(jsFiles)
  .pipe(concat('bundle.js'))
  .pipe(gulp.dest(javascriptOutput))
  .pipe(browserSync.reload());
});

gulp.task('javascript-prod', function () {
  return gulp.src(jsFiles)
  .pipe(concat('bundle.js'))
  .pipe(uglify())
  .pipe(gulp.dest(javascriptOutput));
});

gulp.task('clean', function () {
  return gulp.src('dist', {read: false, allowEmpty: true})
  .pipe(clean());
});

gulp.task('browser-init', function(cb) {
  browserSync.init(({
    proxy: "localhost",
    notify: false,
    port: 3000
  }));
});

// function watch() {
//   return gulp.watch(watchFiles, gulp.series('sass', 'javascript'));
// }

// gulp.task('default', function () {
//   gulp.watch(watchFiles, gulp.series('sass', 'javascript'));
// });

gulp.task('watch', function () {
  // gulp.watch([watchFiles], gulp.series('sass', 'javascript'));
  gulp.watch(watchFiles, gulp.series('clean', 'sass', 'javascript'));
});

gulp.task('default', gulp.parallel('browser-init', 'watch'));

gulp.task('prod', gulp.series('sass-prod', 'javascript-prod'));











