<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Se connecter</h1>
    <form action="traitement.php?action=login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" name="submit" value="Se connecter">
    </form>
</body>
</html>



<?php if (isset($_GET["success"])) {
    if ($_GET["success"] === "registerOk") {
        echo "<br><br>Enregistrement réussi ! <br>
        Veuillez vous connecter...";
    } elseif ($_GET["success"] === "noConnect")
        echo "<br><br>Utilisateur inconnu ou mot de passe incorrect...";
}