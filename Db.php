<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 31.05.19
 * Time: 13:47
 */

namespace App;

class Db
{
    private static $_instance = null;

    private static DSN = 'mysql:dbname=test;host=localhost;port=3306';
    private static USER = 'user';
    private static PASS = 'Testuser1!';
    private static OPTIONS = array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
);

    private function __construct()
    {
        $this->connect();
        $this->_instance = new \PDO(
            self::DSN,
            self::USER,
            self::PASSWORD,
            self::OPTIONS);

    }

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return new self;
    }


    public function getDirs($id)
    {
        self::connect();
        $id;

    }

};