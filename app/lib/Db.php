<?php
namespace app\lib;
use PDO;

class Db
{
    protected $conn;
    private $error;
    public function __construct()
    {
        $config = require 'config/db.php';
        $this->conn = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);
    }
    public function getError()
    {
        return $this->_error;
    }
    public function getMaxLegth($table, $column)
    {
        $stmt = $this->conn->prepare("SELECT COLUMN_NAME, CHARACTER_MAXIMUM_LENGTH 
                                    FROM information_schema.columns
                                    WHERE table_schema = DATABASE() AND
                                    table_name = :table AND COLUMN_NAME = :column");
        $stmt->execute(array("table" => $table, "column" => $column));
        $column = $stmt->fetch(PDO::FETCH_LAZY);
        return $column['CHARACTER_MAXIMUM_LENGTH'];
    }
}
