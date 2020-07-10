<?php

namespace Model;

use TexLab\MyDB\DbEntity;
use TexLab\MyDB\DB;
use Core\Config;
use TexLab\MyDB\Runner;

class Model
{
    protected $table;

    public function __construct()
    {

        $this->table = new Runner(DB::Link([
            'host' => Config::MYSQL_HOST,
            'username' => Config::MYSQL_USER_NAME,
            'password' => Config::MYSQL_PASSWORD,
            'dbname' => Config::MYSQL_DATABASE
        ]));
    }
    public function checkUser(string $login, string $password)
    {
        return $this->table->runSQL(
<<<SQL
SELECT `group`. `cod` 
FROM `group`,`users` 
WHERE `group`.`id` = `users`.`id_cod` AND `login` = '$login' AND `password` = '$password'
SQL
);
    }
}
