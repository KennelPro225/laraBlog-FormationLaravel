/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            textColor: {
                primary:"#00855D",
                secondary:"#C97A00",
                third:"#023369"
            },
            backgroundColor:{
                primary:"#00855D",
                secondary:"#C97A00"
            },
        },
    },
    plugins: [],
};
