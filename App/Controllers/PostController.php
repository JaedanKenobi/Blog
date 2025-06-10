<?php
namespace App\Controllers;

use App\Models\Post;
use App\Models\Comment;

class PostController
{
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $image = '';

            // Gestion upload image simple
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $allowed = ['jpg','jpeg','png','gif'];
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $allowed)) {
                    $target = 'uploads/' . uniqid() . '.' . $ext;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    $image = $target;
                }
            }

            $postModel = new Post();
            $postModel->createPost($title, $content, $image);

            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../Views/post_form.php';
    }

    public function show($id)
    {
        $postModel = new Post();
        $commentModel = new Comment();

        $posts = $postModel->getAllPosts();
        $post = null;
        foreach ($posts as $p) {
            if ($p['id'] == $id) {
                $post = $p;
                break;
            }
        }

        if (!$post) {
            echo "Post non trouvé";
            exit;
        }

        $comments = $commentModel->getCommentsByPostId($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $author = $_POST['author'] ?? 'Anonyme';
            $content = $_POST['content'] ?? '';
            if ($content) {
                $commentModel->addComment($id, $author, $content);
                header("Location: index.php?page=post&id=$id");
                exit;
            }
        }

        require __DIR__ . '/../Views/post_list.php';
    }
}
