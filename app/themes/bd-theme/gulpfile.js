'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

var db_host = 'localhost';
var db_user = 'root';
var db_password = 'root';
var db_database = 'bayercdn_db';
var sassInput = 'library/scss/styles.scss';
var sassOutput = 'library/css';

var sassOptions = {
	errLogToConsole: true,
	outputStyle: 'expanded'
}

gulp.task('sass', function () {
    gulp.src(sassInput)
    .pipe(sourcemaps.init())
   	.pipe(sass(sassOptions).on('error', sass.logError))
   	.pipe(sourcemaps.write())
    .pipe(gulp.dest(sassOutput));
});

gulp.task('watch', function () {
	gulp.watch(sassInput, ['sass']);
});

gulp.task('default', ['sass', 'watch']);