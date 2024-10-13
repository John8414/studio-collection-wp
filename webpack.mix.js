const mix = require('laravel-mix');

mix.js(['./src/js/bootstrap.js'], 'js/1vendor.min.js')
    .sourceMaps(false, 'source-map');

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/slick-carousel/slick/slick.css',
    'node_modules/slick-carousel/slick/slick-theme.css',
    'node_modules/animate.css/animate.css',
], 'css/1vendor.min.css')
    .sourceMaps(false, 'source-map');

mix.js('./src/js/app.js', 'js/app.min.js')
    .sourceMaps(false, 'source-map');

mix.sass('./src/scss/app.scss', 'css/style.min.css', {
    implementation: require('sass'),
})
    .sourceMaps(false, 'source-map')
    .options({
        processCssUrls: false,
    });

// Copy Assets
mix.copyDirectory('./src/fonts', 'fonts');
mix.copyDirectory('./src/images', 'images');

// Additional Webpack Configuration
mix.webpackConfig({
    stats: {
        children: true,
    },
});


