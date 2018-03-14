const gulp = require('gulp');

/*
** Images: Imagemin is the default for images added to the theme.
** For large/hi-res image needs add Guetzli to build process.
** Don't forget to change image paths to /build/img
*/

const changed = require('gulp-changed');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');

gulp.task('images', () => {
    const dest = 'res/build/img';

    return gulp.src('res/img/*')
        .pipe(changed(dest))
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(dest))
});
