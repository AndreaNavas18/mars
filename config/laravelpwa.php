<?php

return [
    'name' => 'Mimarsvecino',
    'manifest' => [
        'name' => env('APP_NAME', 'Mimarsvecino'),
        'short_name' => 'marsvecino',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/marsvecino_72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/marsvecino_96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/marsvecino_128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/marsvecino_144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/marsvecino_152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/marsvecino_192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/marsvecino_384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/marsvecino_512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/fon1_640x1136.png',
            '750x1334' => '/images/icons/fon1_750x1334.png',
            '828x1792' => '/images/icons/fon1_828x1792.png',
            '1125x2436' => '/images/icons/fon1_1125x2436.png',
            '1242x2208' => '/images/icons/fon1_1242x2208.png',
            '1242x2688' => '/images/icons/fon1_1242x2688.png',
            '1536x2048' => '/images/icons/fon1_1536x2048.png',
            '1668x2224' => '/images/icons/fon1_1668x2224.png',
            '1668x2388' => '/images/icons/fon1_1668x2388.png',
            '2048x2732' => '/images/icons/fon1_2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/marsvecino_72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
