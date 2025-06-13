<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');

    if ($pseudo !== '') {
        $_SESSION['pseudo'] = $pseudo;
        header('Location: index.php?page=home');
        exit;
    } else {
        $error = "Veuillez entrer un pseudo.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

<form method="post" action="index.php?page=login">
    <input type="text" name="pseudo" required>
    <button type="submit">Se connecter</button>
</form>
    </form>
</body>
</html>

