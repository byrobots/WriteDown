'use strict'

const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    mode: 'development',
    module: {
        rules: [{
            enforce: 'pre',
            test: /\.(js|vue)$/,
            loader: 'eslint-loader',
            exclude: /node_modules/,
            options: {
              fix: true,
            },
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
    ],
    watch: true
};
