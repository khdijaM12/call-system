<?php

return [

  'auth' => [
    'guard' => 'web',  
    'pages' => [
        'login' => \App\Filament\Pages\Login::class,
    ],
],
    'avatar' => [
        'default' => 'https://www.gravatar.com/avatar/{hash}?d=identicon',
    ],

    'dark_mode' => env('FILAMENT_DARK_MODE', false), 
];
