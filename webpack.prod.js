'use strict'

/**
 * External
 */
const { VueLoaderPlugin } = require('vue-loader')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const ManifestPlugin = require('webpack-manifest-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const path = require('path')
const pkg = require('./package.json')
const TerserPlugin = require('terser-webpack-plugin')

/**
 * Configure the CSS optimisation.
 *
 * @return {Object}
 */
const configureCssOptimisation = () => ({
  cssProcessorOptions: {
    discardComments: true,
    map: {
      inline: false,
      annotation: true
    },
    safe: true
  }
})

/**
 * Configure JavaScript optimisation.
 *
 * @return {Object}
 */
const configureJavaScriptOptimisation = () => ({
  cache: true,
  parallel: true,
  sourceMap: true
})

/**
 * Configure Babel.
 *
 * @return {Object}
 */
const configureBabel = (browserList) => ({
  loader: 'babel-loader',
  options: {
    presets: [
      [
        '@babel/preset-env', {
          corejs: '^3.0.0',
          modules: false,
          useBuiltIns: 'entry',
          targets: { browsers: browserList }
        }
      ]
    ],
    plugins: [
      ['@babel/plugin-transform-runtime', { 'regenerator': true }],
      new VueLoaderPlugin()
    ]
  }
})

/**
 * Export the config.
 *
 * @type {Object}
 */
module.exports = {
  devtool: 'source-map',
  entry: { 'WriteDown': './src/index.js' },
  mode: 'production',
  optimization: {
    minimizer: [
      new OptimizeCSSAssetsPlugin(configureCssOptimisation()),
      new TerserPlugin(configureJavaScriptOptimisation())
    ]
  },
  module: {
    rules: [{
      test: /\.vue$/,
      use: 'vue-loader'
    }, {
      exclude: /node_modules/,
      test: /\.js$/,
      use: [ configureBabel(pkg.browserList) ]
    }, {
      test: /\.css$/,
      use: [
        { loader: MiniCssExtractPlugin.loader },
        'css-loader'
      ]
    }, {
      test: /\.s[c|a]ss$/,
      use: [
        { loader: MiniCssExtractPlugin.loader },
        'css-loader',
        { loader: 'postcss-loader' },
        'sass-loader'
      ]
    }]
  },
  output: {
    filename: 'js/[name].[hash:8].js',
    path: path.resolve(__dirname, 'public/dist'),
    publicPath: '/dist/'
  },
  plugins: [
    new CleanWebpackPlugin(['public/dist'], { exclude: [ '.gitkeep' ] }),
    new ManifestPlugin({
      // Don't include source maps in the manifest file.
      filter: ({ name }) => !name.endsWith('.map')
    }),
    new MiniCssExtractPlugin({
      filename: 'css/[name].[hash:8].css'
    }),
    new VueLoaderPlugin()
  ]
}
