import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            
                'resources/js/app.js',
                'resources/js/delete.js',
                'resources/js/welcome.js',
                'resources/js/bootstrap.js',
                'resources/sass/ap.scss',
                'resources/css/cart.css',
           
        
    ])
    ],

    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }


    },

});
