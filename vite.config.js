import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/dateRangePicker.js',
            ],
            refresh: true,
        }),
        copy({
            targets: [
                {src: 'resources/js/dataTables.Italian.json', dest: 'public/js'},
                // {src: 'resources/css/*', dest: 'public/css'},
                // {src: 'resources/favicons/*', dest: 'public/favicons'},
                // {src: 'resources/img/*', dest: 'public/img'},
                // {src: 'resources/vid/*', dest: 'public/vid'}
            ]
        })
    ],
});
