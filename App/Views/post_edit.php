<h2>Modifier votre post</h2>

<form method="POST" action="index.php?page=update_post">
    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
    <textarea name="content"><?= htmlspecialchars($post['content']) ?></textarea>
    <br>
    <button type="submit">Mettre à jour</button>
</form>
