module.exports = {
  resolve: {
    extensions: ['.ts', '.tsx', '.js', '.vue']
  },
  module: {
    rules: [
      { test: /\.vue$/, loader: 'vue-loader' },
      {
        test: /\.tsx?$/,
        use: [
          {
            loader: 'ts-loader',
            options: { transpileOnly: true }
          }
        ]
      },
      {
        test: /\.scss$/,
        use: [
          'vue-style-loader', 'css-loader', 'sass-loader'
        ]
      }
    ]
  }
}
