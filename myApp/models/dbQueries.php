<?php 

namespace MYAPP\Models;
use MYAPP\Controllers\dbConnection;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'controllers/dbConnection.php';
class dbQueries extends dbConnection{

    protected $conn;

    public function __construct() {
        parent::__construct();
    }
    protected function select($table, $value, $where = "") {

        $sql_st="SELECT $value FROM $table $where";
        $result = $this->conn->query($sql_st);
        return $result;
    }
    protected function selectById($table, $id, $where = "") {

        $sql_st="SELECT * FROM $table WHERE id = $id;";
        $result = $this->conn->query($sql_st);
        return $result;
    }
    protected function insert($table,$column,$values){

        $columns_list = implode(", ", $column);
        $values_list = implode(", ", array_map(function($value) {
            return "'" . $this->conn->real_escape_string($value) . "'";
        }, $values));
        
        $sql_stat = "INSERT INTO $table ($columns_list) VALUES ($values_list)";  
        $result = $this->conn->query($sql_stat);
        return $result;
    }
    protected function update($table, $expression, $where = ""){

        $sql_statment="UPDATE $table SET $expression WHERE $where";
        var_dump($sql_statment);
        $result = $this->conn->query($sql_statment);
        return $result;
    
    }
    protected function delete($table, $where = ""){
        
        $sql_st="DELETE FROM $table WHERE $where";
        $result = $this->conn->query($sql_st);
        return $result; 
    }
} 
  
?>