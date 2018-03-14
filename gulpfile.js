const gulp = require('gulp');
const sass = require('gulp-sass');
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
const webpack = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');

/*
** Images: Imagemin is the default for images added to the theme.
** For large/hi-res image needs add Guetzli to build process.
** Don't forget to change image paths to /build/img
*/

const changed = require('gulp-changed');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');

const paths = {
    vendorScripts: [
        'node_modules/fitvids.1.1.0/jquery.fitvids.js',
        'node_modules/picturefill/dist/picturefill.js',
        'node_modules/babel-polyfill/dist/polyfill.min.js',
        'node_modules/whatwg-fetch/fetch.js',
    ],
    css: [
        'node_modules/font-awesome/css/font-awesome.css'
    ],
    sass: [
        'res/sass/layout.scss',
    ],
    aboveFold: [
        'res/sass/above-the-fold.scss',
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

let config = {
    env: 'prod',
    buildSourcemaps: false
};

if (typeof process.env.ENVIRONMENT !== 'undefined' && process.env.ENVIRONMENT !== 'undefined') {
    config.env = 'dev';
    logInfo(`Performing dev build since ENVIRONMENT was set to ${process.env.ENVIRONMENT}.`);
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
    return gulp.src(paths.sass)
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.init()))
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(nano())
        .pipe(concat('global.min.css'))
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out));
};

let emitAboveTheFoldStyles = () => {
    return gulp.src(paths.aboveFold)
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(nano())
        .pipe(concat('above-the-fold.min.css'))
        .pipe(gulpif(config.buildSourcemaps, sourcemaps.write('.')))
        .pipe(gulp.dest(paths.out));
};

let emitRespondJs = () => {
    //Emit respond.js as a separate file since it's included separately
    var respond = gulp.src('node_modules/respond.js/dest/respond.src.js')
        .pipe(rename('respond.min.js'))
        .pipe(gulp.dest(paths.out));
};

gulp.task('vendor-scripts', () => {
    return gulp.src(paths.vendorScripts)
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(paths.out));
});

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

gulp.task('vendor-styles', () => {
    emitVendorStyles();
});

gulp.task('our-styles', () => {
    emitOurStyles();
    emitAboveTheFoldStyles();
});

gulp.task('styles', () => {
    emitVendorStyles();
    emitOurStyles();
    emitAboveTheFoldStyles();
});

gulp.task('watch', ['clean', 'vendor-styles', 'vendor-scripts', 'dev'], () => {
    config.env = 'dev';
    config.buildSourcemaps = true;
    logInfo('Building with sourcemaps');

    gulp.watch('res/js/**/*js', ['webpack-watch']);
    gulp.watch('res/sass/**/*.scss', ['our-styles']);
});

gulp.task('dev', () => {
    config.env = 'dev';
    config.buildSourcemaps = true;
    logInfo("Dev build.\nSourcemaps, vendor JS in a separate file.");

    run('vendor-styles', 'our-styles', 'vendor-scripts', 'webpack');
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

gulp.task('clean', () => {
    return del([
        'res/build/*'
    ]);
});

gulp.task('help', () => {
    logInfo(`Available commands:
    gulp        (Production build)
    gulp dev    (Dev build)
    gulp watch  (Dev build, then watch for SASS/JS changes)
    gulp clean  (Delete contents of res/build)
    gulp images (Uses Imagemin to compress images)`);
});

if (config.env == 'prod') {
    gulp.task('default', ['clean', 'styles', 'vendor-scripts', 'webpack', 'images'], () => {
        logInfo("Running default does a production build.\nNo sourcemaps, all JS bundled");
        logWarn("This task will not work with VIA_ENVIRONMENT = 'dev'. Use 'gulp dev' or 'gulp watch' instead");
    });
} else {
    gulp.task('default', () => {
        run('dev');
    });
}
