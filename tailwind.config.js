module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        green: {
          400: '#0FBA68',
          500: '#1DA564',
          600: '#249E2C',
        },
        blue: {
          500: '#2029F3',
        },
        yellow: {
          500: '#EAD621',
        },
      }
    },
  },
  plugins: [],
}
