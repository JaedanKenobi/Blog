<?php

namespace App\Controllers;

require_once __DIR__ . '/../../php/database.php';

class PostController {
    public function create() {
        global $pdo;

        if (!isset($_SESSION['username'])) {
            echo "Erreur : utilisateur non connecté.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'] ?? '';
            $image = $_FILES['image'] ?? null;

            $imagePath = null;
            if ($image && $image['error'] === UPLOAD_ERR_OK) {
                $imagePath = 'uploads/' . basename($image['name']);
                move_uploaded_file($image['tmp_name'], __DIR__ . '/../../public/' . $imagePath);
            }

            $stmt = $pdo->prepare("INSERT INTO posts (username, content, image_path) VALUES (?, ?, ?)");
            $stmt->execute([$_SESSION['username'], $content, $imagePath]);

            header("Location: index.php?page=home");
        } else {
            require __DIR__ . '/../Views/post_create.php';
        }
    }

    public function show($id) {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch();

        require __DIR__ . '/../Views/post_show.php';
    }

    public function like() {
        global $pdo;

        if (!isset($_SESSION['username'])) {
            echo "Erreur : utilisateur non connecté.";
            return;
        }

        $postId = $_POST['post_id'] ?? null;

        if ($postId) {
            $stmt = $pdo->prepare("UPDATE posts SET likes = likes + 1 WHERE id = ?");
            $stmt->execute([$postId]);

            header("Location: index.php?page=home");
        }
    }

    public function edit() {
        global $pdo;

        if (!isset($_SESSION['username'])) {
            echo "Erreur : utilisateur non connecté.";
            return;
        }

        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
            $stmt->execute([$id]);
            $post = $stmt->fetch();

            if ($post && $post['username'] === $_SESSION['username']) {
                require __DIR__ . '/../Views/post_edit.php';
            } else {
                echo "Erreur : vous ne pouvez pas modifier ce post.";
            }
        }
    }

    public function update() {
        global $pdo;

        if (!isset($_SESSION['username'])) {
            echo "Erreur : utilisateur non connecté.";
            return;
        }

        $id = $_POST['post_id'] ?? null;
        $content = $_POST['content'] ?? '';

        if ($id) {
            $stmt = $pdo->prepare("UPDATE posts SET content = ? WHERE id = ? AND username = ?");
            $stmt->execute([$content, $id, $_SESSION['username']]);

            header("Location: index.php?page=home");
        }
    }
}
