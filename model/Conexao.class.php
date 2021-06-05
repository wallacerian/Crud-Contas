<?php

class Conexao
{
    public static $instance;
    public static $host = 'localhost';
    public static $dbname = 'agendamentos';
    public static $user = 'root';
    public static $pass = '';
    public static $port = '3307';

    public static function get_instance()
    {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";port=" . self::$port,
                    self::$user,
                    self::$pass
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            return self::$instance;
        } catch (\PDOException $exception) {
            echo "Error! Message:" . $exception->getMessage() . " Code:" . $exception->getCode();
            exit;
        }
    }
}
