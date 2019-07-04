<?php

return [

    'defaults' => [
        'guard' => 'kasir',
        'passwords' => 'kasirs',
    ],

    'guards' => [
        'kasir' => [
            'driver' => 'session',
            'provider' => 'kasirs',
        ],
        'outlet' => [
            'driver' => 'session',
            'provider' => 'outlets',
        ],
        'ownner' => [
            'driver' => 'session',
            'provider' => 'ownners',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'kasirs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Kasir::class,
        ],
        'outlets' => [
            'driver' => 'eloquent',
            'model' => App\Models\Outlet::class,
        ],
        'ownners' => [
            'driver' => 'eloquent',
            'model' => App\Models\Ownner::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'kasirs' => [
            'provider' => 'kasirs',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
