<?php

namespace Quizmatix;

use React\Mysql\MysqlClient;
use Symfony\Component\Dotenv\Dotenv;

class Database
{
    /**
     * @var MysqlClient
     */
    public MysqlClient $db;

    public function __construct()
    {
        // loads .env file
        $dotenv = new Dotenv();
        $dotenv->load('.env');

        $url = $_ENV["DB_URL"];

        $this->db = new MysqlClient($url);
    }

    /**
     * @return MysqlClient
     */
    public function getDB(): MysqlClient
    {
        return $this->db;
    }
}