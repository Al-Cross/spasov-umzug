const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
  	// './resources/**/*.blade.php',
   //  './resources/**/*.js',
   //  './resources/**/*.vue',
   "./resources/**/*.{html,js,vue,php}",
  ],
  theme: {
    screens: {
      'xs': '350px',
      ...defaultTheme.screens,
    },
    extend: {
      fontFamily: {
        headline: 'Poppins, sans-serif'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
