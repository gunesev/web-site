const gulp = require('gulp')
const browserSync = require('browser-sync').create()
const sass = require('gulp-sass')
const prefix = require('gulp-autoprefixer')
const plumber = require('gulp-plumber')
const pug = require('gulp-pug')
const reload = browserSync.reload

gulp.task('browser-sync', function () {
   browserSync.init({
      server: {
         baseDir: './'
      },
      open:false,
      online:false,
      notify:false
   })
   gulp.watch('./index.html', ['html'])
   gulp.watch('./scss/**/*.scss', ['css'])
   gulp.watch('./js/**/*.js', reload)
})

gulp.task('css', () => {
   return gulp.src('./scss/main.scss')
       .pipe(plumber([{ errorHandler: false }]))
       .pipe(sass())
       .pipe(prefix())
       .pipe(gulp.dest('./'))
       .pipe(browserSync.stream())
})

gulp.task('html', (done) => {
   browserSync.reload()
   done()
})

gulp.task('default', ['browser-sync', 'html', 'css'])