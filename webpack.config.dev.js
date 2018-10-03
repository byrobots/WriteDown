'use strict'

const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    mode: 'development',
    entry: [
        './src/app.js'
    ],
    module: {
        rules: [{
            test: /\.vue$/,
            use: 'vue-loader'
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
