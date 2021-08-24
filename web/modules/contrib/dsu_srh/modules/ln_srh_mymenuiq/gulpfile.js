

    var gulp = require('gulp');
    var sass = require('gulp-sass');
    var browserSync = require('browser-sync').create();

    //style paths
    var sassFiles = './scss/components/*.scss',
        styles = './scss/mymenuiq.scss',
        cssDest = './css/',
        htmlFiles = './templates/*.twig',
        jsFiles = './js/*.js';

    gulp.task('sass', function () {
        return gulp.src(styles)
            .pipe(sass())
            .pipe(gulp.dest(cssDest))
            .pipe(browserSync.stream());
    });

    gulp.task('watch', function(){

        // browserSync.init({
        //     // server: {
        //     //     baseDir: "./"
        //     // },
        //     proxy: 'http://drupalsrh.dd:8083/recipes/peanut-soup-healthy-2',
        //     host: 'http://drupalsrh.dd:8083',
        //     open: false,
        //     notify: false,
        //     ghost: false
        // });

        gulp.watch(sassFiles, gulp.parallel('sass'));
        // gulp.watch(htmlFiles).on('change', browserSync.reload);
        // gulp.watch(jsFiles).on('change', browserSync.reload);
    });

    // Default Task
    //gulp.task('default', gulp.parallel('sass', 'watch'));
    gulp.task('default', gulp.parallel('sass', 'watch'));
    // exports.watch = watch;
    // exports.sass = sass;