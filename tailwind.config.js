/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js',
  ],
  theme: {
    colors: {
      primary: '#3b4252',
      secondary: '#ebcb8b',
      accent: '#434c5e',
      base: '#2e3440',
      light: '#4c566a',
      success: '#a3be8c',
      warning: '#d08770',
      error: '#bf616a',
      info: '#5e81ac',
      white: '#d8dee9'
    },
    extend: {
      fontFamily: {
        'sans': ['Inter', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [
    require('preline/plugin'),
    require('@tailwindcss/forms'),
  ],
}

