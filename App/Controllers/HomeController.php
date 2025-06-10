<?php
namespace App\Controllers;

use App\Models\Post;

class HomeController
{
    public function index()
    {
        $postModel = new Post();
        $posts = $postModel->getAllPosts();

        require __DIR__ . '/../Views/home.php';
    }
}
