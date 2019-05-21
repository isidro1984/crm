var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
 
// gulp.task('default', function() {
//   console.log('minifying js ...'); 
//   return gulp.src('resources/sass/app.scss')
//     .pipe(concat('crm.app.min.css'))
//     .pipe(gulp.dest('public/css/'));
// });

//sass
gulp.task('sass', function () {
    gulp.src(['resources/sass/app.scss'])
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename('crm.min.css'))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('default', gulp.series(['sass']));

