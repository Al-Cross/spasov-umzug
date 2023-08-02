module.exports = {
  purge: [
  	// './resources/**/*.blade.php',
   //  './resources/**/*.js',
   //  './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        headline: 'Poppins, sans-serif'
      }
    },
  },
  variants: {
    extend: {
      backgroundColor: ['active'],
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
