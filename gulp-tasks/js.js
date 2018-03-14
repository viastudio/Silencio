const gulp = require('gulp');
const config = require('./config.js');

const concat = require('gulp-concat');
const rename = require('gulp-rename');
const webpack = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');

gulp.task('vendor-scripts', () => {
    return gulp.src(paths.vendorScripts)
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(paths.out));
});

gulp.task('webpack-watch', function (done) {
    webpackConfig.watch = true;

    return gulp.src('res/js/global.js')
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest(paths.out));
});

gulp.task('webpack', function (done) {
    webpackConfig.watch = false;

    return gulp.src('res/js/global.js')
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest(paths.out));
});
