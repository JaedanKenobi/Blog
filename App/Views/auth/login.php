<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/style.css"> 
</head>
<body>
    <h1>Connexion</h1>
    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?page=login">
    <label for="username">Votre pseudo :</label><br>
    <input type="text" name="username" id="username" required><br><br>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>
