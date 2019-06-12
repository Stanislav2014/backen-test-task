<?php
/**
 * Created by PhpStorm.
 * User: stanislav
 * Date: 02.06.19
 * Time: 20:44
 */


namespace App;

class DbUsers
{
    private static $instance = null;

    private const DSN = 'mysql:dbname=test;host=localhost;port=3306';
    private const USER = 'user';
    private const PASS = 'Testuser1!';
    private const OPTIONS = array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    );

    public function __construct($id)
    {
        $this->id = $id;

    }

    private function __wakeup(){}

    private function __clone(){}


    public static function instance()
    {
        if (self::$instance === null) {

            self::$instance = new \PDO(
                self::DSN,
                self::USER,
                self::PASS,
                self::OPTIONS
            );
        }

        return self::$instance;
    }

    public static function __callStatic($method, $arguments)
    {
        return call_user_func_array(array(self::instance(), $method ), $arguments);
    }

    public static function run($sql, $args = [])
    {
        if(!$args)
        {
            return self::instance()->query($sql);
        }

        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }


    public function get($attribute, $result = 1)
    {
        $storage = self::run("select storage from users where id = {$this->id}");

        return $storage->fetchAll();
    }

    public function set(){}

}