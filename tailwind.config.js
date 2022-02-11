module.exports = {
  important: true,
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue'
  ],
  darkMode: false,
  variants: {
    extend: {},
  },
  theme: {
    extend: {
      minHeight: {
        '36': '9rem'
      }
    }
  },
  plugins: [
    require('daisyui')
  ],
  daisyui: {
    themes: [
      'bumblebee'
    ]
  }
}