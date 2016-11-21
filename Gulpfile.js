var gulp = require('gulp');
var util = require('gulp-util');
var sass = require('gulp-sass');
var beautify = require('gulp-cssbeautify');
var neat = require('node-neat').includePaths;
var browserSync = require('browser-sync');
var paths = {
  scss: './sass/*.scss'
};
gulp.task('sass', function() {
  gulp.src('scss/style.scss')
    .pipe(sass({
      includePaths: ['scss'].concat(neat)
    }))
    .on('error', util.log)
    .pipe(beautify())
    .pipe(gulp.dest('./'));
});
gulp.task('browser-sync', function() {
  browserSync.init(["./*.css", "js/*.js", "templates/*.php"], {
    proxy: "localhost:1337"
  });
});
gulp.task('watch', ['sass', 'browser-sync'], function() {
  gulp.watch(["scss/*.scss", "scss/base/*.scss", "scss/sections/*.scss", "scss/style/*.scss"], ['sass']);
  gulp.watch("templates/*.php").on('change', browserSync.reload);
});
