'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var pump = require('pump');

var sourcemaps = require('gulp-sourcemaps');
var sassInput = 'library/scss/styles.scss';
var sassOutput = 'library/css';
var javascriptDir = 'library/js/';

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
});

gulp.task('sass-prod', function () {
    gulp.src(sassInput)
    .pipe(sourcemaps.init())
   	.pipe(sass(sassOptionsPROD).on('error', sass.logError))
   	.pipe(sourcemaps.write())
    .pipe(gulp.dest(sassOutput));
});

gulp.task('javascript-prod', function (cb) {
  pump([
        gulp.src(javascriptDir + '*.js'),
        uglify(),
        gulp.dest(javascriptDir)
    ],
    cb
  );
});


gulp.task('watch', function () {
	gulp.watch(sassInput, ['sass']);
});

gulp.task('default', ['sass', 'watch']);
gulp.task('prod', ['sass-prod', 'javascript-prod']);











