<?php

$users = [
    [
        'email' => 'admin@admin.fr',
        'firstname' => 'Admin',
        'lastname' => 'ADMIN',
        'password' => password_hash('admin', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'user@user.fr',
        'firstname' => 'User',
        'lastname' => 'USER',
        'password' => password_hash('user', PASSWORD_DEFAULT),
    ],
];