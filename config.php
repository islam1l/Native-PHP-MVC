<?php
return [
    'database'=>[
        'name' => 'mytodo',
        'username' => 'islam',
        'password' => '123456',
        'dsn' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];