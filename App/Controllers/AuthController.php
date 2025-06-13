<?php

namespace App\Controllers;

require_once __DIR__ . '/../../config/database.php';

use PDO;

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');

            if (!empty($username)) {
                $_SESSION['username'] = $username;
                header("Location: index.php?page=home");
                exit();
            } else {
                $error = "Veuillez entrer un pseudo.";
                require __DIR__ . '/../Views/auth/login.php';
            }
        } else {
            require __DIR__ . '/../Views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
        exit();
    }
}
