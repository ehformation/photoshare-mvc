<?php 
namespace Core;

use PDO;
use PDOException;

require_once __DIR__ . '/../config/database.php';

class Model{
    protected static $pdo = null;

    public function __construct() {
        if (self::$pdo === null) {
            try {
                $config = getDatabaseConfig();

                self::$pdo = new PDO(
                    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
                    $config['user'],
                    $config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                error_log("Erreur de connexion à la base de données : " . $e->getMessage());
                throw new \Exception("Erreur de connexion à la base de données. Contactez l'administrateur.");
            }
        }
    }

    protected function connectDb() {
        return self::$pdo;
    }
}
