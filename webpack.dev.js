'use strict'

const { VueLoaderPlugin } = require('vue-loader')
const ManifestPlugin = require('webpack-manifest-plugin')
const webpack = require('webpack')
const path = require('path')

module.exports = {
  entry: { 'WriteDown': './src/index.js' },
  devServer: {
    contentBase: path.join(__dirname, 'public'),
    headers: { 'Access-Control-Allow-Origin': '*' },
    host: 'localhost',
    hot: true,
    inline: true,
    overlay: true,
    port: 8080
  },
  mode: 'development',
  module: {
    rules: [{
      test: /\.vue$/,
      use: 'vue-loader'
    }, {
      test: /\.s[c|a]ss$/,
      use: [ 'style-loader', 'css-loader', 'sass-loader' ]
    }]
  },
  output: {
    filename: 'WriteDown.js',
    path: path.join(__dirname, '/public/dist/'),
    publicPath: 'http://localhost:8080/dist/'
  },
  plugins: [
    new ManifestPlugin(),
    new VueLoaderPlugin(),
    new webpack.HotModuleReplacementPlugin()
  ]
}
