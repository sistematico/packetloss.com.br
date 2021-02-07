const fs = require('fs')

module.exports = {
  chainWebpack: config => {
    config
      .plugin('html')
      .tap(args => {
        args[0].title = 'Packet Loss'
        return args
      }),
      config.plugin('copy').tap(([options])=> {
          options[0].ignore.push('txt/counter.txt')
          return [options]
      })
  },
  devServer: {
      https: {
        key: fs.readFileSync('./certs/localhost-key.pem'),
        cert: fs.readFileSync('./certs/localhost.pem'),
      }
      //public: 'https://localhost:8080/'
  }
}