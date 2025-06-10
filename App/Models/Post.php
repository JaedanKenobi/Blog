<?php
namespace App\Models;

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

    public function createPost($title, $content, $image)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content, image, created_at) VALUES (?, ?, ?, NOW())");
        return $stmt->execute([$title, $content, $image]);
    }
}
