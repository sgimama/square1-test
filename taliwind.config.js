// https://tailwindcss.com/docs/customizing-colors#color-palette-reference
module.exports = {
    purge: {
        content: [
            "./resources/views/**/*.blade.php",
            "./resources/js/**/*.vue",
        ],
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var"],
            },
        },
    },
    variants: {
    },
    plugins: [
        require('@tailwindcss/forms'),
    ]
};