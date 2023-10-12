<?php

namespace App\models;

use PDO;

use App\core\Database;

class User {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Hàm đăng nhập
    public function login($email, $password) {
        $user = $this->getUserByEmail($email);

        if ($user && password_verify($password, $user['password']))
        {
            // lưu thông tin người dùng vào session
            $_SESSION['user'] = $user;
            
            return true;
        } else {
            return false;
        }
    }

    // Hàm đăng ký
    public function register($email, $password, $username) {
        if ($this->getUserByEmail($email))
        {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, username)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email, $hash, $username]);

        // Kiểm tra xem user đã được tạo thành công hay chưa
        if ($stmt->rowCount() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Hàm lấy thông tin user bằng email
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);                                                                                                                                                                   
        $stmt->execute([$email]);   
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } 
 
     // Hàm log out
     public function logout() {
        unset($_SESSION['user']);
    }

    // Hàm kiểm tra đăng nhập
    public function isLoggedIn() {
        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }
}
