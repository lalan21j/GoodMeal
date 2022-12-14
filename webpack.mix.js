const mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js').vue()
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss')
  ])
  .alias({
    '@': 'resources/js'
  })
  .webpackConfig(require('./webpack.config'))
  .sourceMaps()
  .version()

if (mix.inProduction()) {
  mix.version()
}
