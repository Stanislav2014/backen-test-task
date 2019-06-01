<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 31.05.19
 * Time: 13:47
 */

namespace App;

class DbNode
{
    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $pdo = new \PDO();
        return $pdo;

    }


    public function getDirs($id)
    {
        self::connect();
        $id;

    }

};