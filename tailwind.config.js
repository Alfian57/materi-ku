import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    safelist: [
        {
            pattern: /(from|to|border|shadow)-(emerald|amber|rose)-(50|100|500|600)/,
            variants: ['hover', 'group-hover', 'dark', 'dark:hover'],
        },
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Primary: Purple/Violet
                primary: {
                    50: '#FAF5FF',
                    100: '#F3E8FF',
                    200: '#E9D5FF',
                    300: '#D8B4FE',
                    400: '#C084FC',
                    500: '#A855F7',
                    600: '#9333EA',
                    700: '#7E22CE',
                    800: '#6B21A8',
                    900: '#581C87',
                },
                // Secondary: Indigo
                secondary: {
                    50: '#EEF2FF',
                    100: '#E0E7FF',
                    200: '#C7D2FE',
                    300: '#A5B4FC',
                    400: '#818CF8',
                    500: '#6366F1',
                    600: '#4F46E5',
                    700: '#4338CA',
                    800: '#3730A3',
                    900: '#312E81',
                },
                // Accent: Pink
                accent: {
                    50: '#FDF2F8',
                    100: '#FCE7F3',
                    200: '#FBCFE8',
                    300: '#F9A8D4',
                    400: '#F472B6',
                    500: '#EC4899',
                    600: '#DB2777',
                    700: '#BE185D',
                    800: '#9D174D',
                    900: '#831843',
                },
                // Surface colors
                surface: {
                    light: '#FFFFFF',
                    DEFAULT: '#FAFAFF',
                    dark: '#1E1E2E',
                    darker: '#181825',
                },
            },
            animation: {
                'bounce-slow': 'bounce 2s infinite',
                'pulse-slow': 'pulse 3s infinite',
                'slide-in': 'slideIn 0.3s ease-out',
                'slide-up': 'slideUp 0.3s ease-out',
                'fade-in': 'fadeIn 0.3s ease-out',
                'scale-in': 'scaleIn 0.2s ease-out',
                'float': 'float 6s ease-in-out infinite',
            },
            keyframes: {
                slideIn: {
                    '0%': { transform: 'translateX(-100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                scaleIn: {
                    '0%': { transform: 'scale(0.95)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
            },
            boxShadow: {
                'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                'glow': '0 0 20px rgba(168, 85, 247, 0.4)',
                'glow-secondary': '0 0 20px rgba(99, 102, 241, 0.3)',
            },
            backgroundImage: {
                'gradient-playful': 'linear-gradient(135deg, #7C3AED 0%, #A855F7 50%, #C084FC 100%)',
                'gradient-secondary': 'linear-gradient(135deg, #4F46E5 0%, #6366F1 100%)',
                'gradient-accent': 'linear-gradient(135deg, #EC4899 0%, #F472B6 100%)',
                'gradient-dark': 'linear-gradient(135deg, #181825 0%, #1E1E2E 100%)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
