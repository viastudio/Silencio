const gulp = require('gulp');
const less = require('gulp-less');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const nano = require('gulp-cssnano');
const run = require('run-sequence');
const merge2 = require('merge2');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
const del = require('del');
const rename = require('gulp-rename');

const paths = {
    vendorScripts: [
        'res/components/jquery/dist/jquery.js',
        'res/components/bootstrap/dist/js/bootstrap.js',
        'res/components/fitvids/jquery.fitvids.js',
        'res/components/picturefill/dist/picturefill.js'
    ],
    ourScripts: [
        'res/js/global.js'
    ],
    css: [
        'res/components/bootstrap/dist/css/bootstrap.css',
        'res/components/font-awesome/css/font-awesome.css'
    ],
    less: [
        'res/less/typography.less',
        'res/less/layout.less'
    ],
    out: 'res/build/'
};

gulp.task('scripts', () => {
    //Emit response.js as a separate file since it's included separately
    var respond = gulp.src('res/components/respond/dest/respond.src.js')
        .pipe(rename('respond.min.js'))
        .pipe(gulp.dest(paths.out));

    //Pull in angular & other 3rd party JS files into their own streams
    //This is so we can avoid transpiling them which causes problems
    var vendorJS = gulp.src(paths.vendorScripts);

    //Grab all of our JS and convert from ES6 as needed
    var ourJS = gulp.src(paths.ourScripts)
        .pipe(babel({
            presets: ['es2015']
        }));

    //NOTE: merge2 processes the streams in order (which is important for us)
    //This step builds sourcemaps (into global.min.js.map), minifies
    //all JS and combines all of them into a single file
    return merge2(vendorJS, ourJS)
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('global.min.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.out))
    ;
});

gulp.task('styles', () => {
    //Combine all of our 3rd-party CSS into a separate file
    //This allows us to have sourcemaps for our stuff that
    //references the LESS files intead of the compiled CSS
    var vendorCSS = gulp.src(paths.css)
        .pipe(sourcemaps.init())
        .pipe(nano())
        .pipe(concat('vendor.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.out));

    return gulp.src(paths.less)
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(nano())
        .pipe(concat('global.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.out));
});

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
