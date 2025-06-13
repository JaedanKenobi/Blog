<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AuthController;

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
    case 'like':
        (new PostController())->like();
        break;
    case 'edit_post':
        (new PostController())->edit();
        break;
    case 'update_post':
        (new PostController())->update();
        break;
    case 'login':
        (new AuthController())->login();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    default:
        echo "Page non trouvée.";
}
