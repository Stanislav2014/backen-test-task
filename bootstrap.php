<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 02.06.19
 * Time: 1:45
 */
//echo '<p>Hello World</p>';
    require_once('Db.php');
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);

    $pdo = new \App\Db();

    $sql = "drop table if exists users";
    $pdo->exec($sql);

    $sql = "create table dirs(id INT( 11 ) auto_increment primary key, parent_id INT(11))";
    $pdo->exec($sql);

    $sql = "create table users(id INT( 11 ) auto_increment primary key, par INT(11))";
    $pdo->exec($sql);


    $stmt = $pdo->prepare("INSERT INTO dirs(parent_id) VALUES (?)");

$data = [
    [null],
    [1],
    [1],
    [2],
    [4],
    [4],
    [5],
    [5],
    [7],
    [7],
    [10],
    [2]
];

    foreach ($data as $value)
    {
        $stmt->execute($value);
    }

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();

    print_r($stmt->fetchAll());