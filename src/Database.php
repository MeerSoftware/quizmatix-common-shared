<?php

namespace Quizmatix;

use PDOException;
use PDOStatement;
use PDO;
use Symfony\Component\Dotenv\Dotenv;

class Database
{
    // PDO statement
    public PDO $db;

    // constructor
    public function __construct()
    {
        // loads .env file
        $dotenv = new Dotenv();
        $dotenv->load('.env');

        // get database type (ex: MySQL or SQLite)
        $db_type = $_ENV["DB_TYPE"];

        // MySQL Environments
        $db_host = $_ENV["DB_HOST"];
        $db_name = $_ENV["DB_NAME"];
        $db_user = $_ENV["DB_USER"];
        $db_pass = $_ENV["DB_PASS"];

        // SQLite Environments
        $db_file = $_ENV["DB_FILE"]; // for SQLite

        // switch case on db type
        switch ($db_type) {
            // if db type is SQLite
            case "SQLite":
                // try for if an exception happens catch it
                try {
                    // connect to the db file via PDO
                    $db = new PDO("sqlite:" . dirname(__DIR__, 1) . "/cache/" . $db_file);
                } catch (PDOException $e) {
                    // die the script if an error happens
                    die($e);
                }
                break;
                // if db type is MySQL
            case "MySQL":
                // try for if an exception happens catch it
                try {
                    // connect to the MySQL server via PDO
                    $db = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8mb4", $db_user, $db_pass);
                } catch (PDOException $e) {
                    // die the script if an error happens
                    die($e);
                }
                break;
                // if db type is not set
            default:
                // die the script
                die("Invalid Database Type: " . $db_type);
        }

        // set db variable to class variable
        $this->db = $db;
    }

    /**
     * prepare
     *
     * @param string $query
     * @param array $options
     * @return PDOStatement|boolean
     */
    public function prepare($query, $options = []): PDOStatement|bool
    {
        return $this->getDB()->prepare($query, $options);
    }

    // returns PDO
    public function getDB(): PDO
    {
        // return the object
        return $this->db;
    }
}