var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
 
//sass
gulp.task('sass', function () {
    gulp.src(['resources/sass/app.scss'])
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename('crm.min.css'))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('default', gulp.series(['sass']));

