'use strict'

const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    mode: 'development',
    module: {
        rules: [{
            test: /\.vue$/,
            use: 'vue-loader'
        }, {
            test: /\.js$/,
            use: 'babel-loader'
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
