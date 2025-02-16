import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    define: {
        require: 'import.meta.require'
    },
    plugins: [
        laravel({
            //input: ['resources/css/app.css', 'resources/js/app.js'],
            //input: ['resources/css/admin.css', 'resources/js/admin.js'],
            input: [
                    //'resources/js/jquery.js',
                    'resources/js/jquery.validate.min.js',
                    'resources/js/admin/adminlte.min.js',
                    'resources/js/admin/bootstrap.bundle.min.js',
                    'resources/js/admin/jquery.dataTables.min.js',

                    'resources/css/admin/adminlte.min.css',    
                    'resources/css/admin/jquery.dataTables.min.css',    
                    'resources/css/admin/style.css',    
                ],
            refresh: true,
        }),
    ],
});
