<h1>Bienvenue <?= htmlspecialchars($_SESSION['username'] ?? 'Visiteur') ?></h1>

<?php if (isset($_SESSION['username'])): ?>
    <a href="index.php?page=post_create">Créer un post</a> |
    <a href="index.php?page=logout">Se déconnecter</a>
<?php else: ?>
    <a href="index.php?page=login">Se connecter</a>
<?php endif; ?>

<hr>

<?php foreach ($posts as $post): ?>
    <div>
        <p><strong><?= htmlspecialchars($post['username']) ?></strong> :</p>
        <p><?= htmlspecialchars($post['content']) ?></p>
        <?php if ($post['image_path']): ?>
            <img src="<?= $post['image_path'] ?>" alt="Image" style="max-width: 200px;">
        <?php endif; ?>
        <form method="POST" action="index.php?page=like">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <button type="submit">❤️ <?= $post['likes'] ?></button>
        </form>
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $post['username']): ?>
            <a href="index.php?page=edit_post&id=<?= $post['id'] ?>">✏️ Modifier</a>
        <?php endif; ?>
    </div>
    <hr>
<?php endforeach; ?>
