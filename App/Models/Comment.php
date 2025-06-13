<?php
namespace App\Models;
require_once __DIR__ . '../../config/database.php';
use PDO;

class Comment
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getCommentsByPostId($postId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
        $stmt->execute([$postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($postId, $author, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comments (post_id, author, content, created_at) VALUES (?, ?, ?, NOW())");
        return $stmt->execute([$postId, $author, $content]);
    }
}
