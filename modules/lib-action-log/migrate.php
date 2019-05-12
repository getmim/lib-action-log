<?php

return [
    'LibActionLog\\Model\\ActionLog' => [
        'fields' => [
            'id' => [
                'type' => 'BIGINT',
                'attrs' => [
                    'unsigned' => true,
                    'primary_key' => true,
                    'auto_increment' => true
                ]
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'null' => false,
                    'unsigned' => true 
                ]
            ],
            'object' => [
                'type' => 'INT',
                'attrs' => [
                    'null' => false,
                    'unsigned' => true 
                ]
            ],
            'parent' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true 
                ]
            ],
            // 1 create
            // 2 update
            // 3 remove
            'method' => [
                'type' => 'TINYINT',
                'attrs' => [
                    'null' => false,
                    'unsigned' => true 
                ]
            ],
            'type' => [
                'type' => 'VARCHAR',
                'length' => 50,
                'attrs' => [
                    'null' => false
                ]
            ],
            'original' => [
                'type' => 'TEXT'
            ],
            'changes' => [
                'type' => 'TEXT'
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ]
            ]
        ],
        'indexes' => [
            'by_user' => [
                'fields' => [
                    'user' => [],
                    'object' => [],
                    'type' => []
                ]
            ],
            'by_object' => [
                'fields' => [
                    'object' => [],
                    'type' => []
                ]
            ]
        ]
    ]
];