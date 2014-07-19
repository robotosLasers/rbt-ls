<?php

$GLOBALS['config']['routes'] = [
    'modules' => [
        'app' => [
            'default' => ['controller' => 'defaultController']
        ]
    ],
    'custom' => [
        '404.htnl' => ['controller' => 'errorController'],
        '500.htnl' => ['controller' => 'errorController']
        ],
];