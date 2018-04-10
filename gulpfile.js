let gulp = require('gulp');
let cleanCSS = require('gulp-clean-css');

gulp.task('default',['minify-css']);
 
gulp.task('minify-css', () => {
  return gulp.src('*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'));
});