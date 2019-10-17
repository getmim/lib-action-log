<?php

return [
    '__name' => 'lib-action-log',
    '__version' => '1.0.0',
    '__git' => 'git@github.com:getmim/lib-action-log.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-action-log' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-model' => NULL
            ],
            [
                'lib-user' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibActionLog\\Model' => [
                'type' => 'file',
                'base' => 'modules/lib-action-log/model'
            ],
            'LibActionLog\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-action-log/library'
            ]
        ],
        'files' => []
    ]
];
