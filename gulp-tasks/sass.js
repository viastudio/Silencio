const gulp = require('gulp');
const config = require('./config.js');

const autoprefixer = require('gulp-autoprefixer');
const gulpif = require('gulp-if');
const nano = require('gulp-cssnano');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');

let emitOurStyles = (buildSourceMaps) => {
    return gulp.src(paths.sass)
        .pipe(gulpif(buildSourceMaps, sourcemaps.init()))
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(nano())
        .pipe(gulpif(buildSourceMaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out));
};

gulp.task('dev-styles', () => {
    emitOurStyles(true);
});

gulp.task('prod-styles', () => {
    emitOurStyles(false);
});
