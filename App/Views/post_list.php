<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
<h1><?= htmlspecialchars($post['title']) ?></h1>
<p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
<?php if ($post['image']): ?>
    <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image post" width="300" />
<?php endif; ?>

<hr>
<h2>Commentaires</h2>
<?php foreach($comments as $comment): ?>
    <p><b><?= htmlspecialchars($comment['author']) ?></b> : <?= nl2br(htmlspecialchars($comment['content'])) ?></p>
<?php endforeach; ?>

<h3>Ajouter un commentaire</h3>
<form method="POST">
    <input type="text" name="author" placeholder="Votre nom" />
    <br>
    <textarea name="content" rows="4" cols="50" required></textarea><br>
    <button type="submit">Commenter</button>
</form>

<a href="/public/index.php">Retour accueil</a>
</body>
</html>
