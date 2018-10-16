'use strict'

const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    mode: 'development',
    module: {
        rules: [{
            enforce: 'pre',
            exclude: /node_modules/,
            loader: 'eslint-loader',
            options: {
                emitWarning: true,
                //fix: true,
            },
            test: /\.(js|vue)$/,
        }, {
            test: /\.vue$/,
            use: 'vue-loader'
        }, {
            test: /\.js$/,
            use: 'babel-loader'
        }, {
            test: /\.s[c|a]ss$/,
            use: [
                "style-loader", // Creates style nodes from JS strings
                "css-loader",   // Translates CSS into CommonJS
                "sass-loader"   // Compiles Sass to CSS, using Node Sass by default
            ]
        }]
    },
    output: {
        path: __dirname + '/public/dist',
        filename: 'WriteDown.js'
    },
    plugins: [
        new VueLoaderPlugin()
    ]
};
