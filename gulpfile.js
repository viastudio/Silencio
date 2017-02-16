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
const gulpif = require('gulp-if');
const gutil = require('gulp-util');

let config = {
    env: 'prod',
    buildSourcemaps: false
};

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

let logErr = (msg) => {
    gutil.log(gutil.colors.red(`Error: ${msg}`));
};

let logWarn = (msg) => {
    gutil.log(gutil.colors.yellow(`Warning: ${msg}`));
};

let logInfo = (msg) => {
    gutil.log(gutil.colors.cyan(`Info: ${msg}`));
}

let emitVendorStyles = () => {
    //Combine all of our 3rd-party CSS into a separate file
    //This allows us to have sourcemaps for our stuff that
    //references the LESS files intead of the compiled CSS
    var vendorCSS = gulp.src(paths.css)
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.init()))
        .pipe(nano())
        .pipe(concat('vendor.min.css'))
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out));
};

let emitOurStyles = () => {
    return gulp.src(paths.less)
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.init()))
        .pipe(less())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(nano())
        .pipe(concat('global.min.css'))
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out));
};

let emitRespondJs = () => {
    //Emit respond.js as a separate file since it's included separately
    var respond = gulp.src('res/components/respond/dest/respond.src.js')
        .pipe(rename('respond.min.js'))
        .pipe(gulp.dest(paths.out));
};

let vendorJsStream = () => {
    //Pull in angular & other 3rd party JS files into their own streams
    //This is so we can avoid transpiling them which causes problems
    return gulp.src(paths.vendorScripts);
};

let ourJsStream = () => {
    //Grab all of our JS and convert from ES6 as needed
    return gulp.src(paths.ourScripts)
        .pipe(babel({
            presets: ['es2015']
        }));
};

gulp.task('vendor-scripts', () => {
    let vendorJS = vendorJsStream();

    return vendorJS
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.init()))
        .pipe(uglify())
        .pipe(concat('vendor.min.js'))
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out));
});

gulp.task('dev-scripts', () => {
    let ourJS = ourJsStream();

    return ourJS
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.init()))
        .pipe(uglify())
        .pipe(concat('global.min.js'))
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out))
    ;
});

gulp.task('scripts', () => {
    emitRespondJs();

    var vendorJS = vendorJsStream();
    var ourJS = ourJsStream();

    //NOTE: merge2 processes the streams in order (which is important for us)
    //This minifies all JS and combines all of them into a single file
    return merge2(vendorJS, ourJS)
        .pipe(uglify())
        .pipe(concat('global.min.js'))
        .pipe(gulp.dest(paths.out))
    ;
});

gulp.task('vendor-styles', () => {
    emitVendorStyles();
});

gulp.task('our-styles', () => {
    emitOurStyles();
});

gulp.task('styles', () => {
    emitVendorStyles();
    emitOurStyles();
});

gulp.task('watch', ['clean', 'vendor-styles', 'vendor-scripts', 'dev'], () => {
    config.env = 'dev';
    config.buildSourcemaps = true;
    logInfo('Building with sourcemaps');

    gulp.watch('res/js/**/*js', ['dev-scripts']);
    gulp.watch('res/less/**/*.less', ['our-styles']);
});

gulp.task('dev', () => {
    config.env = 'dev';
    config.buildSourcemaps = true;
    logInfo("Dev build.\nSourcemaps, vendor JS in a separate file.");

    run('vendor-styles', 'our-styles', 'vendor-scripts', 'dev-scripts');
});

gulp.task('clean', () => {
    return del([
        'res/build/*'
    ]);
});

gulp.task('help', () => {
    logInfo(`Available commands:
    gulp        (Production build)
    gulp dev    (Dev build)
    gulp watch  (Dev build, then watch for LESS/JS changes)
    gulp clean  (Delete contents of res/build)`);
});

gulp.task('default', ['clean', 'styles', 'scripts'], () => {
    logInfo("Running default does a production build.\nNo sourcemaps, all JS bundled");
    logWarn("This task will not work with VIA_ENVIRONMENT = 'dev'. Use 'gulp dev' or 'gulp watch' instead");
});
