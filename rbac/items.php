<?php

return [
    'User' => [
        'type' => 1,
        'description' => 'Пользователь',
        'children' => [
            'Работа с документами',
            'updateOwnDoc',
        ],
    ],
    'Admin' => [
        'type' => 1,
        'description' => 'Админ',
        'children' => [
            'Редактирование пользователей',
            'Работа с документами',
            'updateOwnDoc',
        ],
    ],
    'Редактирование пользователей' => [
        'type' => 2,
        'description' => 'Добавление/удаление; 
Работа с ролями, разрешениями и правилами',
        'children' => [
            '/admin/default/*',
            '/admin/default/index',
            '/admin/users/*',
            '/admin/users/create',
            '/admin/users/delete',
            '/admin/users/index',
            '/admin/users/update',
            '/admin/users/view',
            '/rbac/*',
            '/rbac/assignment/*',
            '/rbac/assignment/assign',
            '/rbac/assignment/index',
            '/rbac/assignment/revoke',
            '/rbac/assignment/view',
            '/rbac/default/*',
            '/rbac/default/index',
            '/rbac/menu/*',
            '/rbac/menu/create',
            '/rbac/menu/delete',
            '/rbac/menu/index',
            '/rbac/menu/update',
            '/rbac/menu/view',
            '/rbac/permission/*',
            '/rbac/permission/assign',
            '/rbac/permission/create',
            '/rbac/permission/delete',
            '/rbac/permission/get-users',
            '/rbac/permission/index',
            '/rbac/permission/remove',
            '/rbac/permission/update',
            '/rbac/permission/view',
            '/rbac/role/*',
            '/rbac/role/assign',
            '/rbac/role/create',
            '/rbac/role/delete',
            '/rbac/role/get-users',
            '/rbac/role/index',
            '/rbac/role/remove',
            '/rbac/role/update',
            '/rbac/role/view',
            '/rbac/route/*',
            '/rbac/route/assign',
            '/rbac/route/create',
            '/rbac/route/index',
            '/rbac/route/refresh',
            '/rbac/route/remove',
            '/rbac/rule/*',
            '/rbac/rule/create',
            '/rbac/rule/delete',
            '/rbac/rule/index',
            '/rbac/rule/update',
            '/rbac/rule/view',
            '/rbac/user/*',
            '/rbac/user/activate',
            '/rbac/user/change-password',
            '/rbac/user/delete',
            '/rbac/user/index',
            '/rbac/user/login',
            '/rbac/user/logout',
            '/rbac/user/request-password-reset',
            '/rbac/user/reset-password',
            '/rbac/user/signup',
            '/rbac/user/view',
        ],
    ],
    'Работа с документами' => [
        'type' => 2,
        'description' => 'Редактирование, удаление, настройка приватности',
        'children' => [
            '/admin/default/*',
            '/admin/default/index',
            '/admin/documents/*',
            '/admin/documents/create',
            '/admin/documents/delete',
            '/admin/documents/download',
            '/admin/documents/index',
            '/admin/documents/update',
            '/admin/documents/view',
            '/fileload/download/*',
            '/documents/download/*',
        ],
    ],
    '/admin/default/index' => [
        'type' => 2,
    ],
    '/admin/default/*' => [
        'type' => 2,
    ],
    '/admin/documents/index' => [
        'type' => 2,
    ],
    '/admin/documents/view' => [
        'type' => 2,
    ],
    '/admin/documents/create' => [
        'type' => 2,
    ],
    '/admin/documents/update' => [
        'type' => 2,
    ],
    '/admin/documents/delete' => [
        'type' => 2,
    ],
    '/admin/documents/download' => [
        'type' => 2,
    ],
    '/admin/documents/*' => [
        'type' => 2,
    ],
    '/admin/users/index' => [
        'type' => 2,
    ],
    '/admin/users/view' => [
        'type' => 2,
    ],
    '/admin/users/create' => [
        'type' => 2,
    ],
    '/admin/users/update' => [
        'type' => 2,
    ],
    '/admin/users/delete' => [
        'type' => 2,
    ],
    '/admin/users/*' => [
        'type' => 2,
    ],
    '/admin/*' => [
        'type' => 2,
    ],
    '/rbac/assignment/index' => [
        'type' => 2,
    ],
    '/rbac/assignment/view' => [
        'type' => 2,
    ],
    '/rbac/assignment/assign' => [
        'type' => 2,
    ],
    '/rbac/assignment/revoke' => [
        'type' => 2,
    ],
    '/rbac/assignment/*' => [
        'type' => 2,
    ],
    '/rbac/default/index' => [
        'type' => 2,
    ],
    '/rbac/default/*' => [
        'type' => 2,
    ],
    '/rbac/menu/index' => [
        'type' => 2,
    ],
    '/rbac/menu/view' => [
        'type' => 2,
    ],
    '/rbac/menu/create' => [
        'type' => 2,
    ],
    '/rbac/menu/update' => [
        'type' => 2,
    ],
    '/rbac/menu/delete' => [
        'type' => 2,
    ],
    '/rbac/menu/*' => [
        'type' => 2,
    ],
    '/rbac/permission/index' => [
        'type' => 2,
    ],
    '/rbac/permission/view' => [
        'type' => 2,
    ],
    '/rbac/permission/create' => [
        'type' => 2,
    ],
    '/rbac/permission/update' => [
        'type' => 2,
    ],
    '/rbac/permission/delete' => [
        'type' => 2,
    ],
    '/rbac/permission/assign' => [
        'type' => 2,
    ],
    '/rbac/permission/get-users' => [
        'type' => 2,
    ],
    '/rbac/permission/remove' => [
        'type' => 2,
    ],
    '/rbac/permission/*' => [
        'type' => 2,
    ],
    '/rbac/role/index' => [
        'type' => 2,
    ],
    '/rbac/role/view' => [
        'type' => 2,
    ],
    '/rbac/role/create' => [
        'type' => 2,
    ],
    '/rbac/role/update' => [
        'type' => 2,
    ],
    '/rbac/role/delete' => [
        'type' => 2,
    ],
    '/rbac/role/assign' => [
        'type' => 2,
    ],
    '/rbac/role/get-users' => [
        'type' => 2,
    ],
    '/rbac/role/remove' => [
        'type' => 2,
    ],
    '/rbac/role/*' => [
        'type' => 2,
    ],
    '/rbac/route/index' => [
        'type' => 2,
    ],
    '/rbac/route/create' => [
        'type' => 2,
    ],
    '/rbac/route/assign' => [
        'type' => 2,
    ],
    '/rbac/route/remove' => [
        'type' => 2,
    ],
    '/rbac/route/refresh' => [
        'type' => 2,
    ],
    '/rbac/route/*' => [
        'type' => 2,
    ],
    '/rbac/rule/index' => [
        'type' => 2,
    ],
    '/rbac/rule/view' => [
        'type' => 2,
    ],
    '/rbac/rule/create' => [
        'type' => 2,
    ],
    '/rbac/rule/update' => [
        'type' => 2,
    ],
    '/rbac/rule/delete' => [
        'type' => 2,
    ],
    '/rbac/rule/*' => [
        'type' => 2,
    ],
    '/rbac/user/index' => [
        'type' => 2,
    ],
    '/rbac/user/view' => [
        'type' => 2,
    ],
    '/rbac/user/delete' => [
        'type' => 2,
    ],
    '/rbac/user/login' => [
        'type' => 2,
    ],
    '/rbac/user/logout' => [
        'type' => 2,
    ],
    '/rbac/user/signup' => [
        'type' => 2,
    ],
    '/rbac/user/request-password-reset' => [
        'type' => 2,
    ],
    '/rbac/user/reset-password' => [
        'type' => 2,
    ],
    '/rbac/user/change-password' => [
        'type' => 2,
    ],
    '/rbac/user/activate' => [
        'type' => 2,
    ],
    '/rbac/user/*' => [
        'type' => 2,
    ],
    '/rbac/*' => [
        'type' => 2,
    ],
    '/fileload/download/*' => [
        'type' => 2,
    ],
    '/documents/download/*' => [
        'type' => 2,
    ],
    'updateOwnDoc' => [
        'type' => 2,
        'description' => 'возможность обновлять и редактировать только свой документ',
        'ruleName' => 'Author',
    ],
];
