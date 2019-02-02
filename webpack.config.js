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
    .addEntry('js/reactdom', './assets/js/react-dom.production.min.js')
    .addEntry('js/react', './assets/js/react.production.min.js')
    .addEntry('js/jquery', './assets/js/jquery.min.js')
    .addEntry('js/prop', './assets/js/prop-types.min.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .enableReactPreset()
;

module.exports = Encore.getWebpackConfig();