<?php

namespace App\Database;

use PDO;

class Database
{
    private string $servername = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $dbname = 'contacts';

    public function db(): PDO
    {
        return new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
    }

}