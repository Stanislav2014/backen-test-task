<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.06.19
 * Time: 19:07
 */

namespace App;


class Singleton
{
    private static $_instance = null;

    // для безопасности настройки лучше хранить в файле с конфигом
private static DB_HOST = '';
private static DB_NAME = '';
private static DB_USER = '';
private static DB_PASS = '';

    private function __construct ($id) {
        $this->id = $id;
        $this->_instance = new PDO(
            'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
            self::DB_USER,
            self::DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
        $this->storage = self::$_instance->execute('SELECT storage from users WHERE id = $id');

    }

    private function __clone () {}
    private function __wakeup () {}

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return new self;
    }





    }
}