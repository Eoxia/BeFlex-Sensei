'use strict';

var gulp         = require('gulp');
var watch        = require('gulp-watch');
var concat       = require('gulp-concat');
var sass         = require('gulp-sass')(require('sass'));
var rename       = require('gulp-rename');
var uglify       = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var lec          = require('gulp-line-ending-corrector');

var paths = {
	scss: [ 'assets/scss/**/*.scss', 'assets/css/' ],

  // Blocks.
  scss_bfs_course_tax: [ 'inc/blocks/bfs-course-tax/assets/scss/**/*.scss', 'inc/blocks/bfs-course-tax/assets/css/' ],
  scss_bfs_course_lessons: [ 'inc/blocks/bfs-course-lessons/assets/scss/**/*.scss', 'inc/blocks/bfs-course-lessons/assets/css/' ],
  scss_bfs_course_time: [ 'inc/blocks/bfs-course-time/assets/scss/**/*.scss', 'inc/blocks/bfs-course-time/assets/css/' ],
  scss_bfs_course_completion: [ 'inc/blocks/bfs-course-completion/assets/scss/**/*.scss', 'inc/blocks/bfs-course-completion/assets/css/' ],
  scss_bfs_login: [ 'inc/blocks/bfs-login/assets/scss/**/*.scss', 'inc/blocks/bfs-login/assets/css/' ],


  // scss_back: [ 'css/scss-admin/**/*.scss', 'css/' ],
	// js: ['js/beflex/**/*.js', 'js/']
};

/** SCSS */
gulp.task( 'build_scss', function() {
	return gulp.src( paths.scss[0] )
		.pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
		.pipe( autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}) )
		.pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
		.pipe( gulp.dest( paths.scss[1] ) )
		.pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe(rename(function(path) {
      path.basename += ".min";
    }))
		.pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
		.pipe( gulp.dest( paths.scss[1] ) );
});

/** SCSS Block BFS Course tax */
gulp.task( 'build_scss_bfs_course_tax', function() {
  return gulp.src( paths.scss_bfs_course_tax[0] )
    .pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
    .pipe( autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_tax[1] ) )
    .pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe( rename( './style.min.css' ) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_tax[1] ) );
});

/** SCSS Block BFS Course lessons */
gulp.task( 'build_scss_bfs_course_lessons', function() {
  return gulp.src( paths.scss_bfs_course_lessons[0] )
    .pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
    .pipe( autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_lessons[1] ) )
    .pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe( rename( './style.min.css' ) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_lessons[1] ) );
});

/** SCSS Block BFS Course time */
gulp.task( 'build_scss_bfs_course_time', function() {
  return gulp.src( paths.scss_bfs_course_time[0] )
    .pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
    .pipe( autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_time[1] ) )
    .pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe( rename( './style.min.css' ) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_time[1] ) );
});

/** SCSS Block BFS Course completion */
gulp.task( 'build_scss_bfs_course_completion', function() {
  return gulp.src( paths.scss_bfs_course_completion[0] )
    .pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
    .pipe( autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_completion[1] ) )
    .pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe( rename( './style.min.css' ) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_course_completion[1] ) );
});

/** SCSS Block BFS Login */
gulp.task( 'build_scss_bfs_login', function() {
  return gulp.src( paths.scss_bfs_login[0] )
    .pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
    .pipe( autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_login[1] ) )
    .pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
    .pipe( rename( './style.min.css' ) )
    .pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
    .pipe( gulp.dest( paths.scss_bfs_login[1] ) );
});

/** Scss Backadmin */
// gulp.task( 'build_scss_back', function() {
// 	return gulp.src( paths.scss_back[0] )
// 		.pipe( sass( { 'outputStyle': 'expanded' } ).on( 'error', sass.logError ) )
// 		.pipe( autoprefixer({
// 			browsers: ['last 2 versions'],
// 			cascade: false
// 		}) )
// 		.pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
// 		.pipe( gulp.dest( paths.scss_back[1] ) )
// 		.pipe( sass({outputStyle: 'compressed'}).on( 'error', sass.logError ) )
// 		.pipe( rename( './style-admin.min.css' ) )
// 		.pipe(lec({verbose:true, eolc: 'CRLF', encoding:'utf8'}))
// 		.pipe( gulp.dest( paths.scss_back[1] ) );
// });

/** JS */
// gulp.task( 'build_js', function() {
// 	return gulp.src( paths.js[0] )
// 		.pipe( concat( 'main.js' ) )
// 		.pipe( gulp.dest( paths.js[1] ) )
// 		.pipe( rename( 'main.min.js' ) )
// 		.pipe( uglify() )
// 		.pipe( gulp.dest( paths.js[1] ) )
// });

/** Watch */
gulp.task( 'default', function() {
	gulp.watch( paths.scss[0], gulp.series('build_scss') );

	gulp.watch( paths.scss_bfs_course_tax[0], gulp.series('build_scss_bfs_course_tax') );
	gulp.watch( paths.scss_bfs_course_lessons[0], gulp.series('build_scss_bfs_course_lessons') );
	gulp.watch( paths.scss_bfs_course_time[0], gulp.series('build_scss_bfs_course_time') );
	gulp.watch( paths.scss_bfs_course_completion[0], gulp.series('build_scss_bfs_course_completion') );
	gulp.watch( paths.scss_bfs_login[0], gulp.series('build_scss_bfs_login') );
	// gulp.watch( paths.scss_back[0], gulp.series('build_scss_back') );
	// gulp.watch( paths.js[0], gulp.series('build_js') );
});
