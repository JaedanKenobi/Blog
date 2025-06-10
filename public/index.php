<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\PostController;

$page = $_GET['page'] ?? 'home';

switch($page) {
    case 'home':
        (new HomeController())->index();
        break;
    case 'post_create':
        (new PostController())->create();
        break;
    case 'post':
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new PostController())->show($id);
        } else {
            echo "Post ID manquant.";
        }
        break;
    default:
        echo "Page non trouvée.";
}
