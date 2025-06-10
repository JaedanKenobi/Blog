<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Créer un post</title>
</head>
<body>
<h1>Créer un nouveau post</h1>
<form method="POST" enctype="multipart/form-data">
    <label>Titre</label><br>
    <input type="text" name="title" required><br><br>

    <label>Contenu</label><br>
    <textarea name="content" rows="5" cols="40" required></textarea><br><br>

    <label>Image</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Publier</button>
</form>
<a href="/public/index.php">Retour accueil</a>
</body>
</html>
