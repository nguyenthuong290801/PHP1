<?php

namespace App\core;

use PDO;
use PDOException;
use Exception;

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "123";
    private $name = "shop";
    private $conn;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    public function prepare($sql) {
        try {
            return $this->conn->prepare($sql);
        } catch (PDOException $e) {
            throw new Exception("Đã xảy ra lỗi khi chuẩn bị truy vấn: " . $e->getMessage());
        }
    }

    public function query($sql) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Đã xảy ra lỗi khi thực hiện truy vấn: " . $e->getMessage());
        }
    }

    public function lastInsertId(){
        return $this->conn->lastInsertId();
    }
}
