/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./resources/**/*.{html,js,tsx,ts}'],
    theme: {
        extend: {
            container: {
                screens: {
                    sm: '',
                    md: '720px',
                    lg: '960px',
                    xl: '1140px'
                },
                padding: '1rem'
            },
        },
    },
    plugins: [],
}
