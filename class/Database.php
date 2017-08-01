<?php

require_once 'interfaces/DBInterface.php';


class Database implements DBInterface {

    public $pdo;

    function __construct($dsn, $db_user, $db_pass){
        $this->pdo = new PDO($dsn, $db_user, $db_pass);
    }

    function query($sql, $params_arr){
        $query = $this->pdo->prepare($sql);
        $query->execute($params_arr);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getData($sql, $params_arr){
        $query = $this->pdo->prepare($sql);
        $result = $query->execute($params_arr);
        return $result;
    }
    function lastId(){
        return $this->pdo->lastInsertId();
    }
}