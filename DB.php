<?php

class DB {

    private static ?PDO $instance = null;

    public static function getInstance() {
        $host = "127.0.0.1";
        $database = "tema_1";
        $username = "root";
        $password = "root";

        if(is_null(self::$instance)) {
            self::$instance = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        }
        return self::$instance;
    }

}
