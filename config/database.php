<?php
return [
    'host' => '127.0.0.1',
    'dbname' => 'blog',
    'user' => 'root',
    'pass' => '',
];

$pdo = new PDO('mysql:host=127.0.0.1;dbname=blog;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

