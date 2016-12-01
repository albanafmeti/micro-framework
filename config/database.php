<?php

return [
    "mysql" => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'db_name',
        'username' => 'db_user',
        'password' => 'db_pass',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix' => ''
    ],
    "sqlite" => [
        'driver' => 'sqlite',
        'database' => '../database.sqlite',
        'prefix' => ''
    ]
];
