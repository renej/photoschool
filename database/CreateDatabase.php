<?php
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 17/05/14
 * Time: 09:33 PM
 */


class CreateDatabase {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;", "root", "root");
    }

    public function my_db() {
        $crear_db = $this->pdo->prepare("CREATE DATABASE IF NOT EXISTS photoschool COLLATE utf8_spanish_ci");

    }
} 