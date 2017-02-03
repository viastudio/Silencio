const gulp = require('gulp');
const less = require('gulp-less');
const autoprefixer = require('gulp-autoprefixer');
const cssmin = require('gulp-cssmin');
const uglify = require('gulp-uglify');
const run = require('run-sequence');
const merge = require('merge-stream');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
const del = require('del');
const rename = require('gulp-rename');
const gutil = require('gulp-util');

const paths = {
    scripts: [
        'res/components/jquery/dist/jquery.js',
        'res/components/bootstrap/dist/js/bootstrap.js',
        'res/components/fitvids/jquery.fitvids.js',
        'res/components/picturefill/dist/picturefill.js',
        'res/js/global.js'
    ],
    css: [
        'res/components/bootstrap/dist/css/bootstrap.css',
        'res/components/font-awesome/css/font-awesome.css'
    ],
    less: ['res/less/**/*.less'],
    out: 'res/build/'
};

gulp.task('scripts', () => {
    var respond = gulp.src('res/components/respond/dest/respond.src.js')
        .pipe(rename('respond.min.js'))
        .pipe(gulp.dest(paths.out));

    return gulp.src(paths.scripts)
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(uglify().on('error', gutil.log))
        .pipe(concat('global.min.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(paths.out));
});

//Compile any 3rd-party CSS
gulp.task('css', () => {
    return gulp.src(paths.css)
        .pipe(sourcemaps.init())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(concat('dist.min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(paths.out));
});

//Compile our LESS files
gulp.task('less', () => {
    return gulp.src(paths.less)
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(concat('global.min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(paths.out));
});

gulp.task('styles', ['css', 'less']);

gulp.task('watch', () => {
    gulp.watch('res/js/**/*js', ['scripts']);
    gulp.watch('res/css/**/*.css', ['styles']);
    gulp.watch('res/less/**/*.less', ['styles']);
});

gulp.task('clean', () => {
    return del([
        'res/build/*'
    ]);
});

gulp.task('default', ['styles', 'scripts']);
