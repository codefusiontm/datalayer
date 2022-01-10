<?php

namespace CodefusionTM\DataLayer;

use PDO;
use PDOException;

/**
 * Class Connect
 * @package CodefusionTM\DataLayer
 */
class Connect
{
    /** @var PDO */
    private static $instance;

    /** @var PDOException */
    private static $error;

    /**
     * Connect constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return PDO
     */
    public static function getInstance(): ?PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    DLC["driver"] . ":host=" . DLC["host"] . ";dbname=" . DLC["dbname"] . ";port=" . DLC["port"],
                    DLC["username"],
                    DLC["passwd"],
                    DLC["options"]
                );
            } catch (PDOException $exception) {
                self::$error = $exception;
            }
        }
        return self::$instance;
    }

    /**
     * @return PDOException|null
     */
    public static function getError(): ?PDOException
    {
        return self::$error;
    }

    /**
     * Connect clone.
     */
    private function __clone()
    {
    }
}