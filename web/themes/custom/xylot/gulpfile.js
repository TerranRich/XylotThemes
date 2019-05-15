var gulp = require('gulp');
var livereload = require('gulp-livereload');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function() {
  return gulp.src('./src/sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./css'));
});

gulp.task('uglify', function() {
  return gulp.src('./src/js/*.js')
    .pipe(uglify('main.js'))
    .pipe(gulp.dest('./js'))
});

gulp.task('watch', function() {
  livereload.listen();

  gulp.watch('./src/sass/**/*.scss', gulp.series('sass'));
  gulp.watch('./src/js/*.js', gulp.series('uglify'));
  gulp.watch(['./css/style.css', './**/*.twig', './js/*.js'], function (files){
    livereload.changed(files);
  });
});
