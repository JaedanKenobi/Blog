<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Accueil Blog</title>
</head>
<body>
<h1>Bienvenue sur mon Blog</h1>
<a href="/public/index.php?page=post_create">Créer un nouveau post</a>
<hr>
<?php foreach($posts as $post): ?>
    <h2><a href="index.php?page=post&id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
    <p><?= nl2br(htmlspecialchars(substr($post['content'], 0, 100))) ?>...</p>
    <?php if ($post['image']): ?>
        <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image post" width="150" />
    <?php endif; ?>
    <hr>
<?php endforeach; ?>
</body>
</html>
