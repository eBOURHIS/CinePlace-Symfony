var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .autoProvidejQuery()
    .autoProvideVariables({
        "window.Bloodhound": require.resolve('bloodhound-js'),
        "jQuery.tagsinput": "bootstrap-tagsinput"
    })
    .enableSassLoader()
    .enableVersioning()
    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/searchfilm', './assets/js/searchfilm.js')
    .addEntry('js/moviecard', './assets/js/moviecard.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .enableReactPreset()
;

module.exports = Encore.getWebpackConfig();