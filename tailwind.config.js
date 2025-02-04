/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php", // Semua file Blade dalam folder views
        "./resources/js/**/*.jsx", // Jika menggunakan React dalam Laravel
        "./resources/js/**/*.vue", // Jika menggunakan Vue.js
        "./resources/**/*.js", // Untuk semua file JavaScript dalam Laravel
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms")], // Tidak perlu require tailwindcss lagi
};
