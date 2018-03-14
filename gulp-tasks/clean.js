var gulp = require('gulp');

const del = require('del');

gulp.task('clean', () => {
    return del([
        'res/build/*'
    ]);
});
