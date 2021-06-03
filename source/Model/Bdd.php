<?php

namespace App\Model;

use PDO;

class Bdd{

    protected $bdd;

    private const HOST = 'localhost';
    private const PORT = 3306;
    private const DB_NAME = 'twitch';
    private const USER = 'root';
    private const PASS = '';

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, self::USER, self::PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

}