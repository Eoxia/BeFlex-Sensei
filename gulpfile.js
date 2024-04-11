'use strict';

var gulp         = require('gulp');
var watch        = require('gulp-watch');
var sass         = require('gulp-sass')(require('sass'));
var rename       = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var lec          = require('gulp-line-ending-corrector');
var path         = require('path');

var scss_paths = [
  'assets/scss/**/*.scss',

  'inc/blocks/bfs-course-tax/assets/scss/**/*.scss',
  'inc/blocks/bfs-course-lessons/assets/scss/**/*.scss',
  'inc/blocks/bfs-course-time/assets/scss/**/*.scss',
  'inc/blocks/bfs-course-completion/assets/scss/**/*.scss',
  'inc/blocks/bfs-login/assets/scss/**/*.scss'
];

/** SCSS */
gulp.task( 'build_scss', function() {
  return gulp.src( scss_paths )
    .pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
    .pipe( autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest(function(file) {
      return path.join(file.base, '..', 'css' );
    }) )
    .pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe(rename(function (path) {
      path.basename += ".min";
      path.extname = ".css";
    }))
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest(function(file) {
      return path.join(file.base, '..', 'css' );
    }) )
});

/** Watch */
gulp.task( 'default', function() {
  gulp.watch( scss_paths, gulp.series('build_scss') );
});
