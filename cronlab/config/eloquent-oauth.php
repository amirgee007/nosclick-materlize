<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '537064106650596',
            'client_secret' => '7ea75f093c1d53ef1bd512cd7a0aff69',
            'redirect_uri' => 'http://nosclick.com/user/facebook/redirect',
            'scope' => [],
        ],
        
    ],
];
