<?php

return [
    'permissions' => [
        'roles' => [
            'label' => 'role permissions',
            'list' => [
                ['name' => 'roles.index'],
                ['name' => 'roles.create'],
                ['name' => 'roles.edit'],
                ['name' => 'roles.delete'],
            ],
        ],
        'users' => [
            'label' => 'user permissions',
            'list' => [
                ['name' => 'users.index'],
                ['name' => 'users.create'],
                ['name' => 'users.edit'],
                ['name' => 'users.delete'],
            ],
        ],
        'company' => [
            'label' => 'company permissions',
            'list' => [
                ['name' => 'company.index'],
                ['name' => 'company.create'],
                ['name' => 'company.edit'],
                ['name' => 'company.destroy'],
            ],
        ],
    ],
];
