<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Miner Rarity
    |--------------------------------------------------------------------------
    |
    | Miner Rarity configs
    |
    */

    'rarity' => [
        'common' => [
            'boost_speed' => 15,
            'mining_time' => 1440,
            'ore' => [
                'bronze_ore' => [
                    'min' => 1,
                    'max' => 700
                ],
                'iron_ore' => [
                    'min' => 700,
                    'max' => 850
                ],
                'silver_ore' => [
                    'min' => 850,
                    'max' => 950
                ],
                'gold_ore' => [
                    'min' => 950,
                    'max' => 995
                ]
            ]
        ],
        'rare' => [
            'boost_speed' => 30,
            'mining_time' => 1320,
            'ore' => [
                'bronze_ore' => [
                    'min' => 1,
                    'max' => 650
                ],
                'iron_ore' => [
                    'min' => 650,
                    'max' => 850
                ],
                'silver_ore' => [
                    'min' => 850,
                    'max' => 950
                ],
                'gold_ore' => [
                    'min' => 950,
                    'max' => 995
                ]
            ]
        ],
        'ultra rare' => [
            'boost_speed' => 45,
            'mining_time' => 1200,
            'ore' => [
                'bronze_ore' => [
                    'min' => 1,
                    'max' => 550
                ],
                'iron_ore' => [
                    'min' => 550,
                    'max' => 750
                ],
                'silver_ore' => [
                    'min' => 750,
                    'max' => 900
                ],
                'gold_ore' => [
                    'min' => 900,
                    'max' => 995
                ]
            ]
        ],
        'legendary' => [
            'boost_speed' => 60,
            'mining_time' => 1080,
            'ore' => [
                'bronze_ore' => [
                    'min' => 1,
                    'max' => 450
                ],
                'iron_ore' => [
                    'min' => 450,
                    'max' => 600
                ],
                'silver_ore' => [
                    'min' => 600,
                    'max' => 800
                ],
                'gold_ore' => [
                    'min' => 800,
                    'max' => 995
                ]
            ]
        ],
    ]
];
