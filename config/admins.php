<?php

return [
    'name' => 'Admin',
    'middlewares' => [
        // 'alias' => 'namespace'
        'auth.admin' => 'Modules\Admin\Http\Middleware\AdminMiddleware',
        'sidebar.resolve' => '\\Maatwebsite\\Sidebar\\Middleware\\ResolveSidebars'
    ],
];
