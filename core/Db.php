<?php 
namespace Mouro\Core;
class Db {
    protected static $bdd = null;

    public static function openConnexion() {
        try {
            if (self::$bdd == null) {
                self::$bdd = new \PDO('mysql:host=127.0.0.1:3306;dbname=poo_database;charset=utf8', 'root', '');
            }
            return self::$bdd;
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
    }

    public static function closeConnexion() {
        self::$bdd = null;
    }
}
?>
