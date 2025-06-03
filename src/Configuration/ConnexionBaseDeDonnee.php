<?php

namespace NDI2023\Configuration;

use PDO;

class ConnexionBaseDeDonnee
{
    private static ?ConnexionBaseDeDonnee $instance = null;
    private PDO $pdo;

    public function __construct()
    {
        $hostname = ConfigBaseDeDonnee::getHostName();
        $port = ConfigBaseDeDonnee::getPort();
        $databaseName = ConfigBaseDeDonnee::getDataBase();
        $login = ConfigBaseDeDonnee::getLogin();
        $password = ConfigBaseDeDonnee::getPassWord();

        $this->pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$databaseName", $login, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getPdo(): PDO
    {
        return self::getInstance()->pdo;
    }

    private static function getInstance(): ConnexionBaseDeDonnee
    {
        if (is_null(self::$instance))
            self::$instance = new ConnexionBaseDeDonnee();
        return self::$instance;
    }
}
