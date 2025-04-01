import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',   // Existing app.css
                'resources/css/style.css',  // Your custom CSS file
                'resources/js/app.js',     // Existing app.js
                'resources/js/gallery.js'   // Include gallery.js  
            ],
            refresh: true,
        }),
    ],

    //for Vercel deployment, build output directory
    build: {
        outDir: 'public/build', // Ensure compiled assets are stored here
        emptyOutDir: true,  // Clears previous builds
    }
});
