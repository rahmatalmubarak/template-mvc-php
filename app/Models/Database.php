<?php 
namespace ProgrammerZamanNow\Belajar\PHP\MVC\Models;

use mysqli;

class Database{
    protected static $connection;
    public static function connection()
    {
        self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (self::$connection->connect_error) {
            die("Koneksi tidak berhasil : " . self::$connection->connect_error);
        }
    }
    
    public static function query($query){
        self::connection();
        $connection = self::$connection->query($query);
        return $connection->fetch_assoc();
    }

    public static function close()
    {
        self::$connection->close();
    }
}