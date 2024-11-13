import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import lineClamp from "@tailwindcss/line-clamp"; // Import the line clamp plugin

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        forms, // Keep the forms plugin before line-clamp
        require("@tailwindcss/line-clamp"),
    ],
};
