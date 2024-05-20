<?php

class Model {
    protected PDO $bdd;

    function __construct() {
        $this->bdd = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';port=' . Config::DB_PORT, Config::DB_USER, Config::DB_PSW);
        $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
}
