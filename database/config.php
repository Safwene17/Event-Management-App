<?php
abstract class Connexion
{
    public $pdo;
    function __construct()
    {
        $this->pdo = new PDO('enter your database link here');
    }
    function __destruct()
    {
        $this->pdo = null;
    }
}
