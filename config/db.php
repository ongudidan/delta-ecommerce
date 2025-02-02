<?php

//////////////////////////////////////
$host = $_SERVER['HTTP_HOST']; // Get the current host

if ($host === 'localhost:97' || strpos($host, 'ngrok-free') !== false) {
    // Localhost:97 or ngrok-free environment
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=mariadb;dbname=delta-ecommerce',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];
} elseif ($host === 'ecommerce254.wuaze.com') {
    // Production environment for wuaze.com
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=sql110.infinityfree.com;dbname=if0_37114096_ecommerce',
        'username' => 'if0_37114096',
        'password' => 'QcIDYuIrKJ',
        'charset' => 'utf8',
    ];
} elseif ($host === 'ecommerce.destakosmetics.com') {
    // Production environment for ecommerce.destakosmetics.com
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=deltolxj_ecommerce',
        'username' => 'deltolxj_deltakosmetics',
        'password' => 'M70()J%O_8Kk',
        'charset' => 'utf8',
    ];
} else {
    // Default fallback or other environments
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=mariadb;dbname=delta-ecommerce',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ];

    // return [
    //     'class' => 'yii\db\Connection',
    //     'dsn' => 'mysql:host=localhost;dbname=deltolxj_ecommerce',
    //     'username' => 'deltolxj_deltakosmetics',
    //     'password' => 'M70()J%O_8Kk',
    //     'charset' => 'utf8',
    // ];
}

