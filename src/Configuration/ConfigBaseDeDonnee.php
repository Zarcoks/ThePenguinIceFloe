<?php

namespace NDI2023\Configuration;

class ConfigBaseDeDonnee
{
    static private array $conf = array(
        'hostname' => 'webinfo.iutmontp.univ-montp2.fr',
        'database' => 'izoretr',
        'port' => '3316',
        'login' => 'izoretr',
        'password' => ''
    );

    public static function getHostname(): string
    {
        return self::getConfig()['hostname'];
    }

    static private function getConfig(): array
    {
        return self::$conf;
    }

    public static function getDatabase(): string
    {
        return self::getConfig()['database'];
    }

    public static function getLogin(): string
    {
        return self::getConfig()['login'];
    }

    public static function getPassword(): string
    {
        return self::getConfig()['password'];
    }

    public static function getPort(): string
    {
        return self::getConfig()['port'];
    }
}