<?php

class DB
{

    private   $servername = 'localhost';
    private   $db = 'api';
    private   $username = 'root';
    private   $passw = '';
    public    $con;

    public static function connect()
    {

        $con = new PDO("mysql:host=localhost;dbname=api", "root", '');

        return $con;
    }

    public function deconnect()
    {
        return $this->con = null;
    }
}

