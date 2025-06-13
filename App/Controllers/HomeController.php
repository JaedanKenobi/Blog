<?php

namespace App\Controllers;
require_once __DIR__ . '/../../config/database.php';

use PDO;
session_start();
class HomeController
{
    public function index()
    {
     

        
        if (!isset($_SESSION['pseudo'])) {
            header('Location: index.php?page=login');
            exit;
        }

        
        $pseudo = $_SESSION['pseudo'];

        
        include_once __DIR__ . '/../Views/home.php';
    }
}
