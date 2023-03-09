<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function selectAll($table){
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function insert($table,$column, $value){
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table, $column, ':value'
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->execute();
    }
}