/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./src/**/*.{html,js,jsx}",
      "./resources/**/*.js",
      "./node_modules/flowbite/**/*.js",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
