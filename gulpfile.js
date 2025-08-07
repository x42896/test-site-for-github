// Тут происходит преобразование SCSS в SCC с добавлением суффикса .min и минификацией

// npx gulp sassToCSS – разовый запуск
// npx gulp watch – запуск с отслеживанием изменений


const gulp = require('gulp') // Подключение Gulp
const sass = require('gulp-sass')(require('sass')) // Плагин который преобразует SASS в CSS
const cleanCSS = require('gulp-clean-css') // Минификация CSS
const rename = require('gulp-rename') // Переименование файлов например, style.css в style.min.css
const plumber = require('gulp-plumber') // для обработки ошибок без остановки
const notify = require('gulp-notify') // для уведомлений

// Пути к файлам с которыми будем работать, если будут ещё файлы добавить их через запятую
const paths = {
  scss: { src: 'app/scss/**/*.scss', dest: 'public/css/', outputName: 'style.min.css'}
}

// Основная задача
function compileSCSS() {
  return gulp.src(paths.scss.src)

    // pipe ждёт пока пред. функция выполнится и запускаем другую
    .pipe(plumber({ errorHandler: notify.onError("SCSS Error: <%= error.message %>") })) // Покажет ошибку если есть
    .pipe(sass()) // компиляция SCSS в CSS
    .pipe(cleanCSS({ level: 2 })) // современная жесткая минификация CSS без поддержки старые IE
    .pipe(rename(paths.scss.outputName)) // переименовываем style.css в style.min.css
    .pipe(gulp.dest(paths.scss.dest)) // куда сохранить новые файлы
    .pipe(notify({ message: 'SCSS → CSS успешно собран!', onLast: true })) // Покажет уведомление что всё обработалось
}

// Вотчер (отслеживание изменений )
function watchFiles() {
  gulp.watch(paths.scss.src, compileSCSS)
}

// Регистрация (экспорт) задач
exports.sassToCSS = compileSCSS
exports.watch = gulp.series(compileSCSS, watchFiles)