import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/franchise.css', 
                'resources/css/vacancies.css', 
                'resources/css/vacancy.css', 
                'resources/css/vacancies_landing.css', 
                //'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
