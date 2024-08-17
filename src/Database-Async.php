<?php

namespace Quizmatix;

use React\Mysql\MysqlClient;

class Database
{
    /**
     * @var MysqlClient
     */
    public MysqlClient $db;

    public function __construct()
    {
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