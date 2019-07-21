const path = require('path');
const {
    VueLoaderPlugin
} = require('vue-loader');
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin');

module.exports = {
    mode: "development",
    entry: path.resolve("./resources/assets/src/entry.js"),
    output: {
        filename: "bundle.js",
        path: path.resolve("./public/js"),
    },
    module: {
        rules: [{
            test: /\.vue$/,
            exclude: /(node_modules|bower_components)/,
            loader: 'vue-loader'
        }]
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.common.js'
        }
    },
    plugins: [new VueLoaderPlugin()],
    watch: true,
    watchOptions: {
        poll: 2000 // Check for changes every second
    }
}