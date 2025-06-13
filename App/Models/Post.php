<?php
namespace App\Models;
require_once __DIR__ . '../../config/database.php';
use PDO;

class Post
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAllPosts()
    {
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPost($title, $content, $image, $user_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content, image, user_id, created_at) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$title, $content, $image, $user_id]);
    }
}
