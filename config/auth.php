 <?php

return [
    'defaults' => [
        'guard' => 'web', // Alterar para o guard padrão que você usa mais frequentemente
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],

        'organizacao' => [
            'driver' => 'session',
            'provider' => 'organizacao',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'organizacao' => [
            'driver' => 'eloquent',
            'model' => App\Models\OrganizacaoSQL::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'organizacao' => [
            'provider' => 'organizacao',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];

