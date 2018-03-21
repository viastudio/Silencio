const gulp = require('gulp');
const gutil = require('gulp-util');
const run = require('run-sequence');
const requireDir = require('require-dir');

requireDir('./gulp-tasks');


let logErr = (msg) => {
    gutil.log(gutil.colors.red(`Error: ${msg}`));
};

let logWarn = (msg) => {
    gutil.log(gutil.colors.yellow(`Warning: ${msg}`));
};

let logInfo = (msg) => {
    gutil.log(gutil.colors.cyan(`Info: ${msg}`));
}

gulp.task('help', () => {
    logInfo(`Available commands:
    gulp        (Production build)
    gulp dev    (Dev build)
    gulp watch  (Dev build, then watch for SASS/JS changes)
    gulp clean  (Delete contents of res/build)
    gulp images (Uses Imagemin to compress images)`);
});

gulp.task('default', ['clean', 'prod-styles',  'webpack', 'images'], () => {
    logInfo("Running default does a production build.\nNo sourcemaps, all JS bundled");
    logWarn("This task will not work with VIA_ENVIRONMENT = 'dev'. Use 'gulp dev' or 'gulp watch' instead");
});

gulp.task('dev', ['clean', 'dev-styles', 'webpack', 'images'], () => {
    logInfo("Dev build.\nSourcemaps, vendor JS in a separate file.");
});

gulp.task('watch', ['dev'], () => {
    logInfo('Building with sourcemaps');

    gulp.watch('res/js/**/*js', ['webpack-watch']);
    gulp.watch('res/sass/**/*.scss', ['dev-styles']);
});
