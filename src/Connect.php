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
    private static PDO $instance;

    /** @var PDOException */
    private static PDOException $error;

    /**
     * Connect constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return ?PDO
     */
    public static function getInstance(): ?PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    self::connectionString(),
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
     * @return string
     */
    private static function connectionString(): string
    {
        if (DLC["engine"] === "oci") {
            return "oci:dbname=" . DLC["dbname"] . ";charset=" . DLC["charset"];
        }
        return DLC["driver"] . ":host=" . DLC["host"] . ";dbname=" . DLC["dbname"] . ";port=" . DLC["port"];
    }

    /**
     * @return PDOException
     */
    public static function getError(): PDOException
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