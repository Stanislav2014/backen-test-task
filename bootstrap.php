<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 02.06.19
 * Time: 1:45
 */
    //echo '<p>Hello World</p>';
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);

    require_once('Db.php');
    require_once('DbUsers.php');

    $dataDirs = [
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

    $dataUsers = [
        [
            ['age'=> 58, 'male'=> 'men'],


        ],
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

    $pdo = \App\Db::instance();

    $sql = "drop table if exists dirs";
    $pdo->exec($sql);

    $sql = "drop table if exists users";
    $pdo->exec($sql);

    $sql = "create table dirs(id INT( 11 ) auto_increment primary key, parent_id INT(11))";
    $pdo->exec($sql);

    $sql = "create table users(id INT( 11 ) auto_increment primary key, storage text)";
    $pdo->exec($sql);


    $stmt = $pdo->prepare("INSERT INTO dirs(parent_id) VALUES (?)");


    foreach ($dataDirs as $value)
    {
        $stmt->execute($value);
    }

    $stmt = $pdo->prepare("INSERT INTO users(storage) VALUES (?)");

    foreach ($dataUsers as $value)
    {
        $stmt->execute([serialize($value)]);
    }

    $dbUsers = new \App\DbUsers(1);
    $dbUsers::run("select * from users");
    $result = $dbUsers->get(1);
    var_dump($result);

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();

    //print_r($stmt->fetchAll());

