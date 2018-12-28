'use strict';

const { VueLoaderPlugin } = require('vue-loader');
const webpack = require('webpack');
var path = require('path');

module.exports = {
    devServer: {
        contentBase: path.join(__dirname, 'public'),
        disableHostCheck: true,
        headers: { 'Access-Control-Allow-Origin': '*' },
        host: 'localhost',
        hot: true,
        inline: true,
        overlay: true,
        port: 8080,
    },
    mode: 'development',
    module: {
        rules: [{
            enforce: 'pre',
            exclude: /node_modules/,
            loader: 'eslint-loader',
            options: {
                emitWarning: true,
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
            use: [ 'style-loader', 'css-loader', 'sass-loader' ]
        }]
    },
    output: {
        filename: 'WriteDown.js',
        path: path.join(__dirname, '/public'),
        publicPath: 'http://localhost:8080/',
    },
    plugins: [
        new VueLoaderPlugin(),
        new webpack.HotModuleReplacementPlugin(),
    ]
};
