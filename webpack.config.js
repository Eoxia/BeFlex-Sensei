const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: {
    'block-animation-in': './assets/js/gutenberg-src/block-animation-in.js',
    'block-hide-on-mobile': './assets/js/gutenberg-src/block-hide-on-mobile.js'
  },
  output: {
    path: path.join(__dirname, './assets/js/gutenberg-build'),
    filename: '[name].js'
  }
}
