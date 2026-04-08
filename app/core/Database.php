<?php

class Database
{
    private $host     = DB_HOST;
    private $user     = DB_USER;
    private $password = DB_PASS;
    private $dbname   = DB_NAME;
    private $dbport   = DB_PORT;

    private $pdo;
    private $stmt;
    private $error;

    private static $instance = null;

    public function __construct()
    {
        $dsn = "mysql:host=" .  $this->host .
               ";dbname="    .  $this->dbname .
               ";port="      .  $this->dbport;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function query($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function execute()
    {
        try {
            if(!$this->stmt->execute()) {
                throw new Error("Failed");
            }
        } catch (PDOException $e) {
            throw new RuntimeException("Query failed" . $e->getMessage());
        }
    }

    public function result()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->pdo->beginTransaction();
    }

    public function commit()
    {
        return $this->pdo->commit();
    }

    public function rollback()
    {
        return $this->pdo->rollback();
    }
}
