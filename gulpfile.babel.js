import gulp			from 'gulp';
import sass			from 'gulp-sass';
import autoprefixer	from 'gulp-autoprefixer';
import plumber		from 'gulp-plumber';
import minifycss	from 'gulp-clean-css';
import uglify		from 'gulp-uglify';
import sourcemaps	from 'gulp-sourcemaps';
import notify		from 'gulp-notify';
import include		from 'gulp-include';
import imagemin		from 'gulp-imagemin';
import env			from 'gulp-environment';


// COPY TASKS
const fontExt				= '*.{otf,eot,svg,ttf,woff,woff2}';
const iconExt				= '*.{svg}';
const copyCustomFonts		= () => gulp.src(`src/fonts/${fontExt}`).pipe(gulp.dest('dist/fonts'));
//const copyLightGalleryFonts	= () => gulp.src(`node_modules/lightgallery/src/fonts/${fontExt}`).pipe(gulp.dest('dist/fonts'));
//const copyLineAwesomeFonts	= () => gulp.src(`node_modules/line-awesome/dist/line-awesome/fonts/${fontExt}`).pipe(gulp.dest('dist/fonts/icons'));
//const copyFontAwesomeFonts	= () => gulp.src(`node_modules/@fortawesome/fontawesome-free/webfonts/${fontExt}`).pipe(gulp.dest('dist/fonts/icons'));
//const copyRemixIconFonts	= () => gulp.src(`node_modules/remixicon/fonts/${fontExt}`).pipe(gulp.dest('dist/fonts/icons'));
//const copyRemixIconSVGs		= () => gulp.src(`node_modules/remixicon/fonts/${iconExt}`).pipe(gulp.dest('dist/fonts/icons'));
const copyFontAwesomeSVGs		= () => gulp.src(`node_modules/@fortawesome/fontawesome-free/svgs/**/*.svg`).pipe(gulp.dest('dist/svg'));
const copyOwnSVGs			= () => gulp.src(`src/svg/*.svg`).pipe(gulp.dest('dist/svg/own'));
export const copy			= gulp.parallel(copyCustomFonts,copyFontAwesomeSVGs,copyOwnSVGs);
copy.description			= "Kopiere Dateien die nicht weiter bearbeitet werden aus dem src-Verzeichnis in das dist-Verzeichnis";


// STYLES TASKS
export const styles = () => {
	const stream = gulp.src('src/scss/*.scss')

	.pipe(plumber({
		errorHandler : function(err) {
			if (typeof err == 'string') {
				err = new Error(err);
			}

			notify.onError({
				title	: 'CSS Fehler',
				message	: '<%= error.message %>',
			})(err);

			this.emit('end');
		},
	}))

	.pipe(env.if.not.production(sourcemaps.init()))

	.pipe(sass({
		includePaths : [
			'src/scss',
			'node_modules',
		],
	}))
	.pipe(autoprefixer())
	.pipe(env.if.production(minifycss({
		processImport	: false,
	})))

	.pipe(env.if.not.production(sourcemaps.write()))
	.pipe(gulp.dest('dist/css'));

	return stream;
};
styles.description = "Kompiliere Stylesheets aus SASS-Dateien im src-Verzeichnis in das dist-Verzeichnis. Ist env=production, wird der Inhalt zusätzlich komprimiert. Ansonsten werden zusätzlich inline-sourcemaps angehängt.";

gulp.task('watch-styles', () => gulp.watch('src/**/*.scss', styles));
gulp.task('watch-styles').description = "Führe den styles-Task automatisch aus, sobald SASS-Dateien im src-Verzeichnis verändert werden";


// SCRIPTS TASKS
export const scripts = () => {
	const stream = gulp.src('src/js/*.js')

	.pipe(plumber({
		errorHandler : function(err) {
			if (typeof err == 'string') {
				err = new Error(err);
			}

			notify.onError({
				title	: 'JS Fehler',
				message	: '<%= error %>',
			})(err);

			this.emit('end');
		},
	}))
	.pipe(env.if.not.production(sourcemaps.init()))
	.pipe(include({
		includePaths	: [
			'src/js',
			'node_modules',
		],
	}))
	.pipe(env.if.production(uglify()))
	.pipe(env.if.not.production(sourcemaps.write()))
	.pipe(gulp.dest('dist/js'));

	return stream;
};
scripts.description = "Kombiniere alle Scripts zu einer einzigen Javascript-Datei. Ist env=production, wird der Inhalt zusätzlich komprimiert. Ansonsten werden zusätzlich inline-sourcemaps angehängt.";

gulp.task('watch-scripts', () => gulp.watch('src/**/*.js', scripts));
gulp.task('watch-scripts').description = "Führe den scripts-Task automatisch aus, sobald Javascript-Dateien im src-Verzeichnis verändert werden";


// COMPRESS IMAGES TASKS
export const images = () => {
	const stream = gulp.src('src/img/**/*')
	.pipe(imagemin({
		progressive : true,
		svgoPlugins : [{
			removeViewBox : false,
		}],
	}))
	.pipe(gulp.dest('dist/img'));

	return stream;
};
images.description = "Komprimiere Bilder aus dem src-Verzeichnis und lege sie in das dist-Verzeichnis ";

gulp.task('watch-images', () => gulp.watch('src/**/*.js', [ 'images' ]));
gulp.task('watch-images').description = "Führe den images-Task automatisch aus, sobald Bilddateien im src-Verzeichnis verändert werden";


// BULK / MAIN TASKS
export const build	= gulp.parallel(styles, scripts, copy, images);
build.description	= "Erstelle alle relevanten Daten aus dem src-Verzeichnis und stelle sie im dist-Verzeichnis bereit. (Könnte Zeit in Anspruch nehmen. Sollte inital einmal ausgeführt werden)";

export const watch	= gulp.parallel('watch-styles', 'watch-scripts');
watch.description	= "Warte auf Veränderungen von Javascript- und SASS-Dateien und rekompiliere sie daraufhin entsprechend";

export default build;
