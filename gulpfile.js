var gulp = require('gulp'),
    concat = require('gulp-concat'),
    cleanCSS = require('gulp-clean-css'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant');

gulp.task('default',['css','js','js-actions','watch']);

gulp.task('css', function () {
    return gulp.src(['resources/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css','resources/plugins/sweetalert2.min.css'])
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest('public/css'));
});

gulp.task('js', function() {
    return gulp.src(['resources/plugins/jquery-3.3.1.min.js', 'resources/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js', 'resources/plugins/sweetalert2.min.js', 'resources/plugins/jquery.validate.min.js', 'resources/plugins/jquery.inputmask.bundle.min.js'])
        .pipe(uglify())
        .pipe(concat('bundle.min.js'))
        .pipe(gulp.dest('public/js'));
});

gulp.task('js-actions', function() {
    return gulp.src(['resources/js/actions/*'])
        .pipe(uglify())
        .pipe(gulp.dest('public/js/actions'));
});

gulp.task('watch', function() {
    gulp.watch('resources/js/actions/*',['js-actions']);
});

gulp.task('image', function() {
    return gulp.src('public/images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('public/images'));
});
