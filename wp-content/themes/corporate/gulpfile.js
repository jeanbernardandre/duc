var fs = require('file-system');
var gulp = require('gulp');
var terser = require('gulp-terser');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify-es').default;
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var plumber = require('gulp-plumber');
var iconfont = require('gulp-iconfont');
var rev = require('gulp-rev');
var timestamp = Math.round(Date.now() / 1000);
var iconsFontName = 'huttopia-icon';
var iconsFontMap = [];
var cleanCSS = require('gulp-clean-css');
var pathDist = __dirname+'/assets/dist/';
var pathSrc = __dirname+'/assets/src/';
const babel = require('gulp-babel');

gulp.task('js', function() {
    return gulp.src([
        pathSrc+'js/lib/jquery-2.min.js',
        pathSrc+'js/lib/slick.min.js',
        pathSrc+'js/search/**/*.js',
        pathSrc+'js/global/**/*.js'
    ])
        .pipe(plumber())
        .pipe(jshint({
            esnext: true
        }))
        .pipe(jshint.reporter('default'))
        .pipe(concat('main.js'))
        .pipe(terser())
        .pipe(uglify())
        .pipe(gulp.dest(pathDist + 'js'))
        .pipe(plumber.stop())
});

gulp.task('css', function(){
    return gulp.src(pathSrc+'scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(pathDist+'css'))
        .pipe(plumber.stop())
});

gulp.task('fonts', function () {
    return gulp.src(pathSrc+'fonts/**/**/*.{ttf,woff,woff2,svg,eot}')
        .pipe(gulp.dest(pathDist+'fonts'));
});

gulp.task('iconfont', function(){
    var iconScssFile = gulp.src([pathSrc+'scss/global/_icons_tpl.scss']);

    var iconStream = gulp.src([pathSrc+'img/icons_fonts/*.svg'])
        .pipe(iconfont({
            fontName: iconsFontName,
            normalize:true,
            fontHeight: 1001,
            prependUnicode: false,
            formats: ['ttf', 'eot', 'woff', 'woff2', 'svg'],
            timestamp: timestamp,
            ignoreExt: true,
            fixedWidth: true,
            centerHorizontally: true,
        }));

    iconStream.on('glyphs', function(glyphs, options) {
        fs.readFile(pathSrc+'scss/_icons_tpl.scss', 'utf8', function (err,data) {
            console.log(data);
            if(err)
            {
                return console.log(err);
            }

            glyphs.forEach(function(glyph) {
                var glyphName = '%'+glyph.name+'%';
                var glyphValue = glyph.unicode[0].charCodeAt(0).toString(16);
                console.log('"'+glyphName+'"'+' : '+glyphValue);
                data = data.replace(glyphName, glyphValue);
                data = data.replace(glyphName, glyphValue);
                data = data.replace(glyphName, glyphValue);
                data = data.replace(glyphName, glyphValue);
                data = data.replace(glyphName, glyphValue);
                data = data.replace(glyphName, glyphValue);
                data = data.replace(glyphName, glyphValue);
            });

            data = data.replace('%replace_timestamp%', timestamp);
            console.log(data);

            fs.writeFile(pathSrc+'scss/_icons.scss', data, 'utf8', function (err) {
                if(err) return console.log(err);
            });
        });
    });

    iconStream.pipe(gulp.dest(pathDist+'fonts/'));
});

gulp.task('watch', function () {
    gulp.watch([
        pathSrc+'scss/**/*.scss',
        pathSrc+'scss/**/**/**/*.scss',
        pathSrc+'scss/**/**/*.scss'
    ], gulp.series('css'));
    gulp.watch(pathSrc+'js/**/*.js', gulp.series('js'));
    gulp.watch(pathSrc+'fonts/**/*.{ttf,woff,woff2,svg,eot}', gulp.series('fonts'));
});

gulp.task('prod', gulp.series('js', 'css', 'fonts', 'iconfont'));
gulp.task('default', gulp.series('watch'));